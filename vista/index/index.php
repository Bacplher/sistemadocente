<div class='form animated flipInX'>
    <h2>SISTEMA DOCENTE</h2>

    <form name="login" method="post" action="<?php if (isset ($this->action)) echo $this->action ?>">
        <input type="hidden" name="guardar" value="1"/>
        <input type="hidden" name="Numero"  value="<?php echo count($this->index)?>"/>
        <input name="Dni"  placeholder='User' type='text'>
        <input name="Clave"  placeholder="Password" type='password'>
        <input type="submit" name="Login"/>
    </form>
</div>


