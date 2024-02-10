<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roleOne = Role::create(['name' => 'admin']);
        $roleTwo = Role::create(['name' => 'user']);
        $firstUser = User::first();
        $firstUser->assignRole($roleOne);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $roleOne = Role::where('name', 'admin')->first();
        $roleTwo = Role::where('name', 'user')->first();
        $roleOne->delete();
        $roleTwo->delete();
    }
};
