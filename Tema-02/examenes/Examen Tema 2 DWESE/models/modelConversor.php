<?php


    $valorDecimal = intval($_POST["valorDecimal"]);

    $valorBinario = decbin($valorDecimal);
    $valorHexadecimal = dechex($valorDecimal);
    $valorOctal = decoct($valorDecimal);


?>