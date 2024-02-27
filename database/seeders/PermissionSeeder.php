<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions = [
            'viewAny',
            'view',
            'create',
            'update',
            'delete',
            'restore',
            'forceDelete',
        ];

        $resources = [
            'user',
            'restaurant',
            'category',
            'product',
        ];

        collect($resources)
            ->crossJoin($actions)
            ->map(fn (array $set): string => join('.', $set))
            ->each(fn (string $permission) => Permission::create([
                'name' => $permission,
            ]));
    }
}
