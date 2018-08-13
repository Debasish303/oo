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
        return $this->name;
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
}

function printShipSummary($someShip) {
    echo 'Ship name: '.$someShip->name;
    echo "<hr/>";
    echo $someShip->sayHello();
    echo "<hr/>";
    echo $someShip->getName();
    echo "<hr/>";
    echo $someShip->getNameAndSpecs(false);
    echo "<hr/>";
    echo $someShip->getNameAndSpecs(true);
}
$myShip = new Ship();
$myShip->name = 'Jedi Starship';
$myShip->weaponPower = 10;
printShipSummary($myShip);

