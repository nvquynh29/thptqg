<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('major_code', 30)->unique();
            $table->string('uni_code', 30)->unique();
            $table->string('major_name', 255)->unique();
            $table->string('group', 3);
            $table->float('last_year_standard', 4, 2);
            $table->foreign('uni_code')->references('uni_code')->on('universities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('majors');
    }
}
