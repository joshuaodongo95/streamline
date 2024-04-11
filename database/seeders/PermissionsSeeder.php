<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Reset cached roles and permissions
       app()[PermissionRegistrar::class]->forgetCachedPermissions();

       // create permissions
       Permission::create(['name' => 'edit record']);
       Permission::create(['name' => 'delete record']);
       Permission::create(['name' => 'create record']);

       // create roles and assign existing permissions
       $role1 = Role::create(['name' => 'nurse']);
       $role1->givePermissionTo('create record');
       $role1->givePermissionTo('edit record');
       $role1->givePermissionTo('delete record');

       $role2 = Role::create(['name' => 'doctor']);
       $role2->givePermissionTo('create record');
       $role2->givePermissionTo('edit record');
       $role2->givePermissionTo('delete record');

       $role3 = Role::create(['name' => 'admin']);
       
       $role3->givePermissionTo('create record');
       $role3->givePermissionTo('edit record');
       $role3->givePermissionTo('delete record');

       $role4 = Role::create(['name' => 'Super-Admin']);
       // gets all permissions via Gate::before rule; see AuthServiceProvider

       // create demo users
       $user = \App\Models\User::factory()->create([
           'name' => 'nurse',
           'email' => 'nurse@emr.com',
           'password'=> bcrypt('nurse'),
       ]);
       $user->assignRole($role1);

       $user = \App\Models\User::factory()->create([
        'name' => 'doctor',
        'email' => 'doctor@emr.com',
        'password'=> bcrypt('doctor'),
       ]);
      $user->assignRole($role2);

       $user = \App\Models\User::factory()->create([
           'name' => 'Admin User',
           'email' => 'admin@emr.com',
           'password'=> bcrypt('admin'),
       ]);
       $user->assignRole($role2);

       $user = \App\Models\User::factory()->create([
           'name' => 'Super-Admin User',
           'email' => 'superadmin@emr.com',
           'password'=> bcrypt('superadmin'),
       ]);
       $user->assignRole($role3);
    }
}
