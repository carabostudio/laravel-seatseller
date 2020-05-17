<?php

namespace Carabostudio\Seatseller\Facades;

use Illuminate\Support\Facades\Facade;

class SeatsellerFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'seatseller';
    }

}
