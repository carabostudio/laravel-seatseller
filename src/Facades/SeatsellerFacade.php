<?php

namespace Carabostudio\Seatseller\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SeatsellerFacade
 * @package Carabostudio\Seatseller\Facades
 */
class SeatsellerFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'seatseller';
    }

}
