<?php

class Container 
{
    private $configuration;
    private $pdo;
    private $shipLoader;
    private $battleManager;
    public function __construct(array $configuration) 
    {
        $this->configuration = $configuration;
    }

    /**
     * 
     * @return \PDO
     */
    public function getPDO()
    {   
        if($this->pdo === NULL) {
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
    
    /**
     * 
     * @return ShipLoader
     */
    public function getShipLoader() 
    {
        if ($this->shipLoader === NULL) {
            $this->shipLoader = new ShipLoader($this->getPDO());
        }
        return $this->shipLoader;
    }
    
    public function getBattleManager()
    {
        if ($this->battleManager === NULL) {
            $this->battleManager = new BattleManager($this->getPDO());
        }
        return $this->battleManager;
    }        
}
