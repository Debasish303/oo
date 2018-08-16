<?php

class RebelShip extends AbstractShip
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
        $val = parent::getNameAndSpecs($useShortFormat);
        $val .= ' (Rebel)';
        
        return $val;
    }
    
    /**
     * 
     * @return integer
     */
    public function getJediFactor() 
    {
        return rand(10, 30);
    }
}

