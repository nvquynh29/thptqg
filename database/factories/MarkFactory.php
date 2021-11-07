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

    
    public function definition()
    {
        // $prefix = Place::pluck('place_id')->random();
        // // $value = ;
        // $sbd = $prefix . $value;
        // $sbd = str_pad($sbd, 8, '0', STR_PAD_LEFT);
        // $khtn = rand(0, 1) == 1;
        // return [
        //     'sbd'       => $sbd,
        //     'place_id'  => $prefix,
        //     'toan'      => static::randomMark(true),
        //     'van'       => static::randomMark2(true),
        //     'ngoai_ngu' => static::randomMark(true),
        //     'khtn'      => $khtn,
        //     'ly'        => static::randomMark2($khtn),
        //     'hoa'       => static::randomMark2($khtn),
        //     'sinh'      => static::randomMark2($khtn),
        //     'su'        => static::randomMark2(!$khtn),
        //     'dia'       => static::randomMark2(!$khtn),
        //     'gdcd'      => static::randomMark2(!$khtn),
        // ];
    }
}
