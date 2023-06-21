<?php
//TODO: archvios externos
require_once('../models/oficinas.models.php');
//TODO: Manejo de reportes
error_reporting(0);
//TODO: Importacion de clase oficina
$Oficinas = new OficinasModel;
switch ($_GET['OP']) {
    case 'todos':
        $datos = array();
        $datos = $Oficinas->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_producto  = $_POST['codigo_producto '];
        $datos = array();
        $datos = $Oficinas->uno($codigo_oficina);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
            $codigo_oficina  = $_POST['codigo_oficina '];
            $ciudad = $_POST['ciudad'];
            $pais  = $_POST['pais '];
            $region = $_POST['region'];
            $proveedor = $_POST['proveedor'];
            $codigo_postal = $_POST['codigo_postal'];
            $telefono = $_POST['telefono'];
            $linea_direccion1 = $_POST['linea_direccion1'];
            $linea_direccion2 = $_POST['linea_direccion2'];
            $datos = array();
            $datos = $Oficinas->Insertar($codigo_oficina,$ciudad,$pais,$region,$proveedor,$proveedor, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2);
            echo json_encode($datos);
            break;



    case 'actulizar':
        $codigo_oficina  = $_POST['codigo_oficina '];
        $ciudad = $_POST['ciudad'];
        $pais  = $_POST['pais '];
        $region = $_POST['region'];
        $proveedor = $_POST['proveedor'];
        $codigo_postal = $_POST['codigo_postal'];
        $telefono = $_POST['telefono'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
         $datos = array();
         $datos = $Oficinas->Actualizar($codigo_oficina,$ciudad,$pais,$region,$proveedor,$proveedor, $codigo_postal,$telefono,$linea_direccion1,$linea_direccion2);
         echo json_encode($datos);
         break;

    case 'eliminar':
        $codigo_oficina  = $_POST['codigo_oficina '];
        $datos = array();
        $datos = $Oficinas->Eliminar($codigo_producto);
        echo json_encode($datos);
        break;
}

