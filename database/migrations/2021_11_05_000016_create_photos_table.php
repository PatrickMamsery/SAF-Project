<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'photos';

    /**
     * Run the migrations.
     * @table photos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('posted_on', 45)->nullable();
            $table->string('link')->nullable();
            $table->string('path')->nullable();
            $table->string('caption', 2000)->nullable();

            $table->index(["user_id"], 'fk_photos_users1_idx');

            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_photos_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
                
        });
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
