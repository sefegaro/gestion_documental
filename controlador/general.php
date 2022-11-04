<?php
#llamamos el modelo de bd generico
require_once("../modelo/bd.php");
#creamos variable para identificar el modelo
$modelo=new ModeloUsuario();
#si se realiza un post
if($_POST){

    #VALIDAR_USUARIO--------------------------------------
    if($_POST['action']=='validar_usuario'){
        #valores para muestreo de datos
        $correo="'".$_POST["usuario"]."'";
        $pass="'".$_POST["pass"]."'";
        #condición para el muestreo
        $condicion="correo=".$correo."AND password=".$pass;
        #llamamos la funcion mostrar de la clase ModeloUsuario
        $info=$modelo->logueo($condicion);
        echo json_encode($info);
    }

    #BUSQUEDA DE USUARIO EN DATATABLE----------------------
    if($_POST['action']=='buscar_usuario' && !empty($_POST['action'])){
        $buscar="'".$_POST["buscar"]."%'";#se le añade porcentaje para que tenga coincidencia
        #llamamos la funcion para recorrer tabla segun primer apellido del usuario
        $info=$modelo->tablaUsuario($buscar);
        #retornamos el valor al js crud_usuario
        echo json_encode($info);
    }

    #MOSTRAR USUARIOS--------------------------------------
    if($_POST['action']=='mostrar_usuarios'){
        #llamamos la funcion para mostrar los datos del todos los usuarios
        $info=$modelo->mostrarUsuarios();
        #retornamos el valor al js crud_usuario
        echo json_encode($info);
    }

    #INSERTAR USUARIOS-------------------------------------
    if($_POST['action']=='insertar_usuarios'){
        echo "entro a insersion de datos";
        #valores para insercion de datos
        $primer_nombre="'".$_POST["primer_nombre"]."'";
        $segundo_nombre="'".$_POST["segundo_nombre"]."'";
        $primer_apellido="'".$_POST["primer_apellido"]."'";
        $segundo_apellido="'".$_POST["segundo_apellido"]."'";
        $documento=$_POST["documento"];
        $correo="'".$_POST["correo"]."'";
        $password="'".$_POST["password"]."'";
        //agrupamos los datos como desarrollando una consulta sql
        $data=$primer_nombre.",".$segundo_nombre.",".$primer_apellido.",
        ".$segundo_apellido.",".$correo.",".$password.",0,".$documento;
        print($data);
        //llamamos la funcion para insertar los datos del usuario
        $modelo->insertarUsuario($data);
    }
}
#si se realiza un get
if($_GET){

    #ENTRANDO AL MAIN-------------------------------------
    if($_GET['action']=='main'){
        #si el usuario no se ha logueado, generar lo siguiente
        if($_SESSION["id_usuario"]<1){
            header("Location:../index.php");
        }
        #llamamos la funcion que identifica las opciones del banner
        $info=$modelo->banner($_SESSION["id_usuario"]);
        #llamamos el header para que jquery funcione
        require_once("../vistas/header.php");
        #llamamos el iden_ban para que el menu automatico funcione
        require_once("../vistas/iden_ban.php");
        #llamamos el home
        require_once("../vistas/main.php");
    }

    #ENTRANDO AL USUARIOS---------------------------------
    if($_GET['action']=='usuarios'){
        #si el usuario no se ha logueado, generar lo siguiente
        if($_SESSION["id_usuario"]<1){
            header("Location:../index.php");
        }
        #llamamos la funcion que identifica las opciones del banner
        $info=$modelo->banner($_SESSION["id_usuario"]);
        #llamamos el header para que jquery funcione
        require_once("../vistas/header.php");
        #llamamos el iden_ban para que el menu automatico funcione
        require_once("../vistas/iden_ban.php");
        #llamamos usuarios
        require_once("../vistas/usuarios.php");
    }

    #ENTRANDO A RECEPCION-----------------------------------
    if($_GET['action']=='recepcion'){
        #si el usuario no se ha logueado, generar lo siguiente
        if($_SESSION["id_usuario"]<1){
            header("Location:../index.php");
        }
        #llamamos la funcion que identifica las opciones del banner
        $info=$modelo->banner($_SESSION["id_usuario"]);
        #llamamos el header para que jquery funcione
        require_once("../vistas/header.php");
        #llamamos el iden_ban para que el menu automatico funcione
        require_once("../vistas/iden_ban.php");
        #llamamos el recepcion
        require_once("../vistas/recepcion.php");
    }

    #ENTRANDO A EMISION-------------------------------------
    if($_GET['action']=='emision'){
        #si el usuario no se ha logueado, generar lo siguiente
        if($_SESSION["id_usuario"]<1){
            header("Location:../index.php");
        }
        #llamamos la funcion que identifica las opciones del banner
        $info=$modelo->banner($_SESSION["id_usuario"]);
        #llamamos el header para que jquery funcione
        require_once("../vistas/header.php");
        #llamamos el iden_ban para que el menu automatico funcione
        require_once("../vistas/iden_ban.php");
        #llamamos el emision
        require_once("../vistas/emision.php");
    }

    #ENTRANDO A ADMINISTRACION-------------------------------------
    if($_GET['action']=='administracion'){
        #si el usuario no se ha logueado, generar lo siguiente
        if($_SESSION["id_usuario"]<1){
            header("Location:../index.php");
        }
        #llamamos la funcion que identifica las opciones del banner
        $info=$modelo->banner($_SESSION["id_usuario"]);
        #llamamos el header para que jquery funcione
        require_once("../vistas/header.php");
        #llamamos el iden_ban para que el menu automatico funcione
        require_once("../vistas/iden_ban.php");
        #llamamos el administracion
        require_once("../vistas/administracion.php");
    }
}
