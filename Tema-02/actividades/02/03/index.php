<?php
    $tiburon = "Tiburón Duende";
    echo 'Valor de la variable $tiburon:';
    var_dump($tiburon);
    echo "<br>";

    settype($tiburon, "integer");
    echo 'Valor de la variable $tiburon en (int) $tiburon:';
    var_dump($tiburon);
    echo "<br>";

    settype($tiburon, "boolean");
    echo 'Valor de la variable $tiburon en (boolean) $tiburon:';
    var_dump($tiburon);
    echo "<br>";

    settype($tiburon, "string");
    echo 'Valor de la variable $tiburon en (string) $tiburon:';
    var_dump($tiburon);
    echo "<br>";

    settype($tiburon, "float");
    echo 'Valor de la variable $tiburon en (float) $tiburon:';
    var_dump($tiburon);
?>