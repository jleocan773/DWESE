<?php

    /*
        #Perfiles
        1. Administrador
        2. Editor
        3. Registrado

        Para ello vamos a definir variables como globales

        Perfiles	 	Nuevo	Editar	Eliminar	 Mostrar	Buscar 	Ordenar 
        ADMINISTRADOR	 SI	    SI	    SI	            SI	    SI	     SI
        EDITOR	 	     SI	    SI	    NO	            SI	    SI	     SI 
        REGISTRADO	 	 NO	    NO	    NO	            SI	    SI 	     SI
    */

    $GLOBALS['clientes']['main'] = [1, 2, 3];
    $GLOBALS['clientes']['nuevo'] = [1, 2];
    $GLOBALS['clientes']['editar'] = [1, 2];
    $GLOBALS['clientes']['delete'] = [1];
    $GLOBALS['clientes']['mostrar'] = [1,2,3];
    $GLOBALS['clientes']['buscar'] = [1,2,3];
    $GLOBALS['clientes']['ordenar'] = [1,2,3];
    $GLOBALS['clientes']['exportar'] = [1];
    $GLOBALS['clientes']['importar'] = [1];
    $GLOBALS['clientes']['pdf'] = [1,2];

    $GLOBALS['cuentas']['main'] = [1, 2, 3];
    $GLOBALS['cuentas']['nuevo'] = [1, 2];
    $GLOBALS['cuentas']['editar'] = [1, 2];
    $GLOBALS['cuentas']['delete'] = [1];
    $GLOBALS['cuentas']['mostrar'] = [1,2,3];
    $GLOBALS['cuentas']['buscar'] = [1,2,3];
    $GLOBALS['cuentas']['ordenar'] = [1,2,3];
    $GLOBALS['cuentas']['exportar'] = [1];
    $GLOBALS['cuentas']['importar'] = [1];
    $GLOBALS['cuentas']['pdf'] = [1,2];
    $GLOBALS['cuentas']['listarMovimientos'] = [1,2];
    
    $GLOBALS['movimientos']['main'] = [1, 2, 3];
    $GLOBALS['movimientos']['nuevo'] = [1, 2];
    $GLOBALS['movimientos']['mostrar'] = [1,2,3];
    $GLOBALS['movimientos']['buscar'] = [1,2,3];
    $GLOBALS['movimientos']['ordenar'] = [1,2,3];
    $GLOBALS['movimientos']['exportar'] = [1];
    $GLOBALS['movimientos']['importar'] = [1];
    $GLOBALS['movimientos']['pdf'] = [1,2];
    
    $GLOBALS['usuarios']['main'] = [1];
    $GLOBALS['usuarios']['nuevo'] = [1];
    $GLOBALS['usuarios']['editar'] = [1];
    $GLOBALS['usuarios']['delete'] = [1];
    $GLOBALS['usuarios']['mostrar'] = [1];
    $GLOBALS['usuarios']['buscar'] = [1];
    $GLOBALS['usuarios']['ordenar'] = [1];

    
    
