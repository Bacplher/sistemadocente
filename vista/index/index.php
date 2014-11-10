<div class='form animated flipInX'>
    <h2>SISTEMA DOCENTE</h2>

    <form name="login" method="post" action="<?php if (isset ($this->action)) echo $this->action ?>">
        <input type="hidden" name="guardar" id="guardar" value="1"/>
        <input name="Dni" id="Dni" placeholder='User' type='text'>
        <input name="Contraseña" id="Contraseña" placeholder="Password" type='password'>
        <input type="submit" value="Login"/>
    </form>
</div>


