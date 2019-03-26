<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lead_name')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('industry')->nullable();
            $table->string('company')->nullable();
            $table->string('contact_date')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->enum('salutation', ['Mr.','Ms.', 'Mrs.', 'Dr.', 'Prof.'])->nullable();
            $table->enum('source', ['Advertisement','Employee Referral', 'External Referral', 'Social', 'Website', 'Other'])->nullable();
            $table->timestamps();
        });
        Schema::table('leads', function (Blueprint $table) {
            $table->foreign('status_id')
            ->references('id')
            ->on('lead__statuses')
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
        Schema::dropIfExists('leads');
    }
}
