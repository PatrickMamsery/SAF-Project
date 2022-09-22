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
            $table->string('mname', 45)->nullable()->default(null);
            $table->string('sname', 45)->nullable()->default(null);
            $table->enum('gender', ['male', 'female'])->nullable()->default(null);
            $table->unsignedInteger('user_role_id');
            $table->string('phone', 13)->nullable()->default(null);
            $table->string('joindate')->nullable()->default(null);
            $table->string('entrydate')->nullable()->default(null);
            $table->string('citizenship', 30)->nullable()->default(null);
            $table->string('work_address', 125)->nullable()->default(null);
            $table->string('voice', 10)->nullable()->default(null);
            $table->string('marital_status', 10)->nullable()->default(null);
            $table->enum('role', ['root', 'admin', 'user'])->nullable()->default(null);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();

            $table->unique(["email"], 'users_email_unique');

            $table->index(["user_role_id"], 'fk_users_user_roles1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_role_id', 'fk_users_user_roles1_idx')
                ->references('id')->on('user_roles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        DB::table("users")->insert([
            "fname" => "Admin",
            "mname" => "Admin",
            "sname" => "User",
            "phone" => "0629034542",
            "email" => "admin@admin.com",
            "gender" => "male",
            "password" => bcrypt("123456"),
            "user_role_id" => 1,
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
