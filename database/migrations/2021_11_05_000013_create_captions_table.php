<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaptionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'captions';

    /**
     * Run the migrations.
     * @table captions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('is_photo')->nullable();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->index(["user_id"], 'fk_captions_users1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_captions_users1_idx')
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
