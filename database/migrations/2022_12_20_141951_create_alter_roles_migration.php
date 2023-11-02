<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlterRolesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->enum('fillable_type', ['account', 'user'])->after('slug')->nullable();
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->enum('fillable_type', ['account', 'user'])->after('id')->nullable();
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->integer('account_id')->after('id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable()->change();
        });
        Schema::table('permission_user', function (Blueprint $table) {
            $table->integer('account_id')->after('id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('fillable_type');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('fillable_type');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropColumn('account_id');
        });
        Schema::table('permission_user', function (Blueprint $table) {
            $table->dropColumn('account_id');
        });
    }
}
