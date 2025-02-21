<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6" style="background-image: url('/build/img/portadamw.webp'); background-size: cover; background-position: center;"></div>
            <div class="col-md-8 col-lg-6">
                <div class="d-flex align-items-center py-5" style="min-height: 100vh;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h2>Registro de Usuarios</h2>
                                <p><?php echo $titulo; ?></p>

                                <?php 
                                    require_once __DIR__ . '/../templates/alertas.php'; 
                                    
                                    if (isset($resultado) == 1) {
                                        echo '<p class="alert alert-success">Usuario Registrado Correctamente</p>';
                                    }
                                ?>    

                                <form method="POST" action="/" class="formulario">
                                    <div class="formulario__campo">
                                        <label for="usuario" class="form-label">Usuario</label>
                                        <input type="text"
                                            name="usuario"
                                            id="usuario"
                                            class="form-control"
                                            placeholder="Tu Usuario">
                                    </div>
                                    
                                    <div class="formulario__campo">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" 
                                            name="password" 
                                            id="password" 
                                            class="form-control"
                                            placeholder="Tu Password">
                                    </div>

                                    <div class="text-end mt-2">
                                        <a href="/registro" class="text-black">No tienes cuenta? Crea una</a>
                                    </div>

                                    <div class="text-end">
                                        <input type="submit" value="Iniciar Sesion" class="btn btn-primary mt-2 align-content-end">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>