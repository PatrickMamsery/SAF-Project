<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationRecordsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'education_records';

    /**
     * Run the migrations.
     * @table education_records
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('institute')->nullable()->default(null);
            $table->string('degree_class')->nullable()->default(null);
            $table->string('qualification')->nullable()->default(null);
            $table->string('start_date')->nullable()->default(null);
            $table->string('end_date')->nullable()->default(null);
            $table->unsignedBigInteger('user_id');

            $table->index(["user_id"], 'fk_education_records_users_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_education_records_users_idx')
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
