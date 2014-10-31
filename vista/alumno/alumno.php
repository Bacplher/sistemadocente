<h2>Vista Index</h2>
<?php if(isset($this->alumnos) && count($this->alumnos)) : ?>

    <table border="1" align="center">

        <?php for($i = 0; $i < count($this->alumnos); $i++): ?>

            <tr>
                <td><?php echo $this->alumnos[$i]['IdAlumno']; ?></td>
                <td><?php echo $this->alumnos[$i]['Nombre']; ?></td>
                <td><?php echo $this->alumnos[$i]['ApellidoPaterno']; ?></td>
                <td><?php echo $this->alumnos[$i]['ApellidoMaterno']; ?></td>
                <td><?php echo $this->alumnos[$i]['Email']; ?></td>
            </tr>

        <?php endfor;?>
    </table>

<?php else: ?>

    <p><strong>No hay posts!</strong></p>

<?php endif; ?>