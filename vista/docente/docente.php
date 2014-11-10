
<script type="text/javascript">
    var $a, $b;
    function eliminar(a) {
        if (confirm("Realmente deseas eliminar este registro")) {
            window.location = a;
        }
    }

    function nuevo() {
        window.location = "<?php echo BASE_URL ;?>docente/nuevo";
    }

    function editar(b) {
        window.location = b;
    }
</script>
<?php if (isset($this->docentes) && count($this->docentes)) : ?>
    <center>
        <table border="1" align="center" class='rwd-table'>
            </br>
           <tr>
               <form method="POST" action="<?php echo BASE_URL;?>docente">
                   <input type="text" name="dni" placeholder="Buscar con DNI"/>
                   <input type="submit"  value="Buscar"/>
               </form>
               &nbsp;&nbsp;<input type="button" onclick="nuevo()" class="imgedit" value="Nuevo">
           </tr>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Celular</td>
                <td>Email</td>
                <td>Edad</td>
                <td>Sexo</td>
                <td>Dni</td>
                <td>Contraseña</td>
                <td></td>
                <td></td>
            </tr>
            <?php for ($i = 0; $i < count($this->docentes); $i++): ?>

                <tr>
                    <td><?php echo $this->docentes[$i]['IdDocente']; ?></td>
                    <td><?php echo $this->docentes[$i]['Nombre']; ?></td>
                    <td><?php echo $this->docentes[$i]['ApellidoPaterno']; ?></td>
                    <td><?php echo $this->docentes[$i]['ApellidoMaterno']; ?></td>
                    <td><?php echo $this->docentes[$i]['Celular']; ?></td>
                    <td><?php echo $this->docentes[$i]['Email']; ?></td>
                    <td><?php echo $this->docentes[$i]['Edad']; ?></td>
                    <td><?php echo $this->docentes[$i]['Sexo']; ?></td>
                    <td><?php echo $this->docentes[$i]['Dni']; ?></td>
                    <td><?php echo $this->docentes[$i]['Contrasenia']; ?></td>
                    <td>
                        <input type="button"
                               onclick="editar('<?php echo BASE_URL ?>docente/editar/<?php echo $this->docente[$i]['IdDocente'] ?>')"
                               class="imgedit" value="editar"></td>
                    <td><input type="button"
                               onclick="eliminar('<?php echo BASE_URL ?>docente/eliminar/<?php echo $this->docente[$i]['IdDocente'] ?>')"
                               class="imgedit" value="eliminar">

                    </td>
                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de docentes!</strong></p>
    <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="imgedit"
                                                           value="Nuevo">

<?php endif; ?>
