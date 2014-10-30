<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php if(isset($this->titulo))echo $this->titulo; ?></title>
        <meta http-equiv="Content-type" content="text/html; charset=utf8"/>
        <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        
        <div id="main">
            <div id="header"><h1><?php echo APP_NAME; ?></div>
            <div id="top_menu">
                <ul>
                    <?php if(isset($_layoutParams['menu'])){; ?>
                    <?php for($i = 0 ; $i< count($_layoutParams['menu']); $i++){?> 
                    <li><a href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>
                    <?php }} ?>
                </ul>
            </div>
        
        
        
        
        
        