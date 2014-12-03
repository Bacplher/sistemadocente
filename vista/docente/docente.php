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
<?php if (isset($this->docente) && count($this->docente)) : ?>
    <center>
        <table border="0" align="center">
            <tr>
                <br/>
                <br/>
                <form method="POST" action="<?php echo BASE_URL;?>docente">
                    <input type="text" name="nombredocente" placeholder="Buscar con Nombre"/>&nbsp;
                    <input type="submit"  value="Buscar"/>
                </form>&nbsp;&nbsp;

                <button type="button" onclick="nuevo()" class="btn btn-primary" value="Nuevo">Nuevo

            </tr>
        </table>
        <table border="1" align="center" class='table table-bordered table-hover'>
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
                <td>Clave</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
            <?php for ($i = 0; $i < count($this->docente); $i++): ?>

                <tr>
                    <td><?php echo $this->docente[$i]['IdDocente']; ?></td>
                    <td><?php echo $this->docente[$i]['Nombre']; ?></td>
                    <td><?php echo $this->docente[$i]['ApellidoPaterno']; ?></td>
                    <td><?php echo $this->docente[$i]['ApellidoMaterno']; ?></td>
                    <td><?php echo $this->docente[$i]['Celular']; ?></td>
                    <td><?php echo $this->docente[$i]['Email']; ?></td>
                    <td><?php echo $this->docente[$i]['Edad']; ?></td>
                    <td><?php echo $this->docente[$i]['Sexo']; ?></td>
                    <td><?php echo $this->docente[$i]['Dni']; ?></td>
                    <td><?php echo $this->docente[$i]['Clave']; ?></td>
                    <td>
                        <input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>actualizar.png" width="35px"
                               height="35px"
                               onclick="editar('<?php echo BASE_URL ?>docente/editar/<?php echo $this->docente[$i]['IdDocente'] ?>')"
                               class="imgedit" value="editar">
                    </td>
                    <td><input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>eliminar.png" width="35px"
                               height="35px"
                               onclick="eliminar('<?php echo BASE_URL ?>docente/eliminar/<?php echo $this->docente[$i]['IdDocente'] ?>')"
                               class="imgedit" value="eliminar">

                    </td>
                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de Docente!</strong></p>
    <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                            value="Nuevo">

<?php endif; ?>