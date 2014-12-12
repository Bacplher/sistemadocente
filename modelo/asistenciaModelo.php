<?php
class asistenciaModelo extends Consulta{

    public function __construct(){
        parent::__construct();
    }

    public $table = 'curso';


    public function curso1()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }
    public function centro($dato){
        $centroeducativo = $this->_db->query("SELECT centroeducativo.IdCentroEducativo as IdCentroEducativo,
                                        centroeducativo.Descripcion as centroeducativo
                                        FROM centroeducativo
                                        INNER JOIN detalledocentecentroeducativo ON detalledocentecentroeducativo.IdCentroEducativo = centroeducativo.IdCentroEducativo
                                        INNER JOIN docente ON docente.IdDocente = detalledocentecentroeducativo.IdDocente
                                        WHERE docente.IdDocente=$dato");
        return $centroeducativo->fetchAll();
    }

    public function grado($centroeduc,$dato){
        $grado = $this->_db->query("SELECT grado.IdGrado as codgrado, grado.Descripcion as dgrado
                              FROM grado
                              INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                              INNER JOIN detalledocentecentroeducativo ON detalledocentecentroeducativo.IdCentroEducativo = centroeducativo.IdCentroEducativo
                              INNER JOIN docente ON docente.IdDocente = detalledocentecentroeducativo.IdDocente
                              WHERE docente.IdDocente=$dato and centroeducativo.IdCentroEducativo=$centroeduc");
        $grado->setFetchMode(PDO::FETCH_ASSOC);
        return $grado->fetchAll();
    }

    public function seccion($grad,$dato){
        $seccion = $this->_db->query("SELECT seccion.IdSeccion as codseccion, seccion.Descripcion as dseccion
                                FROM seccion
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN detalledocentecentroeducativo ON detalledocentecentroeducativo.IdCentroEducativo = centroeducativo.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = detalledocentecentroeducativo.IdDocente
                                WHERE docente.IdDocente=$dato
                                and grado.IdGrado=$grad");
        $seccion->setFetchMode(PDO::FETCH_ASSOC);
        return $seccion->fetchAll();
    }

    public function curso($secc,$dato){
        $curso = $this->_db->query("SELECT curso.IdCurso as codcurso, curso.Descripcion as dcurso
                                    FROM curso
                                INNER JOIN seccion ON  seccion.IdSeccion = curso.IdSeccion
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN detalledocentecentroeducativo ON detalledocentecentroeducativo.IdCentroEducativo = centroeducativo.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = detalledocentecentroeducativo.IdDocente
                                WHERE docente.IdDocente=$dato and seccion.IdSeccion=$secc");
        $curso->setFetchMode(PDO::FETCH_ASSOC);
        return $curso->fetchAll();
    }

    public function alumnos($dato){
        $alumno = $this->_db->query("SELECT alumno.IdAlumno as codalumno ,alumno.Nombre as nombre, alumno.ApellidoPaterno as ApPaterno, alumno.ApellidoMaterno as ApMaterno, alumno.Email as Email
                                    FROM alumno
                                INNER JOIN curso ON curso.IdCurso = alumno.IdCurso
                                INNER JOIN seccion ON  seccion.IdSeccion = curso.IdSeccion
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN detalledocentecentroeducativo ON detalledocentecentroeducativo.IdCentroEducativo = centroeducativo.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = detalledocentecentroeducativo.IdDocente
                                WHERE curso.IdCurso=$dato");
        $alumno->setFetchMode(PDO::FETCH_ASSOC);
        return $alumno->fetchAll();
    }

    public function deletealumno($dato){
        $da = $this->_db->query("DELETE FROM alumno
                                WHERE alumno.IdAlumno=$dato");
    }
    public function clase($curso,$dato){        $curso = $this->_db->query("SELECT clase.IdClase as clase, clase.Fecha as dclase
                                    FROM curso
                                INNER JOIN seccion ON  seccion.IdSeccion = curso.IdSeccion
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN detalledocentecentroeducativo ON detalledocentecentroeducativo.IdCentroEducativo = centroeducativo.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = detalledocentecentroeducativo.IdDocente
																INNER JOIN clase ON clase.IdCurso = curso.IdCurso
                                WHERE docente.IdDocente=$dato and curso.IdCurso=$curso");
        $curso->setFetchMode(PDO::FETCH_ASSOC);
        return $curso->fetchAll();
    }
}
