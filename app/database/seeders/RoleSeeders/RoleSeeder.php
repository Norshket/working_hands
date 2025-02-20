<?php

namespace Database\Seeders\RoleSeeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getData() as $role => $permissions) {
            $role = Role::updateOrCreate(['name' => $role], [
                'name' => $role,
                'display_name' => $role,
            ]);
            $role->syncPermissions($permissions);
        }
    }

    protected function getData()
    {
        return include(base_path('/database/seeders/_data/roles.php'));
    }

}
