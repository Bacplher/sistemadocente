<script type="text/javascript">
var $a, $b;
    function eliminar(a)
    {
       if(confirm("Realmente deseas eliminar este registro"))
                {
                  window.location= a ;
                } 
    }

    function nuevo(){
        window.location= "<?php echo BASE_URL ;?>alumno/nuevo";
    }

    function editar (b){
        window.location= b ;
    }
</script>
<?php if(isset($this->alumnos) && count($this->alumnos)) : ?>
    <center><table border="1" align="center" class='rwd-table'>
        <tr>
            <td>Codigo</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Email</td>
            <td><input type="button" onclick="nuevo()" class="imgedit" value="Nuevo"></td><td></td>
        </tr>
        <?php for($i = 0; $i < count($this->alumnos); $i++): ?>

            <tr >
                <td><?php echo $this->alumnos[$i]['IdAlumno']; ?></td>
                <td><?php echo $this->alumnos[$i]['Nombre']; ?></td>
                <td><?php echo $this->alumnos[$i]['ApellidoPaterno']; ?></td>
                <td><?php echo $this->alumnos[$i]['ApellidoMaterno']; ?></td>
                <td><?php echo $this->alumnos[$i]['Email']; ?></td>
                <td>
                   <!-- <a href="<?php echo BASE_URL?>alumno/editar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>" onclick="editar('<?php echo BASE_URL?>alumno/editar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')" class="imgedit">editar</a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>alumno/eliminar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')" class="imgdelete">eliminar</a>
                    <a href="javascript:void(0)" class="imgview" onclick="ver('<?php echo $this->datos[$i]['IdAlumno'] ?>')"></a> -->
                <input type="button" onclick="editar('<?php echo BASE_URL?>alumno/editar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')" class="imgedit" value="editar"></td>
                <td><input type="button" onclick="eliminar('<?php echo BASE_URL?>alumno/eliminar/<?php echo $this->alumnos[$i]['IdAlumno'] ?>')" class="imgedit" value="eliminar">

                </td>
            </tr>

        <?php endfor;?>
    </table></center>

<?php else: ?>

    <p><strong>No hay Registro de alumno!</strong></p>
    <p><strong>Inserte uno nuevo </strong></p><input type="button" onclick="nuevo()" class="imgedit" value="Nuevo">

<?php endif; ?>