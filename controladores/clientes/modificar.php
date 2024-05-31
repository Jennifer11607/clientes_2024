<?php

require '../../modelos/Cliente.php';

// VALIDAR INFORMACION
$_POST['cli_id'] = filter_var(base64_decode($_POST['cli_id']), FILTER_SANITIZE_NUMBER_INT);
$_POST['cli_nombre'] = htmlspecialchars($_POST['cli_nombre']);
$_POST['cli_apellido'] = htmlspecialchars($_POST['cli_apellido']);
$_POST['cli_nit'] = filter_var($_POST['cli_nit'], FILTER_VALIDATE_INT);
$_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_VALIDATE_INT);





if ($_POST['cli_nombre'] == '' || $_POST['cli_apellido'] == '' || $_POST['cli_nit'] < 0 || $_POST['cli_telefono'] < 0) {
    // ALERTA PARA  PODER VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ]; 
} else {
    try {
        // PARA PODER REALIZAR CONSULTA
        $cliente = new Cliente($_POST);


        $modificar = $cliente->modificar();

        $resultado = [
            'mensaje' => 'CLIENTE MODIFICADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR MODIFICANDO EL REGISTRO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


 echo "<br>"; 
 echo "<br>"; 
 echo "<br>"; 

include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/clientes/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php';?>