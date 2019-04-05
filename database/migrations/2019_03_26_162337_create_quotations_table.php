<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id')->nullable();
            $table->string('quotationno')->unique();
            $table->unsignedInteger('lead_id')->nullable();
            $table->decimal('total_tax',11, 2)->nullable();
            $table->decimal('subtotal',11,2)->nullable();
            $table->decimal('total',11,2);
            $table->enum('status',['Draft', 'Sent','Accepted','Rejected', 'Pending'])->nullable();
            $table->timestamps();
        });
        Schema::table('quotations', function (Blueprint $table) {
            $table->foreign('account_id')
            ->references('id')
            ->on('accounts')
            ->onDelete('cascade');
            $table->foreign('lead_id')
            ->references('id')
            ->on('leads')
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
        Schema::dropIfExists('quotations');
    }
}
