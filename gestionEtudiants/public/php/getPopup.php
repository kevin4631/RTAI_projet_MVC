<?php
// affiche les erreures php pour debuger
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/


function getPopUp($pageLink)
{
    $content = @file_get_contents($pageLink);

    if ($content === false) {
        echo "Erreur lors de la récupération du contenu";
    } else {
        echo $content;
    }
}

$pageLink = isset($_POST['pageLink']) ? $_POST['pageLink'] : null;

if ($pageLink == null) {
    echo "link null";
} else {
    getPopUp($pageLink);
}
