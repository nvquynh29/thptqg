<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private static function randomMark($call)
    {
        if ($call) {
            $num = rand(0, 50);
            $p = rand(1, 100);
            if ($num < 20) {
                if ($p > 2 * $num) {
                    $num += 20;
                }
            }
            if ($num > 40) {
                if ($p < 2 * $num) {
                    $num -= 10;
                }
            }
            return round($num * 0.2, 2);
        }
        return null;
    }
    private static function randomMark2($call)
    {
        if ($call) {
            $num = rand(0, 40);
            $p = rand(1, 100);
            if ($num < 20) {
                if ($p > 2 * $num) {
                    $num += 20;
                }
            }
            if ($num > 30) {
                if ($p < 2 * $num) {
                    $num -= 10;
                }
            }
            return round($num * 0.25, 2);
        }
        return null;

    }
    private static function getSbd($prefix, $value)
    {
        $value = str_pad($value, 6, '0', STR_PAD_LEFT);
        $sbd = $prefix . $value;
        return str_pad($sbd, 8, '0', STR_PAD_LEFT);
    }
    private static function insertMark($prefix, $value)
    {
        $khtn = rand(0, 1) == 1;
        $mark = [
            'sbd'       => static::getSbd($prefix, $value),
            'place_id'  => $prefix,
            'toan'      => static::randomMark(true),
            'van'       => static::randomMark2(true),
            'ngoai_ngu' => static::randomMark(true),
            'khtn'      => $khtn,
            'ly'        => static::randomMark2($khtn),
            'hoa'       => static::randomMark2($khtn),
            'sinh'      => static::randomMark2($khtn),
            'su'        => static::randomMark2(!$khtn),
            'dia'       => static::randomMark2(!$khtn),
            'gdcd'      => static::randomMark2(!$khtn),
        ];
        DB::table('marks')->insert($mark);
    }
    public function run()
    {
        $total = 200000;
        $numOfPlaces = 64;
        $perPlace = floor($total / $numOfPlaces);
        $remain = $total % $numOfPlaces;
        foreach (range(1, $numOfPlaces) as $prefix) {
            if ($prefix >= 20) {
                $prefix += 1;
            }
            foreach (range(1, $perPlace) as $value) {
                static::insertMark($prefix, $value);
            }
        }
        if ($remain) {
            $start = $perPlace + 1;
            $end = $perPlace + $remain;
            foreach (range($start, $end) as $index) {
                static::insertMark(1, $index);
            }
        }
    }
}
