<?php
    $tiburon = "Tiburón Duende";
    echo 'Valor de la variable $tiburon:';
    var_dump($tiburon);
    echo "<br>";

    $intTiburon = (int) $tiburon;
    echo 'Valor de la variable $tiburon en (int) $tiburon:';
    var_dump($intTiburon);
    echo "<br>";

    $booleanTiburon = (boolean) $tiburon;
    echo 'Valor de la variable $tiburon en (boolean) $tiburon:';
    var_dump($booleanTiburon);
    echo "<br>";

    $stringTiburon = (string) $tiburon;
    echo 'Valor de la variable $tiburon en (string) $tiburon:';
    var_dump($stringTiburon);
    echo "<br>";

    $floatTiburon = (float) $tiburon;
    echo 'Valor de la variable $tiburon en (float) $tiburon:';
    var_dump($floatTiburon);

    $arrayTiburon = (array) $tiburon;
    echo 'Valor de la variable $tiburon en (array) $tiburon:';
    var_dump($arrayTiburon);
?>