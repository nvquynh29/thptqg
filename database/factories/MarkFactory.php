<?php

namespace Database\Factories;

use App\Models\Mark;
use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mark::class;

    public static function randomMark($call)
    {
        if ($call) {
            $delta = [0.2, 0.4, 0.6, 0.8, 1.0];
            $mark = rand(0, 9) + $delta[rand(0, 4)];
            return floatval($mark);
        }
        return null;
    }
    public static function randomMark2($call)
    {
        if ($call) {
            $delta = [0.25, 0.50, 0.75, 1.00];
            $mark = rand(0, 9) + $delta[rand(0, 3)];
            return floatval($mark);
        }
        return null;
    }
    public function definition()
    {
        $prefix = Place::pluck('ma_cum')->random();
        $value = substr(strval(hexdec(uniqid())), -6);
        $sbd = $prefix . $value;
        $sbd = str_pad($sbd, 8, '0', STR_PAD_LEFT);
        $khtn = rand(0, 1) == 1;
        return [
            'sbd'       => $sbd,
            'ma_cum'    => $prefix,
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
    }
}
