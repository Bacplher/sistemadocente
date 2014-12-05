    <script type="text/javascript" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

        var $a;
        function ventana(a) {
                window.open(a ,"width=500px,height=500px");
            }
    </script>

    <link href="vista/perfil/css/estilos_index.css" rel="stylesheet" type="text/css" />

    <div id="contenedorperfil"  >
        <br/>

    <?php if (isset($this->perfil) && count($this->perfil)) : ?>
        <div class="col-md-4">
            <fieldset id="perfildocente">

                <?php
                if ($this->perfil[1]['Sexo']=='M'){?>
                  <img src="vista/perfil/img/perfil_masculino.png"/>
                <?php
                }
                else{?>
                    <img src="vista/perfil/img/perfil_femenino.png"/>
                <?php
                } ?>

            </fieldset>
        </div>

        <div align="center" class="col-md-8">
            <fieldset id="perfildocente">
                <legend id="perfildocente2">Información Personal</legend>
                <label id="datosgenerales" >Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                    <input type="text" id="datos" value="<?php echo $this->perfil[1]['Nombre']; ?>" OnFocus="this.blur()"><br/>
                <label id="datosgenerales" >Apellido Paterno&nbsp;:  </label>
                    <input type="text" id="datos" value="<?php echo $this->perfil[1]['ApellidoPaterno']; ?>" OnFocus="this.blur()"><br/>
                <label id="datosgenerales" >Apellido Materno: </label>
                    <input type="text" id="datos" value="<?php echo $this->perfil[1]['ApellidoMaterno']; ?>" OnFocus="this.blur()"> <br/>
                <label id="datosgenerales" >Edad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                    <input type="text" id="datos" value="<?php echo $this->perfil[1]['Edad']; ?>" OnFocus="this.blur()"> <br/>
                <label id="datosgenerales" >Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                     <input type="text" id="datos" value="<?php echo $this->perfil[1]['Celular']; ?>" OnFocus="this.blur()"><br/>
                <label id="datosgenerales" >E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                <input type="text" id="datos" value="<?php echo $this->perfil[1]['Email']; ?>" OnFocus="this.blur()"> <br/>
                <label id="datosgenerales" >Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                <input type="text" id="datos" value=" <?php
                if ($this->perfil[1]['Sexo']=='M'){
                    echo 'Masculino';
                }
                else{
                    echo 'Femenino';
                } ?>"><br/>
                <label id="datosgenerales" >DNI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                <input type="text" id="datos" value="<?php echo $this->perfil[1]['Dni']; ?>" OnFocus="this.blur()"><br/>

                <div class="text-center">
                    <button class="demo btn btn-primary btn-large" data-toggle="modal" href="#responsive">View Demo</button>
                </div>
            </fieldset>
            <br/>
            <fieldset id="perfildocente">
                <legend id="perfildocente2">Información Académica</legend>
            </fieldset>

        </div>
    </div>
<div id="responsive"> </div>


    <?php else: ?>

        <p><strong>No hay Registro de Docente!</strong></p>
        <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                                value="Nuevo">

    <?php endif; ?>