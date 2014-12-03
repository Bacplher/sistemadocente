<div id="footer">
    Copyright &copy: 2014 <?php echo APP_COMPANY; ?>
</div>
<div id="principal">
<!--    <div id="siscom"><h1 class="k-label">SISTEMA DOCENTE</h1></div>-->
    <div id="sesion">
        <div id="userSesion"><label><?php echo session::get('docente') ?></label></div>
        <div id="linkSesion">
            <label><?php echo session::get('perfil') ?></label> |
            <a href="<?php echo BASE_URL ?>index">cerrar sesion</a>
        </div>
        <div id="servidorSesion">
            <!--<label><?php /*echo Main::get_servidor() */?></label> |
            <label>IP: <?php /*echo $_SERVER['SERVER_NAME'] */?></label>-->
        </div>
    </div>
    <script src='<?php echo $_layoutParams['ruta_js']; ?>jquery.js'></script>
</div>
</body>
</html>