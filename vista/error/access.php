<html>
<h2><?php if($this->mesaje) echo $this->mensaje?></h2>
<p> </p>
<a href="<?php echo BASE_URL;?>">Ir al inicio</a> |
<a href="javascript:history.back(1)">Volver a la pagina anterior</a>
<?php if(!Session::get('autenticado')): ?>
    <a href="<?php echo BASE_URL.'index';?>">Iniciar sesion</a> |

<?php endif;?>
</html>