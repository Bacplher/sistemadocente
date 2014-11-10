<script type="text/javascript">
    var $a, $b;
    function eliminar(a) {
        if (confirm("Realmente deseas eliminar este registro")) {
            window.location = a;
        }
    }

    function nuevo() {
        window.location = "<?php echo BASE_URL ;?>tipocriterio/nuevo";
    }

    function editar(b) {
        window.location = b;
    }
</script>
<?php if (isset($this->tipocriterio) && count($this->tipocriterio)) : ?>
    <center>
        <table border="0" align="center">
            <tr>
                <td>Buscar</td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Tipo Criterio" name="Tipocriterio"
                           id="Tipocriterio"/></td>
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
            <?php for ($i = 0; $i < count($this->tipocriterio); $i++): ?>

                <tr>
                    <td><?php echo $this->tipocriterio[$i]['IdTipoCriterio']; ?></td>
                    <td><?php echo $this->tipocriterio[$i]['Descripcion']; ?></td>
                    <td>
                        <input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>actualizar.png" width="35px"
                               height="35px"
                               onclick="editar('<?php echo BASE_URL ?>tipocriterio/editar/<?php echo $this->tipocriterio[$i]['IdTipoCriterio'] ?>')"
                               class="imgedit" value="editar"></td>
                    <td><input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>eliminar.png" width="35px"
                               height="35px"
                               onclick="eliminar('<?php echo BASE_URL ?>tipocriterio/eliminar/<?php echo $this->tipocriterio[$i]['IdTipoCriterio'] ?>')"
                               class="imgedit" value="eliminar">

                    </td>
                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de tipocriterio!</strong></p>
    <p><strong>Inserte un nuevo tipocriterio </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                                 value="Nuevo">

<?php endif; ?>