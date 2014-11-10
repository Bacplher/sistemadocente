<script type="text/javascript">

</script>
<form method="post" action="<?php if (isset ($this->action)) echo $this->action ?>" id="frm"
      onsubmit="return validarAsistencia()";>
<h3><?php echo $this->titulo ?></h3>
<input type="hidden" name="guardar" id="guardar" value="1"/>

<center>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label>Codigo Alumno:</label></td>
            <td>
                <select class="list" name="alumno_IdAlumno" id="alumno_IdAlumno">
                    <option value="0">Seleccione</option>
                    <?php for($i=0;$i<count($this->alumno_IdAlumno);$i++){ ?>
                        <?php if( $this->alumno_IdAlumno[0]['alumno_IdAlumno'] == $this->alumno_IdAlumno[$i]['alumno_IdAlumno'] ){ ?>
                            <option value="<?php echo $this->alumno_IdAlumno[$i]['alumno_IdAlumno'] ?>" selected="selected"><?php echo utf8_encode($this->alumno_IdAlumno[$i]['alumno_IdAlumno']) ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $this->alumno_IdAlumno[$i]['alumno_IdAlumno'] ?>"><?php echo utf8_encode($this->alumno_IdAlumno[$i]['alumno_IdAlumno']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Codigo Clase</label></td>
            <td>
                <select class="list" name="clase_IdClase" id="clase_IdClase">
                    <option value="0">Seleccione</option>
                    <?php for($i=0;$i<count($this->clase_IdClase);$i++){ ?>
                        <?php if( $this->datos[0]['clase_IdClase'] == $this->datos_tipo_habitacion[$i]['clase_IdClase'] ){ ?>
                            <option value="<?php echo $this->clase_IdClase[$i]['clase_IdClase'] ?>" selected="selected"><?php echo utf8_encode($this->clase_IdClase[$i]['clase_IdClase']) ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $this->clase_IdClase[$i]['clase_IdClase'] ?>"><?php echo utf8_encode($this->clase_IdClase[$i]['clase_IdClase']) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Asistio:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese asistencia" name="Asistio"
                       id="Asistio"
                       value="<?php if (isset ($this->asistencia[0]['Asistio'])) echo $this->asistencia[0]['Asistio'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Observaciones:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Observaciones" name="Observaciones"
                       id="Observaciones"
                       value="<?php if (isset ($this->asistencia[0]['Observaciones'])) echo $this->asistencia[0]['Observaciones'] ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>
                    <button type="submit" class="k-button" name="guardar" id="guardar" value="1">Guardar</button>
                    <a href="<?php echo BASE_URL ?>asistencia" class="k-button cancel">Cancelar</a></p>
            </td>
        </tr>
    </table>
</center>

</form>
