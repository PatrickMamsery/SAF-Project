<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'videos';

    /**
     * Run the migrations.
     * @table videos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('posted_on', 45)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('path')->nullable();
            $table->string('link')->nullable();
            $table->string('caption', 2000)->nullable();
            $table->unsignedInteger('comment_id');

            $table->index(["user_id"], 'fk_videos_users_idx');

            $table->index(["comment_id"], 'fk_videos_comments1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_videos_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');


            $table->foreign('comment_id', 'fk_videos_comments1_idx')
                ->references('id')->on('comments')
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
