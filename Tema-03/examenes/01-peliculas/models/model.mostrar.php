<?php

    /*

        Modelo: model.mostrar.PHP

        - Carga los datos
        - Recibo por GET indice de la película que se desea mostrar

    */

    
    
   $peliculas = getPeliculas();
   $paises = getPaises();
   $generos = getGeneros();
   
   

   
   
   
   $pelicula = [
       'titulo' => $titulo,
       'pais' => $pais,
       'director' => $director,
       'generos' => $generos,
       'año' => $año
   ];
   
   


?>