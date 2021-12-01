<?php
    $dateUne = new DateTime();
    $dateDeux = $dateUne;

    $dateDeux->modify('+1 day');

    var_dump($dateUne,$dateDeux);
?>