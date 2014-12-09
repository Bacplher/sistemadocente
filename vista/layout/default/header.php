<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php if (isset($this->titulo)) echo $this->titulo; ?></title>
    <meta http-equiv="Content-type" content="text/html; charset=utf8"/>
    <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet prefetch" href="<?php echo $_layoutParams['ruta_css']; ?>agdehlogo.css">
    <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>stylelogo.css" media="screen"
          type="text/css"/>

    <link href="<?php echo $_layoutParams['ruta_css']; ?>pagina.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_layoutParams['ruta_css']; ?>pag.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_layoutParams['ruta_css']; ?>primera.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap.css" rel="stylesheet" type="text/css"
          media="screen"/>

    <link href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap-responsive.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <link href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap-responsive.min.css" rel="stylesheet" type="text/css"
          media="screen"/>
    <script src="<?php echo $_layoutParams['ruta_js']; ?>bootstrap.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js']; ?>bootstrap.min.js"></script>
    <script src="lib/js/jquery.min.js"></script>
    <link href="<?php echo $_layoutParams['ruta_css']; ?>stylossesion.css" rel="stylesheet" type="text/css"
          media="screen"/>

</head>
<body style="background:#A0F7FE">
<link href="<?php echo $_layoutParams['ruta_css']; ?>cuerpo.css" rel="stylesheet" type="text/css"/>
<div id="main">
    <div id="header"><h1><span class="atom"></span><?php echo APP_NAME; ?></h1></div>
    <div id="sesion" class="top_menu">
        <table border="0">
            <tr>
                <td width=968px>
                    <h3 class="a">&nbsp;&nbsp;  BIENVENIDO:
                        <?php if (Session::get('autenticado')){ ?>
                        <label><?php echo Session::get('Nombre'); ?></label>
                </td>
                <td>
                    <input type="image" src="<?php echo $_layoutParams['ruta_img']; ?>salir.jpg" width="50px"
                           height="50px" onclick="salir('<?php echo BASE_URL?>index/cerrar')" class="imgedit"
                          ></h3>

                </td>

            </tr>

        </table>
    </div>
    <?php } else { ?>
        <?php echo "Usuario Desconocido"; ?>
    <?php } ?>
    <div id="top_menu" class="container">
        <ul class="gn-menu-main">
            <?php if (isset($_layoutParams['menu'])) {
                ; ?>
                <?php for ($i = 0; $i < count($_layoutParams['menu']); $i++) { ?>
                    <li>
                        <a class="codrops-icon codrops-icon-prev"
                           href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><span><?php echo $_layoutParams['menu'][$i]['titulo']; ?></span></a>
                    </li>
                <?php
                }
            } ?>
        </ul>
    </div>
</div>
</div>
<script src="<?php echo $_layoutParams['ruta_js']; ?>primera.js"></script>
<script src="<?php echo $_layoutParams['ruta_js']; ?>index.js"></script>



        
        
        
        
        