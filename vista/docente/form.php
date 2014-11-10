<script type="text/javascript">

</script>
<form method="post" action="<?php if (isset ($this->action)) echo $this->action ?>" id="frm"
      onsubmit="return validarDocente()";>
<h3><?php echo $this->titulo ?></h3>
<input type="hidden" name="guardar" id="guardar" value="1"/>
<input type="hidden" name="IdDocente" id="IdDocente"
       value="<?php if (isset ($this->docente[0]['IdDocente'])) echo $this->docente[0]['IdDocente'] ?>"/>

<center>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label>Nombre:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Nombre" name="Nombre"
                       id="Nombre"
                       value="<?php if (isset ($this->docente[0]['Nombre'])) echo $this->docente[0]['Nombre'] ?>"/>
                <br>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Apellido Paterno:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Apellido Paterno" name="ApellidoPaterno"
                       id="ApellidoPaterno"
                       value="<?php if (isset ($this->docente[0]['ApellidoPaterno'])) echo $this->docente[0]['ApellidoPaterno'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Apellido Materno:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Apellido Materno" name="ApellidoMaterno"
                       id="ApellidoMaterno"
                       value="<?php if (isset ($this->docente[0]['ApellidoMaterno'])) echo $this->docente[0]['ApellidoMaterno'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Celular:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Celular" name="Celular"
                       id="Celular"
                       value="<?php if (isset ($this->docente[0]['Celular'])) echo $this->docente[0]['Celular'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Email:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Email" name="Email"
                       id="Email"
                       value="<?php if (isset ($this->docente[0]['Email'])) echo $this->docente[0]['Email'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Edad :</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Edad" name="Edad"
                       id="Edad"
                       value="<?php if (isset ($this->docente[0]['Edad'])) echo $this->docente[0]['Edad'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Sexo :</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Sexo" name="Sexo"
                       id="Sexo"
                       value="<?php if (isset ($this->docente[0]['Sexo'])) echo $this->docente[0]['Sexo'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Dni :</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Dni" name="Dni"
                       id="Dni"
                       value="<?php if (isset ($this->docente[0]['Dni'])) echo $this->docente[0]['Dni'] ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td><label>Contraseña :</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Contraseña" name="Contraseña"
                       id="Contraseña"
                       value="<?php if (isset ($this->docente[0]['Contraseña'])) echo $this->docente[0]['Contraseña'] ?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>
                    <button type="submit" class="k-button" name="guardar" id="guardar" value="1">Guardar</button>
                    <a href="<?php echo BASE_URL ?>docente" class="k-button cancel">Cancelar</a></p>
            </td>
        </tr>
    </table>
</center>

</form>
