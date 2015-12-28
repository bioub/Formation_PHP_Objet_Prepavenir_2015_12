<?php
require_once './classes/Prepavenir/Entity/Societe.php';
require_once './classes/Prepavenir/Entity/Contact.php';

$darty = new Societe();
$darty->setNom('Darty');
$darty->setVille('Sannois');

$contact = new Contact();
$contact->setPrenom('Eric');
$contact->setNom('Martin');
$contact->setEmail('eric.martin@darty.fr');
$contact->setTelephone('01 35 67 84 56');
$contact->setSociete($darty);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Détails d'un contact</title>
    </head>
    <body>
        <h2>Détails d'un contact</h2>
        <table>
            <tr>
                <th>Prénom</th>
                <td><?=$contact->getPrenom()?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?=$contact->getNom()?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?=$contact->getEmail()?></td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td><?=$contact->getTelephone()?></td>
            </tr>
            <tr>
                <th>Société</th>
                <td><?=$contact->getSociete()->getNom()?></td>
            </tr>
        </table>
    </body>
</html>
