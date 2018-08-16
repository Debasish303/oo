<?php

class RebelShip extends Ship
{
    public function getFavouriteJedi() {
        $coolJedis = array('Yoda','Ben','Kenobi');
        $key = array_rand($coolJedis);
        
        return $coolJedis[$key];
        
    }
    
    /**
     * 
     * @return string
     */
    public function getType()
    {
        return 'Rebel';
    } 
    
    /**
     * 
     * @return boolean
     */
    public function isFunctional()
    {
        return TRUE;
    }
    
    public function getNameAndSpecs($useShortFormat = false) {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s /%s /%s (Rebel)',
                $this->getName(), 
                $this->getweaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );

        } else {
            return sprintf(
                '%s: w:%s , j:%s , s:%s (Rebel)',
                $this->getName(), 
                $this->getweaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        }
    }
}

