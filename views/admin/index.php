<div class="container-fluid px-4">
    <h1 class="my-4 fw-bold"><?php echo $titulo?></h1>



    <div class="mb-4">
        <div class="container">
            <?php
                if ($resultado == 1) {
                    echo '<p class="alert alert-success">Persona Creada Correctamente</p>';
                } else if ($resultado == 2) {
                    echo '<p class="alert alert-success">Persona Actualizada Correctamente</p>';
                } else if ($resultado == 3) {
                    echo '<p class="alert alert-success">Persona Eliminada Correctamente</p>';
                }
            ?>

            <div class="mt-5 mb-3 text-end">
                <a class="btn btn-primary" href="/admin/crear">
                    <i class="fa-solid fa-circle-plus" style="padding-right:5px;"></i>
                    Añadir Persona
                </a>
            </div>

            <table id="datatables">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>

                <tbody>
                    <?php foreach($personas as $persona) { ?>
                        <tr>
                            <td>
                                <?php echo $persona->nombre . " ". $persona->apellido; ?>
                            </td>
                            <td>
                                <?php echo $persona->telefono; ?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="/admin/editar?id=<?php echo $persona->id; ?>" style="padding: 13px 18px">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="/admin/eliminar" class="table__formulario">
                                    <input type="hidden" name="id" value="<?php echo $persona->id; ?>">
                                    <button class="btn btn-danger" type="submit" style="padding: 15px 20px">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>