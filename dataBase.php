<?php

    class DataBase {
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "estudiantes";
        

        public function __construct() {
            $this->connect_db();
        }

        //Conexion a base de datos
        public function connect_db () {
            $this -> con = mysqli_connect($this->dbhost, $this->dbuser, $this-> dbpass, $this->dbname);
            if (mysqli_connect_error()) {
                die("Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
            }
        } 

        //Limpieza de variables
        public function sanatize ($var) {
            $return = mysqli_real_escape_string($this -> con, $var);
            return $return;
        }

        public function createEstudiantes ($nombre, $apellido, $telefono, $email, $fecha_registro_e) {
            $sql = "INSERT INTO estudiantes (nombre, apellido, telefono, email, fecha_registro_e) VALUES
            ('$nombre', '$apellido', '$telefono', '$email', CURRENT_TIMESTAMP)";
            echo $sql;
            $result = mysqli_query($this->con, $sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function createMaterias ($nombreMateria, $horasClase, $seccion, $detalles, $fecha_registro_c, $idEstudiante) {
            $sql = "INSERT INTO componentesacademicos (nombreMateria, horasClase, seccion, detalles, fecha_registro_c, idEstudiante) VALUES
            ('$nombreMateria', '$horasClase', '$seccion', '$detalles', CURRENT_TIMESTAMP, '$idEstudiante')";
            echo $sql;
            $result = mysqli_query($this->con, $sql);
            if ($result) {
                return true;
                $row = $result -> fetch_array();
                echo "Se insertaron los datos con éxito";
            } else {
                return false;
                echo "Falló al ingresar";
            }
        }

        public function createProfesores ($nombre_p, $apellido_p, $cedula, $email_p, $fecha_registro_p) {
            $sql = "INSERT INTO profesor (nombre_p, apellido_p, cedula, email_p, fecha_registro_p) VALUES
            ('$nombre_p', '$apellido_p', '$cedula', '$email_p', CURRENT_TIMESTAMP)";
            echo $sql;
            $result = mysqli_query($this->con, $sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        

        public function readEstudiantes () {
            $sql = "SELECT * FROM estudiantes";
            $result = mysqli_query($this->con, $sql);
            return $result;
        }

        public function readMaterias () {
            $sql = "SELECT idMateria, nombreMateria, horasClase, seccion, detalles, fecha_registro_c, fecha_actualizacion_c, nombre, apellido, nombre_p, apellido_p FROM estudiantes, componentesacademicos , profesor
            WHERE estudiantes.idEstudiante = componentesacademicos.idEstudiante
            AND profesor.idProfesor = componentesacademicos.idProfesor";
            $result = mysqli_query($this->con, $sql);
            return $result;
        }

        public function readNombresProfesores () {
            $sql = "SELECT nombre_p, apellido_p FROM profesor";
            $result = mysqli_query($this->con, $sql);
            return $result;
        }

        public function readProfesores () {
            $sql = "SELECT * FROM profesor";
            $result = mysqli_query($this->con, $sql);
            return $result;
        }
/*
        public function readMaterias () {
            $sql = "SELECT nombreMateria, horasClase, seccion, detalles, nombre, apellido FROM 
            componentesacademicos, estudiantes WHERE estudiantes.idEstudiante = componentesacademicos.idEstudiante";
            echo $sql;
            $result = mysqli_query($this->con, $sql);
            return $result;
        }
*/
        public function deleteEstudiantes ($idEstudiante) {
            $sql = "DELETE FROM estudiantes WHERE idEstudiante=$idEstudiante";
            echo $sql;
            $result = mysqli_query($this -> con, $sql);
            if ($result) {
                return true;
                echo "eliminado";
            } else {
                return false;
                echo "Falla";
            }
        }

        public function deleteMaterias ($idMateria) {
            $sql = "DELETE FROM componentesacademicos WHERE idMateria=$idMateria";
            echo $sql;
            $result = mysqli_query($this -> con, $sql);
            if ($result) {
                return true;
                echo "eliminado";
            } else {
                return false;
                echo "Falla";
            }
        }

        public function deleteProfesores ($idProfesor) {
            $sql = "DELETE FROM profesor WHERE idProfesor=$idProfesor";
            echo $sql;
            $result = mysqli_query($this -> con, $sql);
            if ($result) {
                return true;
                echo "eliminado";
            } else {
                return false;
                echo "Falla";
            }
        }

        public function single_record($idEstudiante){
			$sql = "SELECT * FROM estudiantes where idEstudiante='$idEstudiante'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}

        public function single_record_materias($idMateria){
			$sql = "SELECT * FROM componentesacademicos where idMateria='$idMateria'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}

        public function single_record_profesor($idProfesor){
			$sql = "SELECT * FROM profesor where idProfesor='$idProfesor'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}

        public function updateEstudiantes($idEstudiante,$nombre, $apellido, $telefono, $email, $fecha_actualizacion_e){
            $sql="UPDATE estudiantes SET nombre='$nombre',
            apellido='$apellido',telefono='$telefono'
            ,email='$email', fecha_actualizacion_e = CURRENT_TIMESTAMP WHERE idEstudiante=$idEstudiante" ;
            $res=mysqli_query($this->con,$sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function updateMaterias($idMateria, $nombreMateria, $seccion, $detalles, $fecha_actualizacion_c){
            $sql="UPDATE componentesacademicos SET nombreMateria='$nombreMateria', seccion='$seccion', 
            detalles='$detalles', fecha_actualizacion_c = CURRENT_TIMESTAMP WHERE idMateria = $idMateria" ;
            $res=mysqli_query($this->con,$sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function updateProfesores($idProfesor,$nombre_p, $apellido_p, $email_p, $fecha_actualizar_p){
            $sql="UPDATE profesor SET nombre_p='$nombre_p',
            apellido_p='$apellido_p',email_p='$email_p', fecha_actualizar_p = CURRENT_TIMESTAMP WHERE idProfesor=$idProfesor" ;
            $res=mysqli_query($this->con,$sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function readOneEstudiantes($idEstudiante){
            $sql="SELECT * FROM estudiantes WHERE idEstudiante=$idEstudiante";
            $res=mysqli_query($this->con,$sql);
            return $res;
        }

        public function readOneProfesores($idProfesor){
            $sql="SELECT * FROM profesor WHERE idProfesor=$idProfesor";
            $res=mysqli_query($this->con,$sql);
            return $res;
        }

        public function getNombres ($idEstudiante) {
            $sql = "SELECT nombre, apellido FROM estudiantes WHERE idEstudiante=$idEstudiante";
            $result = mysqli_query($this->con, $sql);
            return $result;
        }
    }


?>