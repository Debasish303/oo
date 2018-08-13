<?php
require __DIR__.'/functions.php';
$ships = get_ships();

$errorMessage = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'missing_data':
            $errorMessage = 'Don\'t forget to select some ships to battle!';
            break;
        case 'bad_ships':
            $errorMessage = 'You\'re trying to fight with a ship that\'s unknown to the galaxy?';
            break;
        case 'bad_quantities':
            $errorMessage = 'You pick strange numbers of ships to battle - try again.';
            break;
        default:
            $errorMessage = 'There was a disturbance in the force. Try again.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OO Battleships</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<?php if ($errorMessage): ?>
    <div>
        <?php echo $errorMessage; ?>
    </div>
<?php endif; ?>
<body>
    <div class="container">
        <div class="page-header">
            <h1>OO Battleships of Space</h1>
        </div>
        <table class="table table-hover">
            <caption><i class="fa fa-rocket"></i> These ships are ready for their next Mission</caption>
            <thead>
                    <tr>
                        <th>Ship</th>
                        <th>Weapon Power</th>
                        <th>Jedi Factor</th>
                        <th>Strength</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($ships as $ship): ?>
                    <tr>
                        <td><?php echo $ship->getName(); ?></td>
                        <td><?php echo $ship->getweaponPower(); ?></td>
                        <td><?php echo $ship->getJediFactor(); ?></td>
                        <td><?php echo $ship->getStrength(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="battle-box center-block border">
            <div>
                <form method="POST" action="battle.php">
                    <h2 class="text-center">The Mission</h2>
                    <input class="center-block form-control text-field" type="text" name="ship1_quantity" placeholder="Enter Number of Ships" />
                    <select class="center-block form-control btn drp-dwn-width btn-default dropdown-toggle" name="ship1_name">
                        <option value="">Choose a Ship</option>
                        <?php foreach ($ships as $key => $ship): ?>
                            <option value="<?php echo $key; ?>"><?php echo $ship->getNameAndSpecs(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <p class="text-center">AGAINST</p>
                    <br>
                    <input class="center-block form-control text-field" type="text" name="ship2_quantity" placeholder="Enter Number of Ships" />
                    <select class="center-block form-control btn drp-dwn-width btn-default dropdown-toggle" name="ship2_name">
                        <option value="">Choose a Ship</option>
                        <?php foreach ($ships as $key => $ship): ?>
                            <option value="<?php echo $key; ?>"><?php echo $ship->getNameAndSpecs(); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button class="btn btn-md btn-danger center-block" type="submit">Engage</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
