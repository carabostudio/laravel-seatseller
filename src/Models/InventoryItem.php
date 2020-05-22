<?php

namespace Carabostudio\Seatseller\Models;


/**
 * Class InventoryItem
 * @package Carabostudio\Seatseller\Models
 */
class InventoryItem
{

    /**
     * @var string
     */
    public string $seatName;

    /**
     * @var string
     */
    public string $fare;

    /**
     * @var Passenger
     */
    public Passenger $passenger;

    /**
     * @param string $seatName
     * @return InventoryItem
     */
    public function seatName(string $seatName): InventoryItem
    {
        $this->seatName = $seatName;
        return $this;
    }

    /**
     * @param string $fare
     * @return InventoryItem
     */
    public function fare(string $fare): InventoryItem
    {
        $this->fare = $fare;
        return $this;
    }

    /**
     * @param Passenger $passenger
     * @return InventoryItem
     */
    public function passenger(Passenger $passenger): InventoryItem
    {
        $this->passenger = $passenger;
        return $this;
    }

}
