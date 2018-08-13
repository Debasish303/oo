<?php
class Ship {
    public $name;
    public $weaponPower = 0;
    public $jediFactor = 0;
    public $strength = 0;
    public function sayHello() {
        echo "<strong>Battle ships</strong>";
    }
    public function getName()
    {
        return '<strong>'.$this->name.'</strong>';
    }
    public function getNameAndSpecs($useShortFormat) {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s /%s /%s',
                $this->name, 
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );

        } else {
            return sprintf(
                '%s: w:%s , j:%s , s:%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip) {
        return $givenShip->strength > $this->strength;
    }
}