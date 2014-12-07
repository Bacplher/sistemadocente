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

<script src='<?php echo $_layoutParams['ruta_js']; ?>jquery.js'></script>
</div>
</body>
</html>