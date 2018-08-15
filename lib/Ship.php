<?php
class Ship {
    private $name;
    private $weaponPower = 0;
    private $jediFactor = 0;
    private $strength = 0;
    private $underRepair;
    public function __construct($name) 
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1, 100) < 30;
    }
    public function sayHello() {
        echo "<strong>Battle ships</strong>";
    }
    public function isFunctional()
    {
        return !$this->underRepair;
    }
    
    public function getNameAndSpecs($useShortFormat = false) {
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

    public function doesGivenShipHaveMoreStrength($givenShip) 
    {
        return $givenShip->strength > $this->strength;
    }

    /**
     * Setter functions for name, weapon power , factor and strength
     */

    public function setweaponPower($Power)
    {
        $this->weaponPower = $Power;
    }
    public function setJediFactor($factior) 
    {
        $this->jediFactor = $factior;
    }
    public function setStrength($Strength)
    {
        if(!is_numeric($Strength)) {
            throw new Exception('Invalid strength passed' .$Strength);
        }
        $this->strength = $Strength;
    }

    /**
     * Getter classes for power,factor and strength
     */
    public function getName()
    {
        return '<strong>'.$this->name.'</strong>';
    }
    public function getweaponPower()
    {
        return $this->weaponPower;
    }
    public function getJediFactor() 
    {
        return $this->jediFactor;
    }
    public function getStrength()
    {
        return $this->strength;
    }

}