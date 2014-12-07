<?php if (Session::get('autenticado')){ ?>
<link href="vista/alumno/css/estilos_alumno.css" rel="stylesheet" type="text/css" />
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


<div id="contenedoralumno">
    <br/>
    <div class="col-md-4">
        <?php if (isset($this->alumnos) && count($this->alumnos)) : ?>
        <select name="" id="">

            <?php
            for ($i = 0; $i < count($this->alumnos); $i++){
                echo "<option value='".$this->alumnos[$i]['IdAlumno']."'>".$this->alumnos[$i]['Nombre']."</option>";
            }
            ?>

        </select>
    </div>

    <div class="col-md-8">
        <center>
            <table border="0" align="center">
                <tr>
                    <br/>
                    <br/>
                    <form method="POST" action="<?php echo BASE_URL;?>alumno">
                        <input type="text" name="nombrealumno" placeholder="Buscar con Nombre"/>
                        <input type="submit"  value="Buscar"/>
                    </form>&nbsp;&nbsp;
                    <button type="button" onclick="nuevo()" class="btn btn-primary" value="Nuevo">Nuevo
                </tr>
                <br/>
                <br/>

            </table>
            <table border="1" align="center" class='table table-bordered table-hover'>
                <tr id="cabeceratable" class="cualquiercosa">
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
                            <input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>actualizar.png" width="20px" height="20px"
                                   onclick ="editar('<?php echo BASE_URL ?>alumno/editar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')"
                                   class="imgedit" value="editar"></td>
                        <td><input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>eliminar.png" width="25px" height="25px"
                                   onclick="eliminar('<?php echo BASE_URL ?>alumno/eliminar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')"
                                   class="imgedit" value="eliminar">

                        </td>
                    </tr>

                <?php endfor; ?>
            </table>
        </center>
    </div>
</div>

        <?php else: ?>

            <p><strong>No hay Registro de alumno!</strong></p>
            <p><strong>Inserte un nuevo Alumno </strong></p><input type="button" onclick="nuevo()" class="btn btn-primaria"
                                                                   value="Nuevo">

        <?php endif; ?>
<?php } else{ ?>
    <?php echo "ACCESO RESTRINGIDO"; ?>
    <a href="<?php echo BASE_URL ?>index">CLICK AQUI </a>
<?php  }  ?>