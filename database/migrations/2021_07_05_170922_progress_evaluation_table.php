<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgressEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_evaluation', function (Blueprint $table) {
            $table->id();
            $table->date('periode');
            $table->string('progressName');
            $table->integer('estimatedQty');
            $table->integer('accumulatedLastMonthQty');
            $table->integer('thisMonthQty');
            $table->integer('accumulatedThisMonthQty');
            $table->double('weight', 15, 8)->nullable();
        
            $table->bigInteger('contractorID')->nullable()->unsigned();
            $table->integer('ProjectID')->nullable()->unsigned();
        
            $table->foreign('ProjectID')
            ->nullable()->constrained()
            ->references('ProjectID')
            ->on('Projects')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('contractorID')
            ->nullable()->constrained()->references('id')
            ->on('BussinessPartner')
            ->onUpdate('cascade')
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
        Schema::dropIfExists('progress_evaluation');
    }
}
