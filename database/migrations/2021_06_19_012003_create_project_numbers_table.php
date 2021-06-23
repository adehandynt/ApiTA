<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('ContractNumber');
            $table->integer('ProjectID')->unsigned();
           
            $table->integer('BusinessPartnerID')->unsigned();
           
            $table->date('StartDate');
            $table->date('EndDate');
            $table->integer('TotalAmount');
            $table->string('ScopeOfWork');
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
        Schema::dropIfExists('project_numbers');
    }
}
