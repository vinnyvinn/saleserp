<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item');
            $table->decimal('quantity');
            $table->unsignedInteger('quotation_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->timestamps();
        });
        Schema::table('quotation_items', function (Blueprint $table) {
            $table->foreign('quotation_id')
            ->references('id')
            ->on('quotations')
            ->onDelete('cascade');
            $table->foreign('service_id')
            ->references('id')
            ->on('services')
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
        Schema::dropIfExists('quotation_items');
    }
}
