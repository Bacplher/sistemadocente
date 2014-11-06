<form method="post" action="<?php if (isset ($this->_alumno)) echo $this->_alumno ?>" id="frm"
      >
    <h3><?php echo $this->titulo ?></h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <input type="hidden" name="codigo" id="codigo"
           value="<?php if (isset ($this->datos[0]['IdALumno'])) echo $this->datos[0]['IdALumno'] ?>"/>
    <CENTER>
        <table align="center" class="tabFormComplejo">
            <tr valign="top">
                <td><label>Nombre:</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Nombre" name="Nombre"
                           id="Nombre"
                           value="<?php if (isset ($this->datos[0]['Nombre'])) echo $this->datos[0]['Nombre'] ?>"/>
                    <br>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Apellido Paterno:</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Apellido Paterno" name="ApellidoPaterno"
                           id="ApellidoPaterno"
                           value="<?php if (isset ($this->datos[0]['ApellidoPaterno'])) echo $this->datos[0]['ApellidoPaterno'] ?>"/>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Apellido Materno:</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Apellido Materno" name="ApellidoMaterno"
                           id="ApellidoMaterno"
                           value="<?php if (isset ($this->datos[0]['ApellidoMaterno'])) echo $this->datos[0]['ApellidoMaterno'] ?>"/>
                </td>
            </tr>
            <tr valign="top">
                <td><label>Email:</label></td>
                <td><input type="text" class="k-textbox" placeholder="Ingrese Email" name="Email"
                           id="Email"
                           value="<?php if (isset ($this->datos[0]['Email'])) echo $this->datos[0]['Email'] ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <p>
                        <button type="submit" class="k-button" id="saveform">Guardar</button>
                        <a href="<?php echo BASE_URL ?>alumno" class="k-button cancel">Cancelar</a></p>
                </td>
            </tr>
        </table>
    </CENTER>
</form>
