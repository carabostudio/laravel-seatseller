<?php


namespace Carabostudio\Seatseller\Models;


/**
 * Class BlockTicket
 * @package Carabostudio\Seatseller\Models
 */
class BlockTicket
{

    /**
     * @var string
     */
    public string $source;

    /**
     * @var string
     */
    public string $destination;

    /**
     * @var string
     */
    public string $availableTripId;

    /**
     * @var string
     */
    public string $boardingPointId;

    /**
     * @var string
     */
    public string $droppingPointId;

    /**
     * @var string
     */
    public string $operator;

    /**
     * @var string
     */
    public string $bookingDevice;

    /**
     * @var array
     */
    public array $inventoryItems;

    /**
     * @param string $source
     * @return BlockTicket
     */
    public function source(string $source): BlockTicket
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param string $destination
     * @return BlockTicket
     */
    public function destination(string $destination): BlockTicket
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @param string $availableTripId
     * @return BlockTicket
     */
    public function availableTripId(string $availableTripId): BlockTicket
    {
        $this->availableTripId = $availableTripId;
        return $this;
    }

    /**
     * @param string $boardingPointId
     * @return BlockTicket
     */
    public function boardingPointId(string $boardingPointId): BlockTicket
    {
        $this->boardingPointId = $boardingPointId;
        return $this;
    }

    /**
     * @param string $droppingPointId
     * @return BlockTicket
     */
    public function droppingPointId(string $droppingPointId): BlockTicket
    {
        $this->droppingPointId = $droppingPointId;
        return $this;
    }

    /**
     * @param string $operator
     * @return BlockTicket
     */
    public function operator(string $operator): BlockTicket
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param string $bookingDevice
     * @return BlockTicket
     */
    public function bookingDevice(string $bookingDevice): BlockTicket
    {
        $this->bookingDevice = $bookingDevice;
        return $this;
    }

    /**
     * @param array $inventoryItems
     * @return BlockTicket
     */
    public function inventoryItems(array $inventoryItems): BlockTicket
    {
        $this->inventoryItems = $inventoryItems;
        return $this;
    }

}
