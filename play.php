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
        return '<strong>'.$this->name.'</strong>';
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

    public function doesGivenShipHaveMoreStrength($givenShip) {
        return $givenShip->strength > $this->strength;
    }
}

function printShipSummary($someShip) {
    echo $someShip->sayHello();
    echo "<hr/>";
    echo $someShip->getName();
    echo "<hr/>";
    echo $someShip->getNameAndSpecs(false);
    echo "<hr/>";
    echo $someShip->getNameAndSpecs(true);
    echo "<hr/>";
    echo 'Ship name: '.$someShip->name;
}
$myShip = new Ship();
$myShip->name = 'Jedi Starship';
$myShip->weaponPower = 10;
$myShip->strength = 10;

$otherShip = new Ship();
$otherShip->name = 'Imperial Shuttle';
$otherShip->weaponPower = 5;
$otherShip->strength = 50;

printShipSummary($myShip);
echo "<hr/>";
printShipSummary($otherShip);
echo "<hr/>";

if ($myShip->doesGivenShipHaveMoreStrength($otherShip)) {
    echo $otherShip->name. ' has more strength.';
} else {
    echo $myShip->name. ' has more strength.';
}

