<?php
#iniciamos las variaables de tipo session
session_start();
#definimos la clase universal
class ModeloUsuario{
    #generamos una variable privada
    private $modelo;
    #variable privada para la gestion de la base de datos
    private $db;
    private $user = "postgres"; #usuario de la base de datos
    private $pass = "admin"; #contraseña de la base de datos
    private $info = null;
    #atributos de conexión
    private $atributos = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    #creamos un constructor para la base de datos
    public function __construct(){
        #agramos el modelo tipo array
        $this->Modelo=array();
        #agregamos la estructura para la conexión de la base de datos
        $this->db=new PDO('pgsql:dbname=gestion_documental;host=localhost;',$this->user,$this->pass,$this->atributos);
    }

    #validación de login------------------------------
    public function logueo($condicion){
        #generamos la consulta
        $consulta="SELECT * FROM usuario WHERE ".$condicion;
        #ejecutamos la consulta en la base de datos
        $resultado=$this->db->query($consulta);
        #iteramos la información encontrada y la guardamos en una variable
        foreach($resultado as $key){
            $_SESSION["id_usuario"]=$key['id_usuario'];
            $this->info=$key['id_usuario'];
        }
        #si el valor existe
        if($this->info>=1){
            return true;
        }else{#si no existe
            return false;
        }
    }

    #consultas para el banner, se identifican las url de la tabla submodulo
    #y asi generar un banner
    #Banner-----------------------------------------------
    public function banner($id_usuario){
        #generamos la consulta
        $consulta="SELECT has.id_usuario, s.url 
        FROM usuario_has_submodulos has RIGHT JOIN submodulos s
        ON s.id_submodulo=has.id_submodulo WHERE has.id_usuario=".$id_usuario;
        #ejecutamos la consulta en la base de datos
        $resultado=$this->db->query($consulta);
        #iteramos la información encontrada y la guardamos en una variable
        while($filas = $resultado->FETCHALL(PDO::FETCH_ASSOC)){
            #guardamos la informacion
            $this->info=$filas;
        }
        #retornamos la información
        return $this->info;
    }

    #consulta para el muestro de tabla de los usuarios
    #Datatable usuarios------------------------------------
    public function tablaUsuario($primer_apellido){
        #generamos la consulta
        $consulta="SELECT *
        FROM usuario u INNER JOIN estado e 
        ON u.id_estado=e.id_estado where u.primer_apellido LIKE ".$primer_apellido;
        #ejecutamos la consulta en la base de datos
        $resultado=$this->db->query($consulta);
        #iteramos la información encontrada y la guardamos en una variable
        while($filas = $resultado->FETCHALL(PDO::FETCH_ASSOC)){
            #guardamos la informacion
            $this->info=$filas;
        }
        #retornamos la información
        return $this->info;
    }

    #Mostrar Usuarios------------------------------------------
    public function mostrarUsuarios(){
        #generamos la consulta
        $consulta="SELECT *
        FROM usuario u INNER JOIN estado e 
        ON u.id_estado=e.id_estado";
        #ejecutamos la consulta en la base de datos
        $resultado=$this->db->query($consulta);
        #iteramos la información encontrada y la guardamos en una variable
        while($filas = $resultado->FETCHALL(PDO::FETCH_ASSOC)){
            #guardamos la informacion
            $this->info=$filas;
        }
        #retornamos la informacion
        return $this->info;
    }

    #actualizar información
    public function actualizar($tabla,$data,$condicion){
        #generamos la consulta
        $consulta="UPDATE ".$tabla." SET ".$data." WHERE ".$condición;
        #ejecutamos la consulta en la base de datos
        $resultado=$this->db->query($consulta);
        #condicional del resultado de la consulta
        if($resultado){return true;}else{return false;}
    }

    #eliminar información
    public function eliminar($tabla,$condicion){
        #generamos la consulta
        $consulta="DELETE FROM ".$tabla." WHERE ".$condicion;
        #ejecutamos la consulta en la base de datos
        $resultado=$this->db->query($consulta);
        #condicional del resultado de la consulta
        if($resultado){return true;}else{return false;}
    }

    #inserción de datos
    public function insertarUsuario($data){
        #generamos la consulta
        $consulta="INSERT INTO usuario(
            primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, correo, password, id_estado, documento)
            VALUES (".$data.")";
        #ejecutamos la consulta en la base de datos
        $resultado=$this->db->query($consulta);
        #condicional del resultado de la consulta
        if($resultado){return true;}else{return false;}
    }
}