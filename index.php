
<?php require './template/topo.php'; ?>


<!-- CARREGAMENTO DA PAGINA -->
<?php 

include_once  './dao/DaoModificacao.php';
include_once './entidades/Modificacao.php';
include_once './banco/Conexao.php';

$daoModificacao = new DaoModificacao();

$carregamento = $daoModificacao->buscarTodos();

$listaTopPrimeiraColuna = array();
$listaTopSegundaColuna = array();

$listaLancamentosPrimeiraColuna = array();
$listaLancamentosSegundaColuna = array();
$listaLancamentosTerceiraColuna = array();

 
$controleVisitados = 0;
$controleLancamentos = 0;

//preenchimentos das litas
foreach ($carregamento as $carregar){
    
    if($carregar->getTipo()==="topvisitados"){
      
        if($controleVisitados === 0){
           $listaTopPrimeiraColuna[]= $carregar; 
           $controleVisitados++;
        }
        else if($controleVisitados === 1){
            $listaTopSegundaColuna[] = $carregar;
            $controleVisitados = 0;
        }
        
        
       $listaTop[] = $carregar; 
    }
    else if($carregar->getTipo() === "lancamentos"){
        
        if($controleLancamentos === 0){
           $listaLancamentosPrimeiraColuna[]= $carregar; 
           $controleLancamentos++;
        }
        else if($controleVisitados === 1){
            $listaLancamentosSegundaColuna[] = $carregar;
            $controleLancamentos++;
        }
        else if($controleVisitados === 2){
            $listaLancamentosTerceiraColuna[] = $carregar;
            $controleLancamentos = 0;
        }
    }
    
}

//converter a url para a embed
function retornarEmbed($url){
    $urlEmbed = str_replace("watch?v=", "embed/", $url);
    $urlEmbed = str_replace("&feature=youtu.be", "", $urlEmbed);
   return $urlEmbed; 
}

?>


