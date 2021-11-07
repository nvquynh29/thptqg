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
            $delta = [0.0, 0.2, 0.4, 0.6, 0.8, 1.0];
            $mark = rand(0, 9) + $delta[rand(0, 4)];
            return floatval($mark);
        }
        return null;
    }
    private static function randomMark2($call)
    {
        if ($call) {
            $delta = [0.00, 0.25, 0.50, 0.75, 1.00];
            $mark = rand(0, 9) + $delta[rand(0, 3)];
            return floatval($mark);
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
        $total = 1000;
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
