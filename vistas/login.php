<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <!--se crea un formulario con cualquier clase
                se le añade form-group para agruparlos-->
                <form action="" method="post">
                    <h1>BIENVENIDO</h1>
                    <div class="form-group">
                        <label for="" class="form-label">CORREO</label>
                        <input type="email" name="usuario" id="usuario" class="form-control" placeholder="ejemplo@gmail.com" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">CONTRASEÑA</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="" aria-describedby="helpId" required>
                    </div>
                    <div class="">
                        <!--<button type="submit" class="btn btn-primary form-control">INGRESAR</button>-->
                        <a type="submit" class="btn btn-primary form-control" href="#" id="btn_login">ingresar</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript" src="funciones/login.js"></script>