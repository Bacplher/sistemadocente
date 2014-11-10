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
        <table border="0" align="center">
           <tr>
               <td>Buscar</td>
               <td><input type="text" class="k-textbox" placeholder="Ingrese Nombre" name="Nombre"
                          id="Nombre" /></td>
               <td><a>Ir</a></td>
               <td><button type="button" onclick="nuevo()" class="btn btn-primary" value="Nuevo">Nuevo</td>
           </tr>
        </table>
        <table border="1" align="center" class='table table-bordered table-hover'>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Email</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
            <?php for ($i = 0; $i < count($this->alumnos); $i++): ?>

                <tr>
                    <td><?php echo $this->alumnos[$i]['IdAlumno']; ?></td>
                    <td><?php echo $this->alumnos[$i]['Nombre']; ?></td>
                    <td><?php echo $this->alumnos[$i]['ApellidoPaterno']; ?></td>
                    <td><?php echo $this->alumnos[$i]['ApellidoMaterno']; ?></td>
                    <td><?php echo $this->alumnos[$i]['Email']; ?></td>
                    <td>
                        <input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>actualizar.png" width="35px" height="35px"
                               onclick ="editar('<?php echo BASE_URL ?>alumno/editar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')"
                        class="imgedit" value="editar"></td>
                    <td><input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>eliminar.png" width="35px" height="35px"
                               onclick="eliminar('<?php echo BASE_URL ?>alumno/eliminar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')"
                               class="imgedit" value="eliminar">

                    </td>
                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de alumno!</strong></p>
    <p><strong>Inserte un nuevo Alumno </strong></p><input type="button" onclick="nuevo()" class="btn btn-primaria"
                                                           value="Nuevo">

<?php endif; ?>