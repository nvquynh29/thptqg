<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('sbd')->unique();
            $table->integer('ma_cum');
            $table->foreign('ma_cum')->references('ma_cum')->on('places')->onDelete('cascade');
            $table->float('toan', 4, 2)->nullable();
            $table->float('van', 4, 2)->nullable();
            $table->float('ngoai_ngu', 4, 2)->nullable();
            $table->float('ly', 4, 2)->nullable();
            $table->float('hoa', 4, 2)->nullable();
            $table->float('sinh', 4, 2)->nullable();
            $table->float('su', 4, 2)->nullable();
            $table->float('dia', 4, 2)->nullable();
            $table->float('gdcd', 4, 2)->nullable();
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
        Schema::dropIfExists('marks');
    }
}
