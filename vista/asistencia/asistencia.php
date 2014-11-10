<script type="text/javascript">
    var $a, $b;
    function eliminar(a) {
        if (confirm("Realmente deseas eliminar este registro")) {
            window.location = a;
        }
    }

    function nuevo() {
        window.location = "<?php echo BASE_URL ;?>asistencia/nuevo";
    }

    function editar(b) {
        window.location = b;
    }
</script>
<?php if (isset($this->asistencia) && count($this->asistencia)) : ?>
    <center>
        <table border="1" align="center" class='rwd-table'>
            <tr>
                <td>Codigo Alumno</td>
                <td>Codigo Clase</td>
                <td>Asistio</td>
                <td>Observaciones </td>
                <td><input type="button" onclick="nuevo()" class="imgedit" value="Nuevo"></td>
                <td></td>
            </tr>
            <?php for ($i = 0; $i < count($this->asistencia); $i++): ?>

                <tr>
                    <td><?php echo $this->asistencia[$i]['alumno_IdAlumno']; ?></td>
                    <td><?php echo $this->asistencia[$i]['clase_IdClase']; ?></td>
                    <td><?php echo $this->asistencia[$i]['Asistio']; ?></td>
                    <td><?php echo $this->asistencia[$i]['Observaciones']; ?></td>
                    <td>
                        <input type="button"
                               onclick="editar('<?php echo BASE_URL ?>asistencia/editar/<?php echo $this->asistencia[$i]['alumno_IdAlumno'], $this->asistencia[$i]['clase_IdClase'] ?>')"
                               class="imgedit" value="editar"></td>
                    <td><input type="button"
                               onclick="eliminar('<?php echo BASE_URL ?>asistencia/eliminar/<?php echo $this->asistencia[$i]['alumno_IdAlumno'], $this->asistencia[$i]['clase_IdClase'] ?>')"
                               class="imgedit" value="eliminar">

                    </td>
                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de asistencia!</strong></p>
    <p><strong>Inserte un nuevo registro de asistencia </strong></p><input type="button" onclick="nuevo()" class="imgedit"
                                                           value="Nuevo">

<?php endif; ?>