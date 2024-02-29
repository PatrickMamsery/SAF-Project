<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user_roles';

    /**
     * Run the migrations.
     * @table user_roles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 45)->nullable()->default(null);
            $table->nullableTimestamps();
        });
        
        DB::table('user_roles')->insert(['title' => 'root']);
        DB::table('user_roles')->insert(['title' => 'admin']);
        DB::table('user_roles')->insert(['title' => 'user']);
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
