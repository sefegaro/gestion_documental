<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <hr><hr>
                <div class="col-sm-3">
                    <!-- Botón para activar el modal -->
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#registrar_usuario">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registro
                    </button>
                </div>
                <form action="">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar por apellido">
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Correo</td>
                            <td>Estado</td>
                            <td>Documento</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody id=tabla_usuarios>
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="registrar_usuario" tabindex="-1" role="dialog" aria-labelledby="registrar_usuario" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Registrar Usuario</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form>
                                    <div class="form-group">
                                        <label for="primer_nombre">Primer Nombre</label>
                                        <input type="text" class="form-control" id="primer_nombre" aria-describedby="emailHelp" placeholder="Sergio" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="segundo_nombre">Segundo Nombre</label>
                                        <input type="text" class="form-control" id="segundo_nombre" aria-describedby="emailHelp" placeholder="Fernando" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="primer_apellido">Primer Apellido</label>
                                        <input type="text" class="form-control" id="primer_apellido" aria-describedby="emailHelp" placeholder="Garrido" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="segundo_apellido">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="segundo_apellido" aria-describedby="emailHelp" placeholder="Rocha" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="documento">Documento</label>
                                        <input type="text" class="form-control" id="documento" aria-describedby="emailHelp" placeholder="12475329461" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="ejemplo@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                    <a type="submit" class="btn btn-primary form-control" aling="center" href="#" id="btn_insert">Registrar</a>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="../funciones/crud_usuario.js"></script>