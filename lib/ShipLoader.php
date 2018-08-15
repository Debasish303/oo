<?php

/* 
 * ShipLoader class
 */
class ShipLoader {
    private $pdo;
    private $dbDsn;
    private $dbUser;
    private $dbPass;
    public function __construct($dbDsn, $dbUser, $dbPass) {
        $this->dbDsn = $dbDsn;
        $this->dbPass = $dbPass;
        $this->dbUser = $dbUser;
    }
    /**
    * 
    * @return Ship[]
    */ 
   public function getShips() 
   {
        $shipsData = $this->queryForShips();
        $ships = [];
        foreach($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }
        return $ships;
    }
    
    /**
     * 
     * @param type $id
     * @return null/Ship
     */
    
    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);
        
        if(!$shipArray) {
            return null;
        }
        
        return $this->createShipFromData($shipArray);
        
    }
    
    private function createShipFromData(array $shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setweaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);
       
        return $ship;
    }        

    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $shipArray;
    }
    
    /**
     * 
     * @return \PDO
     */
    private function getPDO() 
    {
        if ($this->pdo == NULL) {
            $pdo = new PDO($this->dbDsn, $this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $this->pdo = $pdo;
        }
        
        return $this->pdo;
    }
}
