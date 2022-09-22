<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'likes';

    /**
     * Run the migrations.
     * @table likes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('date', 45)->nullable()->default(null);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('photo_id');

            $table->index(["user_id"], 'fk_likes_users1_idx');

            $table->index(["photo_id"], 'fk_likes_photos1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_likes_users1_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
