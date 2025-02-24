<?php

namespace App\Service\Users;

use App\Events\ChangeUser;
use App\Http\Database\ListQueryBuilder;
use App\Http\Resources\Permissions\ListResource as PermissionResource;
use App\Http\Resources\Roles\ListResource as RoleResource;
use App\Http\Resources\Users\ItemResource;
use App\Http\Resources\Users\ListResource;
use App\Models\User;
use App\Repositories\Permissions\PermissionRepository;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private ListQueryBuilder $listBuilder;
    private UserRepository $userRepository;
    private RoleRepository $roleRepository;
    private PermissionRepository $permissionRepository;

    public function __construct(
        ListQueryBuilder     $listBuilder,
        UserRepository       $userRepository,
        RoleRepository       $roleRepository,
        PermissionRepository $permissionRepository,
    )
    {
        $this->listBuilder = $listBuilder;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function getIndexData(array $params): array
    {
        $query = $this->userRepository->listQuery($params);
        $this->listBuilder->setParams($query, $params);

        $users = $this->listBuilder->buildQuery()->get();
        $pagination = $this->listBuilder->buildPagination();

        return [
            'users' => ListResource::collection($users),
            'pagination' => $pagination
        ];
    }

    public function getCreateData(): array
    {
        return [
            'roles' => RoleResource::collection($this->roleRepository->listQuery()->get()),
            'permissions' => PermissionResource::collection($this->permissionRepository->listQuery()->get()),
        ];
    }

    public function getEditData(User $user): array
    {
        return [
            'user' => ItemResource::make($user->load(['roles', 'permissions'])),
            'roles' => RoleResource::collection($this->roleRepository->listQuery()->get()),
            'permissions' => PermissionResource::collection($this->permissionRepository->listQuery()->get()),
        ];
    }

    public function show(User $user): User
    {
        return $user->load(['roles', 'permission']);
    }

    public function store(array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user = User::create($data);

        if (isset($data['roles'])) {
            $user->roles->sync($data['roles']);
        }
        if (isset($data['permissions'])) {
            $user->permissions->sync($data['permissions']);
        }

        $user->load(['roles', 'permissions']);

        ChangeUser::dispatch($user);
        return $user;
    }

    public function update(User $user, array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user = tap($user)->update($data);

        if (isset($data['roles'])) {
            $user->roles()->sync($data['roles']);
        }
        if (isset($data['permissions'])) {
            $user->permissions()->sync($data['permissions']);
        }

        $user->load(['roles', 'permissions']);

        ChangeUser::dispatch($user);
        return $user;
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
