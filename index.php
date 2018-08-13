<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OO Battle Ships</title>
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
                        <td><?php echo $ship['name']; ?></td>
                        <td><?php echo $ship['weapon_power']; ?></td>
                        <td><?php echo $ship['jedi_factor']; ?></td>
                        <td><?php echo $ship['strength']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="battle-box center-block border">
            <div>
                <form method="POST" action="/battle.php">
                    <h2 class="text-center">The Mission</h2>
                    <input class="center-block form-control text-field" type="text" name="ship1_quantity" placeholder="Enter Number of Ships" />
                    <select class="center-block form-control btn drp-dwn-width btn-default btn-lg dropdown-toggle" name="ship1_name">
                        <option value="">Choose a Ship</option>
                        <?php foreach ($ships as $key => $ship): ?>
                            <option value="<?php echo $key; ?>"><?php echo $ship['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <p class="text-center">AGAINST</p>
                    <br>
                    <input class="center-block form-control text-field" type="text" name="ship2_quantity" placeholder="Enter Number of Ships" />
                    <select class="center-block form-control btn drp-dwn-width btn-default btn-lg dropdown-toggle" name="ship2_name">
                        <option value="">Choose a Ship</option>
                        <?php foreach ($ships as $key => $ship): ?>
                            <option value="<?php echo $key; ?>"><?php echo $ship['name']; ?></option>
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
