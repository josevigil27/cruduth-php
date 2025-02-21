<div class="container-fluid px-4">
    <h1 class="mt-4 fw-bold"><?php echo $titulo?></h1>

    <div class="mt-5 mb-3 text-end">
        <a class="btn btn-primary" href="/admin/">
            <i class="fa-solid fa-circle-arrow-left" style="padding-right:5px;"></i>
            Volver
        </a>
    </div>

    <div>
        <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

        <form method="POST" enctype="multipart/form-data" class="container">
            <?php include_once __DIR__ . '/formulario.php'; ?>
            <input class="btn btn-primary w-100" type="submit" value="Actualizar Persona">
        </form>
    </div>
</div>