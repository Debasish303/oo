<?php

class AbstractShip
{
    private $id;
    private $name;
    private $weaponPower = 0;
    private $strength = 0;
    
    public function __construct($name) 
    {
        $this->name = $name;
    }
    
    public function sayHello() {
        echo "<strong>Battle ships</strong>";
    }
    
    public function getNameAndSpecs($useShortFormat = false) {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s /%s /%s',
                $this->name, 
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );

        } else {
            return sprintf(
                '%s: w:%s , j:%s , s:%s',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
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
  
    public function setStrength($Strength)
    {
        if(!is_numeric($Strength)) {
            throw new Exception('Invalid strength passed' .$Strength);
        }
        $this->strength = $Strength;
    }
    
    /**
     * 
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }        

    /**
     * 
     * @return mixed
     */
    public function getName()
    {
        return '<strong>'.$this->name.'</strong>';
    }
    
    /**
     * 
     * @return integer
     */
    public function getweaponPower()
    {
        return $this->weaponPower;
    }
    
    
    /**
     * 
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }
    
    /**
     * 
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
}

