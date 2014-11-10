<script type="text/javascript">

</script>
<form method="post" action="<?php if (isset ($this->action)) echo $this->action ?>" id="frm"
      onsubmit="return validarTipoPeriodo()";>
<h3><?php echo $this->titulo ?></h3>
<input type="hidden" name="guardar" id="guardar" value="1"/>
<input type="hidden" name="IdTipoPeriodo" id="IdTipoPeriodo"
       value="<?php if (isset ($this->tipoperiodo[0]['IdTipoPeriodo'])) echo $this->tipoperiodo[0]['IdTipoPeriodo'] ?>"/>

<center>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label>Descripcion :</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Descripcion" name="Descripcion"
                       id="Descripcion"
                       value="<?php if (isset ($this->tipoperiodo[0]['Descripcion'])) echo $this->tipoperiodo[0]['Descripcion'] ?>"/>
                <br>
            </td>
        </tr>

        <td colspan="2" align="center">
            <p>
                <button type="submit" class="k-button" name="guardar" id="guardar" value="1">Guardar</button>
                <a href="<?php echo BASE_URL ?>tipoperiodo" class="k-button cancel">Cancelar</a></p>
        </td>
        </tr>
    </table>
</center>

</form>

