<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('position')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('salutation', ['Mr.','Ms.', 'Mrs.', 'Dr.', 'Prof.'])->nullable();
            $table->enum('buying_role', ['Decision Maker','Initiator', 'Influencer', 'Buyer'])->nullable();
            $table->timestamps();
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('account_id')
            ->references('id')
            ->on('accounts')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
