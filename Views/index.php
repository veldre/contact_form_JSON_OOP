<?php

use Controllers\UsersController;

$users = UsersController::getUsers();
?>

<section class="container">
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr class="row text-center justify-content-center">
            <th class="col">Vārds, uzvārds</th>
            <th class="col">Dzimšanas datums</th>
            <th class="col">Foto</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr class="row text-center justify-content-center width">
                <td class="col"><?= $user->getName() ?></td>
                <td class="col"><?= $user->getBirthDate() ?></td>
                <td class="col"><img src="<?= $user->getPhoto() ?>" width="100px"></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>


