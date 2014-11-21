
    <?php if (isset($this->perfil) && count($this->perfil)) : ?>

        <link href="vista/perfil/css/estilos_index.css" rel="stylesheet" type="text/css" />
        <br/>
        <div align="center">
            <fieldset id="perfildocente">
                <legend id="perfildocente2">Bienvenido(a) profesor(a)</td></legend>
                <label >Nombre: </label><p><?php echo $this->perfil[1]['Nombre']; ?></p>
                <label >Apellido Paterno:  </label> <p><?php echo $this->perfil[1]['ApellidoPaterno']; ?></p>
                <label >Apellido Materno: <?php echo $this->perfil[1]['ApellidoMaterno']; ?> </label><br/>
                <label >Edad: <?php echo $this->perfil[1]['Edad']; ?> </label><br/>
                <label >Celular: <?php echo $this->perfil[1]['Celular']; ?> </label><br/>
                <label >E-mail: <?php echo $this->perfil[1]['Email']; ?></label><br/>
                <label >Sexo:
                    <?php
                    if ($this->perfil[1]['Sexo']=='M'){
                        echo 'Masculino';
                    }
                    else{
                        echo 'Femenino';
                    } ?>
                </label><br/>
                <label >DNI: <?php echo $this->perfil[1]['Dni']; ?></label><br/>

            </fieldset>

        </div>



    <?php else: ?>

        <p><strong>No hay Registro de Docente!</strong></p>
        <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                                value="Nuevo">

    <?php endif; ?>