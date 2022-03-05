<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comments';

    /**
     * Run the migrations.
     * @table comments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('date', 45)->nullable();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('photo_id');

            $table->index(["user_id"], 'fk_comments_users1_idx');

            $table->index(["photo_id"], 'fk_comments_photos1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_comments_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('photo_id', 'fk_comments_photos1_idx')
            ->references('id')->on('photos')
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
