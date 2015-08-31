<html >
<head>
  <title>Newba Tutoriais</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../resources/css/base.css" type="text/css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body >
<div class="container-fluid " style="background-image: url(./resources/img/fundao.png); min-height: 100%; background-repeat: repeat;">
        
<!-- Pagina do menubar -->
<div class="row">
<div class="col-md-12">
    <nav class="navbar navbar-default">
   <div class="container-fluid">
         <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBarUser">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span> 
                                </button>
             <a class="navbar-brand" style="color: teal;" href="index.php"><img  src="./resources/img/logo.png" alt="Newba Tutoriais e Dicas" class="img-responsive" /></a>
                            </div>
                            <div class="collapse navbar-collapse" id="navBarUser">

                                <ul class="nav navbar-nav navbar-right" >
                                    <li><a href="index.php"><span class="glyphicon glyphicon-home" style="color: teal;">Home</span></a></li>
                                    <li><a href="quemsomos.php"><span class="glyphicon glyphicon-user" style="color: teal;">Quem Somos</span></a></li>
                                    <li><a href="contato.php"><span class="glyphicon glyphicon-book" style="color: teal;">Contato</span></a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-volume-up" data-toggle="modal"  data-target="#modalMusica" style="color: teal;">Radio</span></a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-share" data-toggle="modal"  data-target="#modalLogin" style="color: teal;">Entrar</span></a></li>
                                </ul>
                            </div>
       
       
         <!-- Modal -->
    <div id="modalLogin" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Entrar</h4>
          </div>
          <div class="modal-body">
              
              <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                <form action="./visao/login.php" method="POST" role="form" >
                    <div class="form-group">
                        <label  for="email">Seu email:</label>
                        <input type="email" required="true" placeholder="Insere o seu email" class="form-control" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="email">Sua senha:</label>
                        <input type="password" required="true" placeholder="Insere sua senha" class="form-control" id="senha" name="senha" />
                    </div>
                    <center>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success btn-lg">
                                <span class="glyphicon glyphicon-ok"></span>
                                Logar</button> 
                            <button type="reset" class="btn btn-danger btn-lg">
                                <span class="glyphicon glyphicon-remove"></span>
                                Limpar</button>                        
                        </div>
                    </center>
                </form>              
            </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>

      </div>
    </div>
         
         
               <!-- Modal -->
    <div id="modalMusica" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Radio</h4>
          </div>
          <div class="modal-body">
             <div style="background: url(resources/img/musica.jpg); background-size: cover; min-height: 50px; padding-bottom: 1%; padding-top: 1%; ">
                      <center>
                        <iframe src='http://player.dyb.fm/radiodyb?theme=miniColorful&backgroundColor=ffffff&chromeColor=1434b3&fontColor=ffffff&play=1'
                        style='width:200px; height:80px;border:0;' frameborder='0' allowtransparency='true'></iframe>
                      </center>
            </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>

      </div>
    </div>
             
  </div>
</nav> 
</div>
</div>  

<div class="row" style="margin-top: 1%; margin-bottom: 1%;">
    
    <div class="col-md-12 col-sm-12 col-xs-12">      
    <div id="newbaCorousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#newbaCorousel" data-slide-to="0" class="active"></li>
            <li data-target="#newbaCorousel" data-slide-to="1"></li>
            <li data-target="#newbaCorousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="./resources/img/header.png" alt="Newba Tutoriais e Dicas" class="img-rounded img-responsive" />
         
            </div>
            <div class="item">
                <img src="./resources/img/header2.png" alt="Newba Tutoriais e Dicas" class="img-rounded img-responsive" />

            </div>
            <div class="item">
                <img src="./resources/img/header3.png" alt="Newba Tutoriais e Dicas" class="img-rounded img-responsive" />
  
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#newbaCorousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#newbaCorousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    </div>
</div>

