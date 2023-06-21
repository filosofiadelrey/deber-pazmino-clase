<?php
// TODO: Clase Clientes es un modelo
require_once('../models/cliente.model.php');
// TODO: Manejo de errores
error_reporting(0);
// TODO: Importación de Clase clientes
$Clientes = new cliente;

// Obtener la operación solicitada mediante el parámetro GET 'op'
$operacion = $_GET["op"];

switch ($operacion) {
    case 'todos':
        // Obtener todos los clientes
        $datos = $Clientes->todos();
        $todos = array();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        // Obtener un cliente específico
        $codigo_cliente = $_POST['codigo_cliente'];
        $datos = $Clientes->uno($codigo_cliente);
        $respuesta = mysqli_fetch_assoc($datos);
        echo json_encode($respuesta);
        break;

    case 'insertar':
        // Insertar un nuevo cliente
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
        $limite_credito = $_POST['limite_credito'];
        $datos = $Clientes->Insertar($nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);
        echo json_encode($datos);
        break;

    case 'actualizar':
        // Actualizar un cliente existente
        $codigo_cliente = $_POST['codigo_cliente'];
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $apellido_contacto = $_POST['apellido_contacto'];
        $telefono = $_POST['telefono'];
        $fax = $_POST['fax'];
        $linea_direccion1 = $_POST['linea_direccion1'];
        $linea_direccion2 = $_POST['linea_direccion2'];
        $ciudad = $_POST['ciudad'];
        $region = $_POST['region'];
        $pais = $_POST['pais'];
        $codigo_postal = $_POST['codigo_postal'];
        $codigo_empleado_rep_ventas = $_POST['codigo_empleado_rep_ventas'];
        $limite_credito = $_POST['limite_credito'];
        $datos = $Clientes->Actualizar($codigo_cliente, $nombre_cliente, $nombre_contacto, $apellido_contacto, $telefono, $fax, $linea_direccion1, $linea_direccion2, $ciudad, $region, $pais, $codigo_postal, $codigo_empleado_rep_ventas, $limite_credito);
        echo json_encode($datos);
        break;


        case 'eliminar':
           // Eliminar un cliente
           $codigo_cliente = $_POST['codigo_cliente'];
           $datos = array();
           $datos = $Clientes->Eliminar($codigo_cliente);
           echo json_encode($datos);
           break;
   }
   