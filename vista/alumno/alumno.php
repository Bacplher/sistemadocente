<script type="text/javascript">
    var $a, $b;
    function eliminar(a) {
        if (confirm("Realmente deseas eliminar este registro")) {
            window.location = a;
        }
    }

    function nuevo() {
        window.location = "<?php echo BASE_URL ;?>alumno/nuevo";
    }

    function editar(b) {
        window.location = b;
    }
</script>
<?php if (isset($this->alumnos) && count($this->alumnos)) : ?>
    <center>
        <table border="1" align="center" class='rwd-table'>

            <tr>
                <br/>
                <form method="POST" action="<?php echo BASE_URL;?>alumno">
                    <input type="text" name="nombrealumno" placeholder="Buscar con Nombre"/>
                    <input type="submit"  value="Buscar"/>
                </form>&nbsp;&nbsp;
                <input type="button" onclick="nuevo()" class="imgedit" value="Nuevo">
            </tr>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Email</td>
                <td></td>
                <td></td>
            </tr>
            <?php for ($i = 0; $i < count($this->alumnos); $i++): ?>

                <tr>
                    <td><?php echo $this->alumnos[$i]['IdAlumno']; ?></td>
                    <td><?php echo $this->alumnos[$i]['Nombre']; ?></td>
                    <td><?php echo $this->alumnos[$i]['ApellidoPaterno']; ?></td>
                    <td><?php echo $this->alumnos[$i]['ApellidoMaterno']; ?></td>
                    <td><?php echo $this->alumnos[$i]['Email']; ?></td>
                    <td>
                        <input type="button"
                               onclick="editar('<?php echo BASE_URL ?>alumno/editar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')"
                               class="imgedit" value="editar"></td>
                    <td><input type="button"
                               onclick="eliminar('<?php echo BASE_URL ?>alumno/eliminar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')"
                               class="imgedit" value="eliminar">

                    </td>
                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de alumno!</strong></p>
    <p><strong>Inserte un nuevo Alumno </strong></p>
    <table>
        <tr>
            <form method="POST" action="<?php echo BASE_URL;?>alumno">
                <input type="text" name="nombrealumno" placeholder="Buscar con Nombre"/>
                <input type="submit"  value="Buscar"/>
            </form>&nbsp;&nbsp;
            <input type="button" onclick="nuevo()" class="imgedit" value="Nuevo">
        </tr>
    </table>

<?php endif; ?>