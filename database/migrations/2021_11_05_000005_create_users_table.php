<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('fname', 45);
            $table->string('mname', 45)->nullable();
            $table->string('sname', 45)->nullable();
            $table->unsignedInteger('user_role_id');
            $table->integer('phone')->nullable();
            $table->enum('role', ['root', 'admin', 'user'])->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);

            $table->unique(["email"], 'users_email_unique');

            $table->index(["user_role_id"], 'fk_users_user_roles1_idx');


            $table->foreign('user_role_id', 'fk_users_user_roles1_idx')
                ->references('id')->on('user_roles')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        DB::table('users')->insert([
            'fname' => 'Test', 'mname' => NULL, 'sname' => 'User', 'user_role_id' => 1, 'phone' => '0629134542', 'role' => 'admin', 'email' => 'test@example.com', 'password' => bcrypt('123456')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
