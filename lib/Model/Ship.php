<?php
class Ship extends AbstractShip
{
    private $jediFactor = 0;       
    
    private $underRepair;
    
    public function __construct($name) 
    {
        parent::__construct($name);
        $this->underRepair = mt_rand(1, 100) < 30;
    }
    
    /**
     * 
     * @return integer
     */
    public function getJediFactor() 
    {
        return $this->jediFactor;
    }
    
    /**
     * 
     * @param int $factior
     */
    public function setJediFactor($factior) 
    {
        $this->jediFactor = $factior;
    }
    
    public function isFunctional()
    {
        return !$this->underRepair;
    }
    
    /**
     * 
     * @return string
     */
    public function getType()
    {
        return 'Empire';
    } 
}