<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaselineBoqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('BaselineBoq', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('parentItem')->nullable();
            $table->text('hasChild')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->integer('amount')->nullable();
            $table->double('weight', 15, 8)->nullable();
            
            $table->integer('ProjectID')->nullable()->unsigned();
            $table->bigInteger('unitID')->nullable()->unsigned();
            $table->bigInteger('contractorID')->nullable()->unsigned();
            $table->bigInteger('CurrencyID')->nullable()->unsigned();
            
            $table->foreign('CurrencyID')
            ->nullable()->constrained()
            ->references('id')
            ->on('currency')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('ProjectID')
            ->nullable()->constrained()
            ->references('ProjectID')
            ->on('Projects')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('unitID')
            ->nullable()->constrained()
            ->references('id')
            ->on('unit')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('contractorID')
            ->nullable()->constrained()->references('id')
            ->on('BussinessPartner')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('BaselineBoq');
    }
}
