<?php
require_once __DIR__.'/lib/Model/Ship.php';
require __DIR__.'/lib/Sercice/BattleManager.php';
require __DIR__.'/lib/Service/ShipLoader.php';
require __DIR__.'/lib/Model/BattleResult.php';
require __DIR__.'/lib/Service/Container.php';

$configuration = [
    'db_dsn' => 'mysql:host=localhost;dbname=oo_battle',
    'db_user'=> 'root',
    'db_pass' => 'bapu',
];

