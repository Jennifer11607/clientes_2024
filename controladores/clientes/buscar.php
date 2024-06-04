<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/Cliente.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['cli_nombre'] = htmlspecialchars( $_GET['cli_nombre']);
        $_GET['cli_apellido'] = htmlspecialchars( $_GET['cli_apellido']);



        $nuevabusqueda = new Cliente($_GET);
        $clientes = $nuevabusqueda->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'detalle' => $clientes,
            'codigo' => 1
        ];
        // var_dump($clientes);
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }       
 
    
    $alertas = ['danger', 'success', 'warning'];

    echo '<br>';
    echo '<br>';
    echo '<br>';

    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center mt-5">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/clientes/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de clientes</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nit</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($clientes) > 0) : ?>
                        <?php foreach ($clientes as $key => $opciones) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $opciones['cli_nombre'] ?></td>
                                <td><?= $opciones['cli_apellido'] ?></td>
                                <td><?= $opciones['cli_nit'] ?></td>
                                <td><?= $opciones['cli_telefono'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        
                                    <li><a class="dropdown-item" href="../../vistas/clientes/modificar.php?cli_id=<?= base64_encode( $opciones['cli_id'] ) ?> "><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                    <li><a class="dropdown-item" href="/crud_2024/controladores/producto/eliminar.php?prod_id=<?= base64_encode($opciones['prod_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                   
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay clientes registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>   
    
    
    <script>

        // function alerta_eliminar(id){
        //     if(confirm("¿Esta segurdo que desea eliminar este registro?")){
        //         location.href = "/crud_2024/controladores/producto/eliminar.php?prod_id=" + id
        //     }
        // }

    </script>
    
<?php include_once '../../vistas/templates/footer.php';?>