<?php

class BrokenShip extends AbstractShip
{
    public function getJediFactor()
    {
        return 0;
    }
    public function getType()
    {
        return 'Empire';
    }
    public function isFunctional()
    {
        return TRUE;
    }        
}
