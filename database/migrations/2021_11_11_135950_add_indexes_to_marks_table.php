<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToMarksTable extends Migration
{
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->index('toan');
            $table->index('van');
            $table->index('ngoai_ngu');
            $table->index('ly');
            $table->index('hoa');
            $table->index('sinh');
            $table->index('su');
            $table->index('dia');
            $table->index('gdcd');
            $table->index('place_id');
        });
    }
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropIndex('marks_toan_index');
            $table->dropIndex('marks_van_index');
            $table->dropIndex('marks_ngoai_ngu_index');
            $table->dropIndex('marks_ly_index');
            $table->dropIndex('marks_hoa_index');
            $table->dropIndex('marks_sinh_index');
            $table->dropIndex('marks_su_index');
            $table->dropIndex('marks_dia_index');
            $table->dropIndex('marks_gdcd_index');
            $table->dropIndex('marks_place_id_index');
        });
    }
}
