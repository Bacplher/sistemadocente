<h2>Vista Index</h2>
<?php if(isset($this->curso) && count($this->curso)) : ?>

    <table border="1" align="center">

        <?php for($i = 0; $i < count($this->curso); $i++): ?>

            <tr>
                <td><?php echo $this->curso[$i]['IdCurso']; ?></td>
                <td><?php echo $this->curso[$i]['IdCentroEducativo']; ?></td>
                <td><?php echo $this->curso[$i]['Descripcion']; ?></td>
                <td><?php echo $this->curso[$i]['Objetivo']; ?></td>
            </tr>

        <?php endfor;?>
    </table>

<?php else: ?>

    <p><strong>No hay posts!</strong></p>

<?php endif; ?>