<?php
require_once('../models/pagos.model.php');
error_reporting(0);
//TODO: Importacion de clase pagos
$Pagos = new PagosModel;
switch ($_GET['OP']) {
    case 'todos':
        $datos = array();
        $datos = $Pagos->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $codigo_cliente = $_POST['codigo_cliente'];
        $id_transaccion = $_POST['id_transaccion'];
        $datos = array();
        $resultadoConsulta = $Pagos->uno($codigo_cliente, $id_transaccion); // Suponiendo que el método 'uno' devuelve un objeto mysqli_result
        if ($resultadoConsulta instanceof mysqli_result) {
            $datos = mysqli_fetch_assoc($resultadoConsulta);
            echo json_encode($datos);
        } else {
            // Manejar el caso cuando $resultadoConsulta no es un objeto mysqli_result válido
            // Mostrar un mensaje de error o tomar la acción apropiada
        }
        break;


    case 'insertar':
        $codigo_cliente  = $_POST['codigo_oficina '];
        $forma_pago  = $_POST['forma_pago'];
        $id_transaccion = $_POST['id_transaccion'];
        $fecha_pago = $_POST['fecha_pago'];
        $codigo_postal = $_POST['codigo_postal'];
        $total = $_POST['total'];
        $datos = array();
        $datos = $Pagos->Insertar($codigo_cliente, $forma_pago, $id_transaccion, $fecha_pago, $codigo_postal, $proveedor, $total);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_transaccion = $_POST['id_transaccion'];
        $datos = array();
        $datos = $Pagos->Eliminar($id_transaccion);
        echo json_encode($datos);
        break;
}
