<script type="text/javascript">
    var $a, $b;
    function eliminar(a) {
        if (confirm("Realmente deseas eliminar este registro")) {
            window.location = a;
        }
    }

    function nuevo() {
        window.location = "<?php echo BASE_URL ;?>perfil/nuevo";
    }

    function editar(b) {
        window.location = b;
    }
</script>
<?php if (isset($this->perfil) && count($this->perfil)) : ?>
    <center>
        <table border="0" align="center">
            <tr>
                 <td><h4>Bienvenido(a) profesor(a)<?php echo ' '.$this->perfil[1]['Nombre']; ?></h4></td>
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
            </tr>
            <?php for ($i = 0; $i < count($this->perfil); $i++): ?>

                <tr>
                    <td><?php echo $this->perfil[$i]['IdDocente']; ?></td>
                    <td><?php echo $this->perfil[$i]['Nombre']; ?></td>
                    <td><?php echo $this->perfil[$i]['ApellidoPaterno']; ?></td>
                    <td><?php echo $this->perfil[$i]['ApellidoMaterno']; ?></td>
                    <td><?php echo $this->perfil[$i]['Celular']; ?></td>
                    <td><?php echo $this->perfil[$i]['Email']; ?></td>
                    <td><?php echo $this->perfil[$i]['Edad']; ?></td>
                    <td><?php echo $this->perfil[$i]['Sexo']; ?></td>
                    <td><?php echo $this->perfil[$i]['Dni']; ?></td>

                </tr>

            <?php endfor; ?>
        </table>
    </center>

<?php else: ?>

    <p><strong>No hay Registro de Docente!</strong></p>
    <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                            value="Nuevo">

<?php endif; ?>