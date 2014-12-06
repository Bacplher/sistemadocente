<script type="text/javascript">
    var $a, $b;
    function salir(a) {
        if (confirm("Realmente deseas salir")) {
            window.location = a;
        }
    }
</script>
<div id="footer">
    Copyright &copy: 2014 <?php echo APP_COMPANY; ?>
</div>
<div id="sesion" >
    BIENVENIDO:
    <?php if(Session::get('autenticado')){ ?>
    <label><?php echo Session::get('Nombre');?></label>
    <input type="button" onclick="salir('<?php echo BASE_URL ?>index')" class="imgedit" value="salir">
</div>
<?php }else{ ?>
    <?php echo "No sale";?>
<?php } ?>
    <script src='<?php echo $_layoutParams['ruta_js']; ?>jquery.js'></script>
</div>
</body>
</html>