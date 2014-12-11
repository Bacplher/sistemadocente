
<script src="vista/perfil/js/ajax.js" > </script>

<link href="vista/perfil/css/estilos_index.css" rel="stylesheet" type="text/css" />

<script>
    function formulario(f) {

        if (f.centro_educativo.value   == '') { alert ('El nombre esta vacío');

            f.nombre.focus(); return false; }

        if (f.grado.value  == '') { alert ('El email esta vacío');

            f.grado.focus(); return false; } return true; }

</script>
<div id="contenedorperfil"  >
    <br/>

    <?php if (isset($this->perfil) && count($this->perfil)) : ?>
    <div class="col-md-4">
        <fieldset id="perfildocente">

            <?php
            if ($this->perfil[0]['Sexo']=='M'){?>
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
            <label id="datosgenerales" >Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="nombre" class="datos" value="<?php echo $this->perfil[0]['Nombre']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >Apellido Paterno&nbsp;:  </label>
            <input type="text" id="apellidopaterno" class="datos" value="<?php echo $this->perfil[0]['ApellidoPaterno']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >Apellido Materno: </label>
            <input type="text" id="apellidomaterno" class="datos" value="<?php echo $this->perfil[0]['ApellidoMaterno']; ?>" OnFocus="this.blur()"> <br/>
            <label id="datosgenerales" >Edad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="edad" class="datos" value="<?php echo $this->perfil[0]['Edad']; ?>" OnFocus="this.blur()"> <br/>
            <label id="datosgenerales" >Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="celular" class="datos" value="<?php echo $this->perfil[0]['Celular']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="email" class="datos" value="<?php echo $this->perfil[0]['Email']; ?>" OnFocus="this.blur()"> <br/>
            <label id="datosgenerales" >Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="sexo" class="datos" value=" <?php
            if ($this->perfil[0]['Sexo']=='M'){
                echo 'Masculino';
            }
            else{
                echo 'Femenino';
            } ?>" onfocus="this.blur()"><br/>
            <label id="datosgenerales" >DNI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="dni" class="datos" value="<?php echo $this->perfil[0]['Dni']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >Especialidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="espcialidad" class="datos" value="<?php echo $this->perfil[0]['Especialidad'];?>" OnFocus="this.blur()"><br/>
            <div class="text-center">
                <button  class="btn btn-primary" id="btnactperfil" data-toggle="modal">Actualizar Datos</button>
            </div>
        </fieldset>
        <br/>
        <fieldset id="perfildocente">
            <legend id="perfildocente2">Información Académica</legend>
            <table align="center" id="tabla-infoacademica" class='table table-bordered table-hover'>
                <tr id="cabeceratable-info" class="cualquiercosa">
                    <th>Centro Educativo</th>
                    <th>Grado</th>
                    <th>Sección</th>
                    <th>Curso</th>
                    <th><button class="btn btn-primary btn-large" id="btnaddcentro" data-toggle="modal">Agregar</button></th>
                </tr>
                <?php for ($i = 0; $i < count($this->datos_academicos); $i++): ?>
                    <tr>
                        <th> <?php echo $this->datos_academicos[$i]['Centro_Educativo']; ?> </th>
                        <th> <?php echo $this->datos_academicos[$i]['Grado']; ?>  </th>
                        <th> <?php echo $this->datos_academicos[$i]['Seccion']; ?> </th>
                        <th> <?php echo $this->datos_academicos[$i]['Curso']; ?></th>

                    </tr>
                <?php endfor; ?>
            </table>

        </fieldset>

    </div>
</div>

<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <form name="formulario" id="form_add" onsubmit="return formulario(this)">
    <fieldset id="perfildocente">

        <legend  id="perfildocente2-modificar">Datos Académicos</legend>
        <label id="datosgenerales"> Centro Educativo&nbsp;:</label>
             <input class="datos"  id="centroeducativo" type="text"  name="Centro_Educativo" /> <br/>
        <label id="datosgenerales"> Grado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
              <input class="datos"  id="grado" type="text" name="Grado" /> <br/>
        <label id="datosgenerales"> Sección&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
        <input class="datos" id="seccion" type="text" name="Seccion" maxlength="1" onkeypress="return stringCheck(event, this);" /> <br/>
        <label id="datosgenerales"> Curso&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
             <input  class="datos"  id="curso" type="text" name="Curso"  />
        </fieldset>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
            <input type="button" id="btn-add" class="btn btn-primary" value="Agregar" >


        </div>
    </form>

</div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <br/>

    <form id="form_actperfil"  name="actualizar_perfil"  >
    <fieldset id="perfildocente">
        <legend id="perfildocente2-modificar">Información Personal</legend>
        <label id="datosgenerales" >Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="nombre" class="datos" name="Nombre" value="<?php echo $this->perfil[0]['Nombre']; ?>" ><br/>
        <label id="datosgenerales" >Apellido Paterno&nbsp;:  </label>
        <input type="text" id="apellidopaterno" class="datos" name="ApellidoPaterno" value="<?php echo $this->perfil[0]['ApellidoPaterno']; ?>" ><br/>
        <label id="datosgenerales" >Apellido Materno: </label>
        <input type="text" id="apellidomaterno" class="datos" name="ApellidoMaterno" value="<?php echo $this->perfil[0]['ApellidoMaterno']; ?>" > <br/>
        <label id="datosgenerales" >Edad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="edad" class="datos" name="Edad" value="<?php echo $this->perfil[0]['Edad']; ?>"> <br/>
        <label id="datosgenerales" >Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="celular" class="datos" name="Celular" value="<?php echo $this->perfil[0]['Celular']; ?>" ><br/>
        <label id="datosgenerales" >E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="email" class="datos" name="Email" value="<?php echo $this->perfil[0]['Email']; ?>" > <br/>
        <label id="datosgenerales" >Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="sexo" class="datos" name="Sexo" value="<?php echo $this->perfil[0]['Sexo']; ?>"><br/>
        <label id="datosgenerales" >DNI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="dni" class="datos" name="Dni" value="<?php echo $this->perfil[0]['Dni']; ?>" ><br/>
        <label id="datosgenerales" >Clave&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="clave" class="datos" name="Clave" value="<?php echo $this->perfil[0]['Clave']; ?>" ><br/>
        <label id="datosgenerales" >Especialidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="especialidad" class="datos" name="Especialidad" value="<?php echo $this->perfil[0]['Especialidad']; ?>" ><br/>

    </fieldset>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
        <input type="button" id="save" class="btn btn-primary"  value="Actualizar"  onClick="document.location.reload(true)" >


    </div>
    </form>
</div>


<?php else:   ?>
    <p><strong>No hay Registro de Docente!</strong></p>
    <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                            value="Nuevo">
<?php endif; ?>  

