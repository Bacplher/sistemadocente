<script type="text/javascript">
    var $a, $b;
    function eliminar(a) {
        if (confirm("Realmente deseas eliminar este registro")) {
            window.location = a;
        }
    }

    function nuevo() {
        window.location = "<?php echo BASE_URL ;?>tipoperiodo/nuevo";
    }

    function editar(b) {
        window.location = b;
    }
</script>
<?php if (isset($this->tipoperiodo) && count($this->tipoperiodo)) : ?>
    <center>
        <table border="0" align="center">
            <tr>
                <td>Buscar</td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Tipo Periodo" name="TipoPeriodo"
                           id="TipoPeriodo"/></td>
                <td><a>Ir</a></td>
                <td>
                    <button type="button" onclick="nuevo()" class="btn btn-primary" value="Nuevo">Nuevo
                </td>
            </tr>
        </table>
        <table border="1" align="center" class='table table-bordered table-hover'>
            <tr>
                <td>Codigo</td>
                <td>Descripcion</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
            <?php for ($i = 0; $i < count($this->tipoperiodo); $i++): ?>

                <tr>
                    <td><?php echo $this->tipoperiodo[$i]['IdTipoPeriodo']; ?></td>
                    <td><?php echo $this->tipoperiodo[$i]['Descripcion']; ?></td>
                    <td>
                        <input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>actualizar.png" width="35px"
                               height="35px"
                               onclick="editar('<?php echo BASE_URL ?>tipoperiodo/editar/<?php echo $this->tipoperiodo[$i]['IdTipoPeriodo'] ?>')"
                               class="imgedit" value="editar"></td>
                    <td><input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>eliminar.png" width="35px"
                               height="35px"
                               onclick="eliminar('<?php echo BASE_URL ?>tipoperiodo/eliminar/<?php echo $this->tipoperiodo[$i]['IdTipoPeriodo'] ?>')"
                               class="imgedit" value="eliminar">

                    </td>
                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de TipoPeriodo!</strong></p>
    <p><strong>Inserte un nuevo TipoPeriodo </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                                value="Nuevo">

<?php endif; ?>