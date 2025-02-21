<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu" style="background-color: #282c31;">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link <?php echo pagina_actual('/usuarios') ? 'active' : ''; ?>" href="/admin/">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Usuarios
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small" style="font-weight: 300">Usuario:</div>
            <?php echo $_SESSION['usuario']; ?>
        </div>
    </nav>
</div>