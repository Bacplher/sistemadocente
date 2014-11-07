<?php

class Modelo {
    protected $_db;
    
 public function __construct() {
     $this->_db = new Conexion();
 }
    protected static function get_consulta($pa, $datos) {
        $bd = new Conexion();
        $bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
        return self::procedimientoAlmacenado($pa, $datos, $bd);
    }

    // procedimiento almacenado para ejecutar consultas
    static  function procedimientoAlmacenado($pa, $datos, $bd) {
        //arreglar archivo
       // $config = parse_ini_file('config.ini', TRUE);
        //$driver = $config['database']['driver'];
       /* switch ($driver) {
            case 'mssql': $sql = "execute ";
                break;
            case 'mysql': $sql = "call ";
                break;
            case 'pgsql': $sql = "select * from ";
                break;
            case 'oci': $sql = "execute ";
                break;
        }*/
        $sql = "call" . $pa . " ";

        if ($datos != null) {
            for ($i = 1; $i <= count($datos); $i++) {
                $sql = $sql . "?";
                if ($i < count($datos)) {
                    $sql = $sql . ",";
                }
                }
            }
//        die($sql);
        try {
                $stmt = $bd->prepare($sql, array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));


            $j = 0;
            if ($datos != null) {
                for ($i = 0; $i < count($datos); $i++) {
                    $j++;
                    if (is_int($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_INT);
                    }
                    if (is_string($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_STR);
                    }
                    if (is_double($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_INT);
                    }
                    if (is_null($datos[$i])) {
                        $stmt->bindValue($j, $datos[$i], PDO::PARAM_NULL);
                    }
                }
            }
            $stmt->execute();
            $error = $stmt->errorInfo();


                return array($stmt, $error[2]);
//                if($error[2]!=''){
//                    return array($stmt, $error[2]);
//                }else{
//                    $url=str_replace(' ', '_', $error[2]);
//                    die("<script> window.location=\"".BASE_URL."error/error_bd/".$url."\" ; </script>");
//                }


//            return array($stmt,$error[2]);
//            return $stmt;
        } catch (PDOException $e) {
            return false;
            echo '<script>
                alert("Fallo ejecucion!: ' . $e->getMessage() . '");
                    window.location="index.php";
                </script>';
        } catch (Exception $ex) {
            return false;
            echo '<script>
                alert("Fallo ejecucion!: ' . $ex->getMessage() . '");
                    window.location="index.php";
                </script>';
        }
    }

}
