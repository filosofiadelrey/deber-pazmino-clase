<?php
//TODO: Clase Pedido es un modelo
require_once('../models/pedido.model.php');
//TODO: Manejo de errores
error_reporting(0);
//TODO: Importación de Clase pedidos
$Pedido = new pedido;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $Pedido->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_pedido  = $_POST['codigo_producto'];
        $datos = array();
        $datos = $codigo_pedido->uno($codigo_pedido);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        $fecha_pedido = $_POST['fecha_pedido'];
        $fecha_pedidoma  = $_POST['fecha_pedido '];
        $fecha_entrega = $_POST['fecha_entrega'];
        $estado = $_POST['estado'];
        $comentarios = $_POST['comentarios'];
        $codigo_cliente  = $_POST['codigo_cliente '];
        $datos = array();
        $datos = $Pedido->Insertar($fecha_pedido, $fecha_pedidoma, $fecha_entrega, $estado, $comentarios, $codigo_cliente);
        echo json_encode($datos);
        break;
        
    case 'actualizar':
        $codigo_pedido  = $_POST['codigo_pedido'];
        $fecha_pedido = $_POST['fecha_pedido'];
        $fecha_pedidoma  = $_POST['fecha_pedido '];
        $fecha_entrega = $_POST['fecha_entrega'];
        $estado = $_POST['estado'];
        $comentarios = $_POST['comentarios'];
        $codigo_cliente  = $_POST['codigo_cliente '];
        $datos = array();
        $datos = $Pedido->Actualizar(  $codigo_pedido,$fecha_pedido, $fecha_pedidoma, $fecha_entrega, $estado, $comentarios, $codigo_cliente);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $codigo_pedido  = $_POST['codigo_pedido'];
        $datos = array();
        $datos = $Pedido->Eliminar($codigo_pedido);
        echo json_encode($datos);
        break;
}