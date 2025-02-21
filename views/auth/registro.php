<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6" style="background-image: url('/build/img/portadabg.jpg'); background-size: cover; background-position: center;"></div>
            <div class="col-md-8 col-lg-6">
                <div class="d-flex align-items-center py-5" style="min-height: 100vh;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h1 class="auth__heading"><?php echo $titulo; ?></h1>

                                <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

                                <form method="POST" action="/registro" class="mt-3">
                                    <div class="formulario__campo">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text"
                                            name="nombre"
                                            id="nombre"
                                            class="form-control"
                                            placeholder="Tu Nombre"
                                            value="<?php echo $usuario->nombre; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text"
                                            name="apellido"
                                            id="apellido"
                                            class="form-control"
                                            placeholder="Tu Apellido"
                                            value="<?php echo $usuario->apellido; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="telefono" class="form-label">Telefono</label>
                                        <input type="number"
                                            name="telefono"
                                            id="telefono"
                                            class="form-control"
                                            placeholder="Tu Telefono"
                                            value="<?php echo $usuario->telefono; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"
                                            name="correo"
                                            id="email"
                                            class="form-control"
                                            placeholder="Tu Email"
                                            value="<?php echo $usuario->correo; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="usuario" class="form-label">Usuario</label>
                                        <input type="text"
                                            name="usuario"
                                            id="usuario"
                                            class="form-control"
                                            placeholder="Tu Usuario"
                                            value="<?php echo $usuario->usuario; ?>">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password"
                                            name="password"
                                            id="password"
                                            class="form-control"
                                            placeholder="Tu Password">
                                    </div>

                                    <div class="formulario__campo">
                                        <label for="password2" class="form-label">Repetir Password</label>
                                        <input type="password"
                                            name="password2"
                                            id="password2"
                                            class="form-control"
                                            placeholder="Repetir Password">
                                    </div>

                                    <div class="text-end mt-2">
                                        <a href="/" class="text-black">Ya tienes una cuenta? Inicia Sesión</a>
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
<main class="auth">

</main>