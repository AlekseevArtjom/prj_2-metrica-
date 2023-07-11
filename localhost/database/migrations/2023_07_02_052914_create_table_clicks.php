<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClicks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
			$table->foreignId('pages_id')->constrained('pages')->onDelete('cascade');
			$table->integer('x_coord')->nullable();
			$table->integer('y_coord')->nullable();
			$table->integer('year')->nullable();
			$table->integer('month')->nullable();
			$table->integer('day')->nullable();
			$table->integer('hour')->nullable();
			$table->integer('minute')->nullable();
			$table->integer('second')->nullable();		
			$table->SoftDeletes();
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
        Schema::dropIfExists('clicks');
    }
}
