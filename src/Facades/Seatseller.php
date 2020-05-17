<?php

namespace Carabostudio\Seatseller\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Seatseller
 * @package Carabostudio\SeatsellerManager\Facades
 */
class Seatseller extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'seatseller';
    }

}
