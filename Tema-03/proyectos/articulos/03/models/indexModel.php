<?php

/*
    Modelo: indexModel.php
    Descripción: Incluye funciones y genera los datos de los artículos y categorías

    */

setlocale(LC_MONETARY, "es_ES");
$articulos = generar_tabla_articulos();
$categorias = generar_tabla_categorias();
