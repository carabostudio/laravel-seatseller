<?php


namespace Carabostudio\Seatseller\Models;


class CancelRequest
{

    /**
     * @var string
     */
    public string $tin;

    /**
     * @var string
     */
    public string $seatToCancel;

    /**
     * @param string $tin
     * @return CancelRequest
     */
    public function tin(string $tin): CancelRequest
    {
        $this->tin = $tin;
        return $this;
    }

    /**
     * @param string $seatToCancel
     * @return CancelRequest
     */
    public function seatToCancel(string $seatToCancel): CancelRequest
    {
        $this->seatToCancel = $seatToCancel;
        return $this;
    }


}
