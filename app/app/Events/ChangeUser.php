<?php

namespace App\Events;

use App\Http\Resources\Auth\AuthUserResource;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Queue\SerializesModels;

class ChangeUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $user;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function changedUser(): JsonResource
    {
        return AuthUserResource::make($this->user->load(['roles', 'permissions']));
    }
}
