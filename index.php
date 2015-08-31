
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
           $listaLancamentosPrimeiraColuna[] = $carregar; 
           $controleLancamentos = 1;
        }
        else if($controleLancamentos === 1){
            $listaLancamentosSegundaColuna[] = $carregar;
            $controleLancamentos = 2;
        }
        else if($controleLancamentos === 2){
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
<script type="text/javascript">
$(document).ready(function (){
    
    $("#painelEmBreve").hide();
    $("#painelLancametos").hide();
    $("#painelTopVideos").hide();
    $("#painelVideoBemVindo").show();

    
    $("#btnPainelEmBreve").click(function (){
    $("#painelEmBreve").show();
    $("#painelLancametos").hide();
    $("#painelTopVideos").hide();
    $("#painelVideoBemVindo").hide();
    });
    
     $("#btnPainelLancametos").click(function (){
    $("#painelEmBreve").hide();
    $("#painelLancametos").show();
    $("#painelTopVideos").hide();
    $("#painelVideoBemVindo").hide();
    });
    
    
     $("#btnPainelTopVideos").click(function (){
    $("#painelEmBreve").hide();
    $("#painelLancametos").hide();
    $("#painelTopVideos").show();
    $("#painelVideoBemVindo").hide();
    });
    
     $("#btnPainelVideoBemVindo").click(function (){
    $("#painelEmBreve").hide();
    $("#painelLancametos").hide();
    $("#painelTopVideos").hide();
    $("#painelVideoBemVindo").show();
    });
 
});
</script>



        <div class="row">  
            <div class="col-md-12 col-sm-12 col-xs-12">
        <center>
            
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button id="btnPainelVideoBemVindo" type="button" class="btn btn-primary btn-lg">Home</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="btnPainelTopVideos" class="btn btn-success btn-lg">Top Visitados</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="btnPainelLancametos" class="btn btn-info btn-lg">Lançamentos</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="btnPainelEmBreve" class="btn btn-danger btn-lg">Em breve</button>
                        </div>
                    </div>
          
        </center>            
            </div>
       </div>



<!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 1%; margin-bottom: 3%;">
    <div class="col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-md-10 col-sm-10 col-xs-10">
        
        <center>
            
        </center>
       
        <div id="painelVideoBemVindo">
        <!-- COMENTARIO -->
        <div class="jumbotron" style="background: white; " >
            
    <div class="jumbotron" style="background: white; border: 2px #0085C5 solid; " >
        
        <div class="row">  
            <div class="col-md-12 col-sm-12 col-xs-12">
                <center>
                    <img src="resources/img/newba.jpg" style="max-height: 300px;" class="img-responsive" />
                </center>
                
                <br />

                <center>
                    <h3 style="color: graytext;">Tem dúvida sobre algo? Não perca tempo, nos mande ou deixe sua sugestão!</h3>  <br />
                    <a href="#" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-envelope"></span> Enviar</a>
                </center>

            </div> 
        </div>
    </div>
            
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
    
        </div>

        
        <div id="painelTopVideos">
        <div class="jumbotron" style="background: white;">

            <div class="row">  
            <div class="col-md-6 col-sm-12 col-xs-12" >
           
                <?php 
                
                foreach ($listaTopPrimeiraColuna as $top){
                    
                   
                     
                            echo '<div class="panel panel-success">
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
            <div class="col-md-6 col-sm-12 col-xs-12" >
                
                <?php 
                
                foreach ($listaTopSegundaColuna as $top){
                 
                     
                            echo '<div class="panel panel-success">
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
    
        
        
   
    <div id="painelLancametos">
    <div class="jumbotron" style="background: white;">
                    
    <div class="row">

    <div class="col-md-4 col-sm-12 col-xs-12" >
        
        

         <?php 
                
                foreach ($listaLancamentosPrimeiraColuna as $top){
                 
                     
                            echo '<div class="panel panel-info">
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

    <div class="col-md-4 col-sm-12 col-xs-12" >

        <?php 
                
                foreach ($listaLancamentosSegundaColuna as $top){
                 
                     
                            echo '<div class="panel panel-info">
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

    <div class="col-md-4 col-sm-12 col-xs-12" >

         <?php 
                
                foreach ($listaLancamentosTerceiraColuna as $top){
                 
                     
                            echo '<div class="panel panel-info">
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
        
        
        
        <!-- Painga em breve -->
    <div id="painelEmBreve">
    <div class="jumbotron" style="background: white;">
        <div class="row">
        <div class="col-sm-12  col-md-12 col-xs-12">
            <center>
                <img  src="resources/img/contrucao.jpg"  class="img-responsive" />
            </center>
        </div>
        </div>
    </div>
    </div>
        
    </div>
    <div class="col-sm-2  col-md-1 col-xs-1"></div>
</div>  

<?php require './template/rodape.php';?>

