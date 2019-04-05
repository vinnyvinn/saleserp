<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('account_name');
            $table->string('phone');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('billingaddress')->nullable();
            $table->string('county')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_kra_pin')->nullable();
            $table->enum('type', ['Analyst','Competitor', 'Customer', 'Investor', 'Partner', 'Press', 'Prospect', 'Reseller', 'Other'])->nullable();
            $table->timestamps();
        });
//        Schema::table('accounts', function (Blueprint $table) {
//            $table->foreign('user_id')
//            ->references('id')
//            ->on('users')
//            ->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
