<?php
    foreach($alertas as $key => $alerta) {
        foreach($alerta as $mensaje) {
?>

    <div class="alert alert-<?php echo $key;?>"><?php echo $mensaje; ?></div>

<?php
        }
    }
?>