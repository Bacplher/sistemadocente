
    <?php if (isset($this->perfil) && count($this->perfil)) : ?>

        <link href="vista/perfil/css/estilos_index.css" rel="stylesheet" type="text/css" />
        <br/>
        <div align="center">
            <fieldset id="perfildocente">
                <legend id="perfildocente2">Bienvenido(a) profesor(a)</td></legend>
                <label id="datosgenerales" >Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label><label id="datos" >&nbsp;&nbsp;<?php echo $this->perfil[1]['Nombre']; ?></label><br/>
                <label id="datosgenerales" >Apellido Paterno:  </label> <label id="datos">&nbsp;&nbsp;<?php echo $this->perfil[1]['ApellidoPaterno']; ?></label><br/>
                <label id="datosgenerales" >Apellido Materno: </label> <label id="datos">&nbsp;&nbsp;<?php echo $this->perfil[1]['ApellidoMaterno']; ?> </label><br/>
                <label id="datosgenerales" >Edad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label> <label id="datos"> &nbsp;&nbsp;<?php echo $this->perfil[1]['Edad']; ?> </label><br/>
                <label id="datosgenerales" >Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label> <label id="datos"> &nbsp;&nbsp;<?php echo $this->perfil[1]['Celular']; ?> </label><br/>
                <label id="datosgenerales" >E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label> <label id="datos"> &nbsp;&nbsp;<?php echo $this->perfil[1]['Email']; ?></label><br/>
                <label id="datosgenerales" >Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label> <label id="datos">&nbsp;
                    <?php
                    if ($this->perfil[1]['Sexo']=='M'){
                        echo 'Masculino';
                    }
                    else{
                        echo 'Femenino';
                    } ?>
                </label><br/>
                <label id="datosgenerales" >DNI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label> <label id="datos">&nbsp; <?php echo $this->perfil[1]['Dni']; ?></label><br/>

            </fieldset>

        </div>
        <br/>


    <?php else: ?>

        <p><strong>No hay Registro de Docente!</strong></p>
        <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                                value="Nuevo">

    <?php endif; ?>