<!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 1%; margin-bottom: 5%;">
    <div class="col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-md-10 col-sm-10 col-xs-10">
       
        
        <!-- COMENTARIO -->
        <div class="jumbotron" style="background: white;" >
            
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Seja Bem Vindo ao Newba Turoriais e Dicas</h3>
                    </div>
                    <div class="panel-body">
                     
                            <center>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe  src="https://www.youtube.com/embed/sTv3aJROGg4" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </center>
                      
                        <br />
                        <hr />
                        <div style="text-align: justify;">
                         Newba Tutoriais e Dicas é um canal que tem o intuito de auxiliar pessoas
               nas diversar áreas da informática, com tutoriais básicos de instalações, recomendações,
               designer, programação, etc. Venha fazer parte dessa família você também, inscreva-se em nosso canal
               clicando no icone do youtube.
                        </div>                       
                        <br />
                        <hr />
                        <center>
                            <a href="https://www.youtube.com/user/newbatutoriais" target="_blank"> <img src="resources/img/youtube.png" alt="Canal do Newba Tutoriais e Dicas" class="img-responsive" /> </a>
                        </center>
                        
                    </div>
                </div>

                
        </div>
        
        <div class="jumbotron" style="background: white;">
            <center><h2 style="color: graytext;">Top visitados</h2></center>
            
            <hr />
            
            <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6" >
                <?php 
                
                foreach ($listaTopPrimeiraColuna as $top){
                    
                   
                     
                            echo '<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">';
                                echo $top->getTitulo();
                                echo '</h3>
                                    </div>
                                    <div class="panel-body">
                                        <center>
                                            <div class="embed-responsive embed-responsive-16by9">';
                                echo "<iframe  src='".retornarEmbed($top->getVideo())."' frameborder='0' allowfullscreen></iframe>";
                                echo "</div>
                                      <br/>
                                      <hr />";
                                    echo   $top->getTexto();
                                    echo   '<br/>
                                            <hr/>';                
                                    echo   "<a href='".$top->getVideo()."' target='_blank' class='btn btn-danger'>Youtube</a>";
                                echo "</center>
                                        </div>
                                        </div>";
                 
                }

                ?>
               
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6" >
                
                <?php 
                
                foreach ($listaTopSegundaColuna as $top){
                 
                     
                            echo '<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">';
                                echo $top->getTitulo();
                                echo '</h3>
                                    </div>
                                    <div class="panel-body">
                                        <center>
                                            <div class="embed-responsive embed-responsive-16by9">';
                                echo "<iframe  src='".retornarEmbed($top->getVideo())."' frameborder='0' allowfullscreen></iframe>";
                                echo "</div>
                                      <br/>
                                      <hr />";
                                    echo   $top->getTexto();
                                    echo   '<br/>
                                            <hr/>';                
                                    echo   "<a href='".$top->getVideo()."' target='_blank' class='btn btn-danger'>Youtube</a>";
                                echo "</center>
                                        </div>
                                        </div>";
               
                }

                ?>
                
            </div>
            </div>
          
        </div>
    
    
         <div class="jumbotron" style="background: white;">
             
             <center><h2 style="color: graytext;">Lançamentos</h2></center>
            
            <hr />
            
            <div class="row">

    <div class="col-md-4 col-sm-4 col-xs-4" >

         <?php 
                
                foreach ($listaLancamentosPrimeiraColuna as $top){
                 
                     
                            echo '<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">';
                                echo $top->getTitulo();
                                echo '</h3>
                                    </div>
                                    <div class="panel-body">
                                        <center>
                                            <div class="embed-responsive embed-responsive-16by9">';
                                echo "<iframe  src='".retornarEmbed($top->getVideo())."' frameborder='0' allowfullscreen></iframe>";
                                echo "</div>
                                      <br/>
                                      <hr />";
                                    echo   $top->getTexto();
                                    echo   '<br/>
                                            <hr/>';                
                                    echo   "<a href='".$top->getVideo()."' target='_blank' class='btn btn-danger'>Youtube</a>";
                                echo "</center>
                                        </div>
                                        </div>";
               
                }

                ?>

    </div>

    <div class="col-md-4 col-sm-4 col-xs-4" >

        <?php 
                
                foreach ($listaLancamentosSegundaColuna as $top){
                 
                     
                            echo '<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">';
                                echo $top->getTitulo();
                                echo '</h3>
                                    </div>
                                    <div class="panel-body">
                                        <center>
                                            <div class="embed-responsive embed-responsive-16by9">';
                                echo "<iframe  src='".retornarEmbed($top->getVideo())."' frameborder='0' allowfullscreen></iframe>";
                                echo "</div>
                                      <br/>
                                      <hr />";
                                    echo   $top->getTexto();
                                    echo   '<br/>
                                            <hr/>';                
                                    echo   "<a href='".$top->getVideo()."' target='_blank' class='btn btn-danger'>Youtube</a>";
                                echo "</center>
                                        </div>
                                        </div>";
               
                }

                ?>

    </div>

    <div class="col-md-4 col-sm-4 col-xs-4" >

         <?php 
                
                foreach ($listaLancamentosTerceiraColuna as $top){
                 
                     
                            echo '<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">';
                                echo $top->getTitulo();
                                echo '</h3>
                                    </div>
                                    <div class="panel-body">
                                        <center>
                                            <div class="embed-responsive embed-responsive-16by9">';
                                echo "<iframe  src='".retornarEmbed($top->getVideo())."' frameborder='0' allowfullscreen></iframe>";
                                echo "</div>
                                      <br/>
                                      <hr />";
                                    echo   $top->getTexto();
                                    echo   '<br/>
                                            <hr/>';                
                                    echo   "<a href='".$top->getVideo()."' target='_blank' class='btn btn-danger'>Youtube</a>";
                                echo "</center>
                                        </div>
                                        </div>";
               
                }

                ?>
    
</div>
                
            </div>
        </div>
    

    </div>
    <div class="col-sm-2  col-md-1 col-xs-1"></div>
</div>  

<?php require './template/rodape.php';?>

