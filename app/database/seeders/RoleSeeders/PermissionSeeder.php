<?php

namespace Database\Seeders\RoleSeeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getData() as $permission) {
            Permission::updateOrCreate(['name' => $permission['name']], $permission);
        }
    }

    protected function getData()
    {
        return include(base_path('/database/seeders/_data/permissions.php'));
    }

}
