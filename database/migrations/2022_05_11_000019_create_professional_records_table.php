<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalRecordsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'professional_records';

    /**
     * Run the migrations.
     * @table professional_records
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('qualification')->nullable()->default(null);
            $table->string('institute')->nullable()->default(null);
            $table->unsignedBigInteger('user_id');

            $table->index(["user_id"], 'fk_professional_records_users1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_professional_records_users1_idx')
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
