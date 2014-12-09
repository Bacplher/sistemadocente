<?php
class cursoModelo extends Consulta{

	public function __construct(){
        parent::__construct();
    }

    public $table = 'curso';
    public $dato=22222222;

    public function curso()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }
public function centro(){
        $centroeducativo = $this->_db->query("SELECT centroeducativo.IdCentroEducativo as IdCentroEducativo,
                                        centroeducativo.Descripcion as centroeducativo
                                        FROM centroeducativo
                                        INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                                        WHERE docente.dni=$this->dato");
        return $centroeducativo->fetchAll();
    }

    public function grado($centroeduc){
        $grado = $this->_db->query("SELECT grado.IdGrado as codgrado, grado.Descripcion as dgrado
                              FROM grado
                              INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                              INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                              WHERE docente.dni=$this->dato and centroeducativo.IdCentroEducativo=$centroeduc");
        $grado->setFetchMode(PDO::FETCH_ASSOC);
        return $grado->fetchAll();
    }

    public function seccion($grad){
        $seccion = $this->_db->query("SELECT seccion.IdSeccion as codseccion, seccion.Descripcion as dseccion
                                FROM seccion 
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                                WHERE docente.dni=$this->dato
                                and grado.IdGrado=$grad");
        $seccion->setFetchMode(PDO::FETCH_ASSOC);
        return $seccion->fetchAll();
    }

    public function curso1($secc){
        $curso = $this->_db->query("SELECT curso.IdCurso as codcurso, curso.Descripcion as dcurso
                                FROM curso
                                INNER JOIN seccion ON  seccion.IdSeccion = curso.IdSeccion
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                                WHERE docente.dni=$this->dato and seccion.IdSeccion=$secc");
        $curso->setFetchMode(PDO::FETCH_ASSOC);
        return $curso->fetchAll;
    }
    /*
    public function centroeducativo(){
    	$consultaSQL = 	$this->selectct($this->dato);
        return $consultaSQL;
    }

    public function grado(){
        $consultaSQL = $this->selectgrado();
        return $consultaSQL;
    }

    public function seccion(){
        $consultaSQL = $this->selectseccion();
        return $consultaSQL;
    }

    public function scurso(){
        $consultaSQL = $this->selectcurso();
        return $consultaSQL;
    }*/
}