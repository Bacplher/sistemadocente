
<link href="vista/layout/default/css/bootstrap.css" rel="stylesheet" />
<script type="text/javascript" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

    var $a;
    function ventana(a) {
        window.open(a ,"width=500px,height=500px");
    }
</script>

<link href="vista/perfil/css/estilos_index.css" rel="stylesheet" type="text/css" />
<link href="vista/perfil/css/bootstrap-modal.css" rel="stylesheet" />

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
            <input type="text" id="datos" value="<?php echo $this->perfil[0]['Nombre']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >Apellido Paterno&nbsp;:  </label>
            <input type="text" id="datos" value="<?php echo $this->perfil[0]['ApellidoPaterno']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >Apellido Materno: </label>
            <input type="text" id="datos" value="<?php echo $this->perfil[0]['ApellidoMaterno']; ?>" OnFocus="this.blur()"> <br/>
            <label id="datosgenerales" >Edad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="datos" value="<?php echo $this->perfil[0]['Edad']; ?>" OnFocus="this.blur()"> <br/>
            <label id="datosgenerales" >Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="datos" value="<?php echo $this->perfil[0]['Celular']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="datos" value="<?php echo $this->perfil[0]['Email']; ?>" OnFocus="this.blur()"> <br/>
            <label id="datosgenerales" >Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="datos" value=" <?php
            if ($this->perfil[0]['Sexo']=='M'){
                echo 'Masculino';
            }
            else{
                echo 'Femenino';
            } ?>" onfocus="this.blur()"><br/>
            <label id="datosgenerales" >DNI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="datos" value="<?php echo $this->perfil[0]['Dni']; ?>" OnFocus="this.blur()"><br/>
            <label id="datosgenerales" >Especialidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
            <input type="text" id="datos" value="<?php echo $this->datos_academicos[0]['Especialidad'];?>" OnFocus="this.blur()"><br/>
            <div class="text-center">
                <button class="demo btn btn-primary btn-large" data-toggle="modal" href="#responsive">Actualizar Datos</button>
            </div>
        </fieldset>
        <br/>
        <fieldset id="perfildocente">
            <legend id="perfildocente2">Información Académica</legend>
            <table align="center" id="tabla-infoacademica" class='table table-bordered table-hover'>
                <tr id="cabeceratable-info" class="cualquiercosa">
                    <th>Centro Educativo</th>
                    <th>Grado</th>
                    <th>Curso</th>
                    <th>Sección</th>
                    <th><button class="demo btn btn-primary btn-large" data-toggle="modal" href="#responsive1">Agregar</button></th>
                </tr>
                <?php for ($i = 0; $i < count($this->datos_academicos); $i++): ?>
                    <tr>
                        <th> <?php echo $this->datos_academicos[0]['Centro_Educativo']; ?> </th>
                        <th> <?php echo $this->datos_academicos[0]['Grado']; ?>  </th>
                        <th> <?php echo $this->datos_academicos[0]['Curso']; ?> </th>
                        <th> <?php echo $this->datos_academicos[0]['Seccion']; ?></th>

                    </tr>
                <?php endfor; ?>
            </table>

        </fieldset>

    </div>
</div>

<div id="responsive1" class="modal hide fade" tabindex="-1" data-width="760" align="center">
    <fieldset id="perfildocente">

        <legend id="perfildocente2-modificar">Datos Académicos</legend>
    <table align="center" id="tabla-infoacademica" class='table table-bordered table-hover'>
        <tr id="cabeceratable-info" class="cualquiercosa">
            <th>Centro Educativo</th>
            <th>Grado</th>
            <th>Curso</th>
            <th>Sección</th>
            <th>Agregar</th>
        </tr>
        <tr >
             <th > <input type="text" width="100%" height="100%" /></th>
        </tr>
    </table>
        </fieldset>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
    </div>
