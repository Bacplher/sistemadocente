<link href="vista/curso/css/estilos_curso.css" rel="stylesheet" type="text/css" />


<div class="col-md-4">
    <select name="" id="">

        <?php
        for ($i = 1; $i <= 10; $i++){
            echo "<option value='".$i."'>".$i."</option>";
        }
        ?>


    </select>


</div>

<div id="contenedorcurso">
    <br/>
    <div  class="col-md-15">
        <table border="0" align="center">
            <tr>
                <br/>
                <br/>
                <form method="POST" action="<?php echo BASE_URL;?>curso">
                    <input type="text" name="nombrecurso" placeholder="Buscar Curso"/>&nbsp;&nbsp;
                    <input type="submit"  value="Buscar"/>
                </form>&nbsp;&nbsp;
                <button type="button" onclick="nuevo()" class="btn btn-primary" value="Nuevo">Nuevo
            </tr>
            <br/>
            <br/>

        </table>
    </div>
    </table>

    <table border="1" align="center" class='table table-bordered table-hover'>
        <tr id="cabeceratable-info" class="cualquiercosa">
            <td>Codigo</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
        </tr>

    </table>
    </center>
</div>