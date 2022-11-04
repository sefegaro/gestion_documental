<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--boton para contraer navbar-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            <a class="navbar-brand" href="#">Logo</a>
            </div>

            <!--dentro de este div se contraeran-->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../controlador/general.php?action=main">Home</a></li>
                    <!-- iteramos la informacion enontrada en banner del modelo -->
                    <?php foreach($info as $key){?>
                        <li><a href="../controlador/general.php?action=<?php echo $key['url'] ?>"><?php echo $key['url'] ?></a></li>
                    <?php } ?>
                </ul>
                <!-- alinear a la derecha-->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php"> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