</div>
<div id="responsive" class="modal hide fade" tabindex="-1" data-width="760" align="center">
    <br/>
    <fieldset id="perfildocente">

        <legend id="perfildocente2-modificar">Información Personal</legend>
        <label id="datosgenerales" >Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="datos" value="<?php echo $this->perfil[0]['Nombre']; ?>" ><br/>
        <label id="datosgenerales" >Apellido Paterno&nbsp;:  </label>
        <input type="text" id="datos" value="<?php echo $this->perfil[0]['ApellidoPaterno']; ?>" ><br/>
        <label id="datosgenerales" >Apellido Materno: </label>
        <input type="text" id="datos" value="<?php echo $this->perfil[0]['ApellidoMaterno']; ?>" > <br/>
        <label id="datosgenerales" >Edad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="datos" value="<?php echo $this->perfil[0]['Edad']; ?>"> <br/>
        <label id="datosgenerales" >Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="datos" value="<?php echo $this->perfil[0]['Celular']; ?>" ><br/>
        <label id="datosgenerales" >E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="datos" value="<?php echo $this->perfil[0]['Email']; ?>" > <br/>
        <label id="datosgenerales" >Sexo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="datos" value=" <?php
        if ($this->perfil[0]['Sexo']=='M'){
            echo 'Masculino';
        }
        else{
            echo 'Femenino';
        } ?>"><br/>
        <label id="datosgenerales" >DNI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="datos" value="<?php echo $this->perfil[0]['Dni']; ?>" ><br/>
        <label id="datosgenerales" >Especialidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" id="datos" value="<?php echo $this->datos_academicos[0]['Especialidad'];
             ?>" ><br/>

    </fieldset>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
    </div>
</div>
<div id="ajax-modal" class="modal hide fade" tabindex="-1"></div>
<!--<script src="lib/js/jquery.min.js"></script>-->

<script src="vista/layout/default/js/bootstrap.js"></script>
<script src="vista/perfil/js/bootstrap-modalmanager.js"></script>
<script src="vista/perfil/js/bootstrap-modal.js"></script>
<script type="text/javascript">

    $(function(){

        $.fn.modalmanager.defaults.resize = true;

        $('[data-source]').each(function(){
            var $this = $(this),
                $source = $($this.data('source'));

            var text = [];
            $source.each(function(){
                var $s = $(this);
                if ($s.attr('type') == 'text/javascript'){
                    text.push($s.html().replace(/(\n)*/, ''));
                } else {
                    text.push($s.clone().wrap('<div>').parent().html());
                }
            });

            $this.text(text.join('\n\n').replace(/\t/g, '    '));
        });

        prettyPrint();
    });
</script>


<script id="dynamic" type="text/javascript">
    $('.dynamic .demo').click(function(){
        var tmpl = [
            // tabindex is required for focus
            '<div class="modal hide fade" tabindex="-1">',
            '<div class="modal-header">',
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',
            '<h3>Modal header</h3>',
            '</div>',
            '<div class="modal-body">',
            '<p>Test</p>',
            '</div>',
            '<div class="modal-footer">',
            '<a href="#" data-dismiss="modal" class="btn">Close</a>',
            '<a href="#" class="btn btn-primary">Save changes</a>',
            '</div>',
            '</div>'
        ].join('');

        $(tmpl).modal();
    });
</script>

<script id="ajax" type="text/javascript">

    var $modal = $('#ajax-modal');

    $('.ajax .demo').on('click', function(){
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('modal_ajax_test.html', '', function(){
                $modal.modal();
            });
        }, 1000);
    });

    $modal.on('click', '.update', function(){
        $modal.modal('loading');
        setTimeout(function(){
            $modal
                .modal('loading')
                .find('.modal-body')
                .prepend('<div class="alert alert-info fade in">' +
                'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '</div>');
        }, 1000);
    });

</script>

<?php else:   ?>

    <p><strong>No hay Registro de Docente!</strong></p>
    <p><strong>Inserte un nuevo Docente </strong></p><input type="button" onclick="nuevo()" class="btn btn-primary"
                                                            value="Nuevo">

<?php endif; ?>  

