<h2>Vista Index</h2>
<?php if(isset($this->alumnos) && count($this->alumnos)) : ?>

    <center><table border="1" align="center" class='rwd-table'>
        <tr>
            <td>Codigo</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Email</td>
        </tr>
        <?php for($i = 0; $i < count($this->alumnos); $i++): ?>

            <tr >
                <td><?php echo $this->alumnos[$i]['IdAlumno']; ?></td>
                <td><?php echo $this->alumnos[$i]['Nombre']; ?></td>
                <td><?php echo $this->alumnos[$i]['ApellidoPaterno']; ?></td>
                <td><?php echo $this->alumnos[$i]['ApellidoMaterno']; ?></td>
                <td><?php echo $this->alumnos[$i]['Email']; ?></td>
            </tr>

        <?php endfor;?>
    </table></center>

<?php else: ?>

    <p><strong>No hay posts!</strong></p>

<?php endif; ?>