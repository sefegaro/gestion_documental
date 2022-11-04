//MOSTRAR USUARIO EN ESPECIFICO------------------------------
$('#buscar').keyup(function(){
    //si se ingresan valores en el input
    if($("#buscar").val()){
        let search=$('#buscar').val();
        console.log(search)
        $.ajax({
            url:'general.php',
            type:'POST',
            //dataType:"json",//datos a regresar y su tipo//generan error
            async:true,
            data:{//datos que se llevan
                action:"buscar_usuario",
                buscar:search
            },
            success: function(response){//si todo sale bien
                console.log("Busqueda de datos exitosa");
                //almacenamos los valores e una variable
                let usuarios=JSON.parse(response);
                let template='';
                //si el valor de vuelta es diferente a nulo
                if(usuarios!=null){
                    //recorremos los valores encontrados
                    usuarios.forEach(element => {
                    template +="<tr><td>"+element.id_usuario+"</td>";
                    template +="<td>"+element.primer_nombre+" "+element.segundo_nombre+"</td>";
                    template +="<td>"+element.primer_apellido+" "+element.segundo_apellido+"</td>";
                    template +="<td>"+element.correo+"</td>";
                    template +="<td>"+element.descripcion+"</td>";
                    template +="<td>"+element.documento+"</td>";
                    template +="<td>CRUD</td></tr>";
                    });
                }else{
                    mostrar_usuarios();
                }
                //lo mostramos en la tabla destinada de la informacion de usuarios con la plantilla
                $("#tabla_usuarios").html(template);
            },
            error: function(error){
                console.log("Busqueda de datos fallida");
                console.log(error.responseText);
            }
        })
    }
});

$(document).ready(function(){
    //mostramos la informacion de los usuarios al cargar la pagina
    mostrar_usuarios();

    //INSERTAR USUARIO------------------------------------------
    if($("#btn_insert").length){
        $("#btn_insert").click(function(){
            //recolectamos los datos del formulario
            const primer_nombre=$("#primer_nombre").val();
            const segundo_nombre=$("#segundo_nombre").val();
            const primer_apellido=$("#primer_apellido").val();
            const segundo_apellido=$("#segundo_apellido").val();
            const documento=$("#documento").val();
            const correo=$("#correo").val();
            const password=$("#password").val();
            //validamos los campos
            if(primer_nombre==""){
                alert("No registro el primer nombre");
                return false;
            }
            if(segundo_nombre==""){
                alert("No registro el segundo nombre");
                return false;
            }
            if(primer_apellido==""){
                alert("No registro el primer apellido");
                return false;
            }
            if(segundo_apellido==""){
                alert("No registro el segundo apellido");
                return false;
            }
            if(documento==""){
                alert("No registro el documento");
                return false;
            }
            if(correo==""){
                alert("No registro el correo");
                return false;
            }
            if(password==""){
                alert("No registro la contraseña");
                return false;
            }
            //generamos el ajax para registrar el usuario
            $.ajax({
                url:'general.php',//donde se envia los datos
                type:'POST',
                async:true,
                data:{//datos que se llevan
                    action:"insertar_usuarios",
                    primer_nombre:primer_nombre,
                    segundo_nombre:segundo_nombre,
                    primer_apellido:primer_apellido,
                    segundo_apellido:segundo_apellido,
                    documento:documento,
                    correo:correo,
                    password:password
                },
                success: function(response){//si todo sale bien
                    console.log("inserción del usuario fue exitosa");
                    if(response){
                        alert("usuario registrado")
                    }else{
                        alert("usuario no registrado")
                    }
                },
                error: function(error){//si todo sale mal
                    console.log("inserción del usuario fallida");
                    console.log(error);
                    alert(error);
                }
            })
        })
    }
});

//MOSTRAR USUARIOS------------------------------------------
function mostrar_usuarios(){
    $.ajax({
        url:'general.php',
        type:'POST',
        async:true,
        data:{
            action:"mostrar_usuarios",
        },
        success:function(response){
            console.log("Muestreo de usuarios Exitoso");
            //almacenamos los valores e una variable
            let usuarios=JSON.parse(response);
            let template='';
            //recorremos los valores encontrados
            usuarios.forEach(element => {
                template +="<tr><td>"+element.id_usuario+"</td>";
                template +="<td>"+element.primer_nombre+" "+element.segundo_nombre+"</td>";
                template +="<td>"+element.primer_apellido+" "+element.segundo_apellido+"</td>";
                template +="<td>"+element.correo+"</td>";
                template +="<td>"+element.descripcion+"</td>";
                template +="<td>"+element.documento+"</td>";
                template +="<td>CRUD</td></tr>";
            });
            //lo mostramos en la tabla destinada de la informacion de usuarios con la plantilla
            $("#tabla_usuarios").html(template);
        },
        error: function(error){
            console.log("Busqueda de datos fallida");
            console.log(error.responseText);
        }
    })
}
