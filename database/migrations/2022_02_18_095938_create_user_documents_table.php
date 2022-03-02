<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['passport','cv']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('document_id');
            $table->timestamps();

            $table->index('user_id','fk_user_documents_users_idx');

            $table->foreign('user_id','fk_user_documents_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index('document_id','fk_user_documents_documents_idx');

            $table->foreign('document_id','fk_user_documents_documents_idx')
                ->references('id')->on('documents')
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
        Schema::dropIfExists('user_documents');
    }
}
