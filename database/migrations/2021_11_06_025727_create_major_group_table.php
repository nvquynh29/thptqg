<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('major_id');
            $table->unsignedBigInteger('group_id');
            $table->float('standard_point', 4, 2);
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('major_group');
    }
}
