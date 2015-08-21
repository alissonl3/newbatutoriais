<html >
    <head>
        <title>Questionário de Egressos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../resources/css/base.css" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        

        <?php
        // esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. 
        session_start();
        
        if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location:http://localhost/newbatutoriais/index.php');
        }

        $logado = $_SESSION['nome'];
        $idAdm = $_SESSION['id'];
        
        ?>

        


    </head>
    <body >
        <div class="container-fluid" >

            <!-- Pagina do menubar -->
            <div class="row" >
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBarUser">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span> 
                                </button>
                                <a class="navbar-brand" style="color: teal;" href="#"><img  src="../resources/img/logo.png" alt="Newba Tutoriais e Dicas" class="img-resposive" /></a>
                            </div>
                            <div class="collapse navbar-collapse" id="navBarUser">

                                <ul class="nav navbar-nav navbar-right" >
                                    <li><a href="#"><span class="label" style="color: black;"><?php echo "Seja Bem vindo $logado"; ?></span></a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-share" data-toggle="modal"  data-target="#modalVideo" style="color: teal;">Adicionar Video</span></a></li>
                                    <li><a href="../visao/logout.php"><span class="glyphicon glyphicon-log-out" style="color: teal;">Sair</span></a></li>            
                                </ul>
                            </div>
                            
                            
                                 <!-- Modal -->
    <div id="modalVideo" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Adicionar</h4>
          </div>
          <div class="modal-body">
              
              <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Dados</h3>
            </div>
            <div class="panel-body">
                <form action="../visao/adicionarVideo.php" method="POST" role="form" >

                    <input type="hidden" value="<?php echo $_SERVER['PHP_SELF'] ?>" name="urlatual" id="urlatual" />
                    <input type="hidden" value="<?php echo $idAdm ?>" name="idadm" id="idadm" />
                    
                    <div class="form-group">
                        <label  for="titulo">Titulo:</label>
                        <input type="text" required="true" placeholder="Insere o titulo" class="form-control" id="titulo" name="titulo" />
                    </div>
                    <div class="form-group">
                        <label for="texto">Texto:</label>
                        <textarea  required="true" rows="3" class="form-control" id="texto" name="texto" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">Url:</label>
                        <input type="text" required="true" placeholder="Insere a url do video" class="form-control" id="url" name="url" />
                    </div>
                    <div class="form-group">
                        <label  for="tipo">Tipo:</label>
                        <div class="radio">
                            <label><input  type="radio" name="tipo" value="topvisitados">Top Visitados</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="tipo" value="lancamentos">Lançamentos</label>
                        </div>
                    </div>
                    <center>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success btn-lg">
                                <span class="glyphicon glyphicon-ok"></span>
                                Adicionar</button> 
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
                <img src="../resources/img/header.png" alt="Newba Tutoriais e Dicas" class="img-rounded img-responsive" />
         
            </div>
            <div class="item">
                <img src="../resources/img/header2.png" alt="Newba Tutoriais e Dicas" class="img-rounded img-responsive" />

            </div>
            <div class="item">
                <img src="../resources/img/header3.png" alt="Newba Tutoriais e Dicas" class="img-rounded img-responsive" />
  
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
