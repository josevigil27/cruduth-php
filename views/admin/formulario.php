<div class="row mb-3">
    <div class="col">
        <label for="usuario" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Tu Nombre" aria-label="Nombre" value="<?php echo $persona->nombre; ?>">
    </div>
    <div class="col">
        <label for="usuario" class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" placeholder="Tu Apellido" aria-label="Apellido" value="<?php echo $persona->apellido; ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <label for="usuario" class="form-label">Cedula</label>
        <input type="text" name="cedula" class="form-control" placeholder="Tu Cedula" aria-label="Cedula" value="<?php echo $persona->cedula; ?>">
    </div>
    <div class="col">
        <label for="usuario" class="form-label">Telefono</label>
        <input type="text" name="telefono" class="form-control" placeholder="Tu Telefono" aria-label="Telefono" value="<?php echo $persona->telefono; ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <label for="usuario" class="form-label">Fecha Nacimiento</label>
        <input type="date" name="fecha_nac" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $persona->fecha_nac; ?>">
    </div>
</div>
