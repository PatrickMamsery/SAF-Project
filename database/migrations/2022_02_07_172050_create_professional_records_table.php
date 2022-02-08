<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('qualification')->nullable();
            $table->string('institute')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('user_id','fk_professional_records_users1_idx');

            $table->foreign('user_id','fk_professional_records_users1_idx')
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
        Schema::dropIfExists('professional_records');
    }
}
