<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('closedate');
            $table->string('opportunity_name');
            $table->string('probability');
            $table->string('next_step');
            $table->decimal('amount');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('account_id')->nullable();
            $table->enum('stage', ['Qualification','Meeting Scheduled', 'Proposal/Price Quote', 'Negotiation/Review', 'Closed Won', 'Closed Lost'])->nullable();
            $table->enum('type', ['Existing Business','New Business'])->nullable();
            $table->enum('source', ['Advertisement','Employee Referral', 'External Referral', 'Social', 'Website', 'Other'])->nullable();
            $table->timestamps();
        });
        Schema::table('opportunities', function (Blueprint $table) {
            $table->foreign('account_id')
            ->references('id')
            ->on('accounts')
            ->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('opportunities');
    }
}
