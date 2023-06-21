<?php
require_once('../models/gama_productos.model.php');
error_reporting(0);
$gamaP = new gama_productosModel;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $gamaP->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $gama  = $_POST['gama'];
        $datos = array();
        $datos = $gamaP->uno($gama);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $gama  = $_POST['gama'];
        $descripcion_texto = $_POST['descripcion_texto'];
        $descripcion_html = $_POST['descripcion_html'];
        $imagen  = $_POST['imagen'];
        $datos = array();
        $datos = $gamaP->Insertar($gama, $descripcion_texto, $descripcion_html, $imagen);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $gama  = $_POST['gama'];
        $descripcion_texto = $_POST['descripcion_texto'];
        $descripcion_html = $_POST['descripcion_html'];
        $imagen  = $_POST['imagen'];
        $datos = array();
        $datos = $gamaP->Actualizar($gama, $descripcion_texto, $descripcion_html, $imagen);
        echo json_encode($datos);
        break;
        
    case 'eliminar':
        $gama  = $_POST['gama'];
        $datos = array();
        $datos = $gamaP->Eliminar($gama);
        echo json_encode($datos);
        break;
}
