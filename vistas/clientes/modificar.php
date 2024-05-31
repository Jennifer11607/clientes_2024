<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/Cliente.php';

$_GET['cli_id'] = filter_var(base64_decode($_GET['cli_id']), FILTER_SANITIZE_NUMBER_INT);
$cliente = new Cliente();
$ClienteRegistrado = $cliente->buscarId($_GET['cli_id']);

?>

<br>
<br>

<?php include_once '../../vistas/templates/header.php'; ?>



<h1 class="text-center mt-5">MODIFICAR FORMULARIO DE CLIENTES</h1>
<div class="row justify-content-center">
    <form action="/clientes_2024/controladores/clientes/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
      
   
    <input type="hidden" name="cli_id" id="cli_id" value="<?= $ClienteRegistrado['cli_id']?>">
    <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="cli_id" id="cli_id" class="form-control" value="<?= $ClienteRegistrado ['cli_id'] ?>" >
            </div>
        </div>

    <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">NOMBRE</label>
                <input type="text" name="cli_nombre" id="cli_nombre" class="form-control" value="<?= $ClienteRegistrado ['cli_nombre'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">APELLIDO</label>
                <input type="text" name="cli_apellido" id="cli_apellido" class="form-control" value="<?= $ClienteRegistrado ['cli_apellido'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">NIT</label>
                <input type="number" name="cli_nit" id="cli_nit" class="form-control" value="<?= $ClienteRegistrado ['cli_nit'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">TELEFONO</label>
                <input type="number" name="cli_telefono" id="cli_telefono" class="form-control" value="<?= $ClienteRegistrado['cli_telefono'] ?>" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-secondary w-100">MODIFICAR</button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="../../controladores/clientes/buscar.php" class="btn btn-secondary bg-warning w-100">Cancelar</a>
            </div>
        </div>
        
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php';?>
