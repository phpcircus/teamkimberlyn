<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = factory(User::class, 10)->create();
        $this->createDefaultAdmin();
    }

    /**
     * Seed the application's admin user.
     *
     * @return \App\Models\User
     */
    public function createDefaultAdmin()
    {
        return factory(User::class)->create([
            'name' => config('auth.admin.name'),
            'email' => config('auth.admin.email'),
            'password' => bcrypt(config('auth.admin.password')),
            'is_admin' => true,
            'uuid' => Uuid::uuid4(),
        ]);
    }
}
