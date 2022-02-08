<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company')->nullable();
            $table->text('title')->nullable();
            $table->text('remarks')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('user_id','fk_employment_records_users_idx');

            $table->foreign('user_id','fk_employment_records_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no Action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment_records');
    }
}
