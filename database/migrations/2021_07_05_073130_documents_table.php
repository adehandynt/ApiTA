<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('documentName');
            $table->string('documentType');
            $table->string('size');
            $table->integer('author')->unsigned();
            $table->string('status');
            $table->text('desc');
        
            
            $table->integer('ProjectID')->nullable()->unsigned();
        
            $table->foreign('ProjectID')
            ->nullable()->constrained()
            ->references('ProjectID')
            ->on('Projects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
;
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
        Schema::dropIfExists('documents');
    }
}
