<?php

/* 
 * ShipLoader class
 */
class ShipLoader {
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
        $pdo = new PDO('mysql:host=localhost;dbname=oo_battle','root','bapu');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $pdo = new PDO('mysql:host=localhost;dbname=oo_battle', 'root', 'bapu');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $shipArray;
    }
}
