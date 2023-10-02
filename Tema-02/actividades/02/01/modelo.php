<?php
    $tiburon = "Tiburón Duende";
    echo 'Valor de la variable $tiburon:';
    var_dump($tiburon);
    echo "<br>";

    $int = intval($tiburon);
    echo 'Valor de la variable $tiburon en intval:';
    var_dump($int);
    echo "<br>";

    $bool = boolval($tiburon);
    echo 'Valor de la variable $tiburon en boolval:';
    var_dump($bool);
    echo "<br>";

    $str = strval($tiburon);
    echo 'Valor de la variable $tiburon en strval:';
    var_dump($str);
    echo "<br>";

    $floatval = floatval($tiburon);
    echo 'Valor de la variable $tiburon en floatval:';
    var_dump($floatval);

?>