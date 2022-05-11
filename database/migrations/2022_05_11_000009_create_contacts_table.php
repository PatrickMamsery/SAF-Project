<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contacts';

    /**
     * Run the migrations.
     * @table contacts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('whatsapp', 45)->nullable()->default(null);
            $table->string('ig', 45)->nullable()->default(null);
            $table->string('twitter', 45)->nullable()->default(null);
            $table->string('fb', 45)->nullable()->default(null);
            $table->string('linked_in', 45)->nullable()->default(null);
            $table->unsignedBigInteger('user_id');

            $table->index(["user_id"], 'fk_contacts_users1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_contacts_users1_idx')
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
