# Apuntes PHP

PHP es **case_sensitive** por lo que es importante no equivocarse a la hora de poner los nombres a las ***Variables***:

    for ($contador=0; $contador<10; $Contador++)
    miFuncion( );

Aquí la última variable tiene un nombre diferente por lo que el bucle no llegaría a acabar nunca.

Es importante el uso de las comillas adecuadas:

    $hora = 12;
    $minutos = 15;
    $ciudad = “Sevilla”;
    $texto = "El tren destino $ciudad sale a las $hora:$minutos”;
    echo $texto;
    // la salida será El tren destino Sevilla sale a las 12:15


    echo "\$test: ";

Este echo pintaría $test, si no escapamos el símbolo del dólar pondría el valor de la variable, que en este caso al ser false no pondría nada.

Se sustituirían los valores porque estamos usando las comillas dobles, si usasemos las comillas simples en su lugar, saldría el texto literal.

var_dump es una función que nos da información sobre la variable que introducimos en ella, su nombre, tipo, valor, etc.

También podemos crear ***Constantes*** de la siguiente manera

define("pi", 3.14);

Si usamos una variable que no hayemos inicializado su valor será 0, por ejemplo:
    var1 = 100;
    var3 = 100 + var2; <- Aquí var3 valdría 100 porque 100+0=100

Para pasar variables de un tipo a otros tenemos diferentes mecanismos
    string strval (mixed variable)
    integer intval (mixed variable)
    float floatval(mixed variable)

Si pasamos un String como "Sevilla" a Integer, se pondría un 0.
Si pasamos un String que empiece con un número al comienzo como "9Sevilla", se pondría un 9.

