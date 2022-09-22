<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'infos';

    /**
     * Run the migrations.
     * @table infos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 200)->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
            $table->string('media')->nullable()->default(null);
            $table->integer('inhouse')->nullable()->default('1');
            $table->nullableTimestamps();
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
