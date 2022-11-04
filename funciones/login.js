//al cargar la pagina
$(document).ready(function(){
    //si el boton del login es presionado
    if($("#btn_login").length){
        $("#btn_login").click(function(){
            //recolectamos los datos del formulario
            const usuario=$("#usuario").val();
            const pass=$("#pass").val();
            //validamos los campos
            //correo del usuario -usuario-
            if(usuario==""){
                alert("no registro el correo electronico");
                return false;
            }
            //contraseña del usuario -pass-
            if(pass==""){
                alert("no registro la contraseña");
                return false;
            }
            //usamos el ajax en formato JSON
            $.ajax({
                url:'controlador/general.php',//donde se envia los datos
                type:'POST',
                dataType:"json",//datos a regresar y su tipo
                async:true,
                data:{//datos que se llevan
                    action:"validar_usuario",
                    usuario:usuario,
                    pass:pass
                },
                success: function(response){//si todo sale correctamente
                    console.log(response);
                    console.log("funcion logueo exitoso");
                    if(response){
                        window.location.replace("controlador/general.php?action=main")
                    }else{
                        alert("usuario o contraseña incorrectas")
                    }
                },
                error: function(error){//si todo sale mal
                    console.log(error);
                    console.log(error.responseText);
                    console.log("funcion logueo fallida");
                }
            })
        });
    }
});