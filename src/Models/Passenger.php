<?php

namespace Carabostudio\Seatseller\Models;

class Passenger
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $age;

    /**
     * @var string
     */
    public string $gender;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $mobile;

    /**
     * @var string
     */
    public string $title;

    /**
     * @var bool
     */
    public bool $primary = false;

    /**
     * @param string $name
     * @return Passenger
     */
    public function name(string $name): Passenger
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $age
     * @return Passenger
     */
    public function age(string $age): Passenger
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @param string $gender
     * @return Passenger
     */
    public function gender(string $gender): Passenger
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @param string $email
     * @return Passenger
     */
    public function email(string $email): Passenger
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $mobile
     * @return Passenger
     */
    public function mobile(string $mobile): Passenger
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @param string $title
     * @return Passenger
     */
    public function title(string $title): Passenger
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param bool $primary
     * @return Passenger
     */
    public function primary(bool $primary): Passenger
    {
        $this->primary = $primary;
        return $this;
    }

}
