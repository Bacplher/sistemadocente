<script type="text/javascript">

</script>
<form method="post" action="<?php if (isset ($this->action)) echo $this->action ?>" id="frm"
      onsubmit="return validarTipoCriterio()";>
<h3><?php echo $this->titulo ?></h3>
<input type="hidden" name="guardar" id="guardar" value="1"/>
<input type="hidden" name="IdTipoCriterio" id="IdTipoCriterio"
       value="<?php if (isset ($this->tipocriterio[0]['IdTipoCriterio'])) echo $this->tipocriterio[0]['IdTipoCriterio'] ?>"/>

<center>
    <table align="center" class="tabFormComplejo">
        <tr valign="top">
            <td><label>Descripcion :</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese Descripcion" name="Descripcion"
                       id="Descripcion"
                       value="<?php if (isset ($this->tipocriterio[0]['Descripcion'])) echo $this->tipocriterio[0]['Descripcion'] ?>"/>
                <br>
            </td>
        </tr>

            <td colspan="2" align="center">
                <p>
                    <button type="submit" class="k-button" name="guardar" id="guardar" value="1">Guardar</button>
                    <a href="<?php echo BASE_URL ?>tipocriterio" class="k-button cancel">Cancelar</a></p>
            </td>
        </tr>
    </table>
</center>

</form>
