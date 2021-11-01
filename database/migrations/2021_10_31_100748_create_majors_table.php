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
            $table->string('ma_nganh', 30)->unique();
            $table->string('ma_truong', 30)->unique();
            $table->string('ten_nganh', 255)->unique();
            $table->string('nhom_nganh', 100);
            $table->string('to_hop', 10);
            $table->float('diem_chuan_nam_truoc', 4, 2);
            $table->foreign('ma_truong')->references('ma_truong')->on('universities')->onDelete('cascade');
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
        Schema::dropIfExists('majors');
    }
}
