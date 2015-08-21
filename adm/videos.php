<?php require '../template/topoadm.php'; 

include_once  '../dao/DaoModificacao.php';
include_once '../entidades/Modificacao.php';
include_once '../dao/DaoAdm.php';
include_once '../entidades/Adm.php';
include_once '../banco/Conexao.php';


$daoModificacao = new DaoModificacao();
$daoAdm = new DaoAdm();


if(isset($_GET['id'])){
    $idSelecionado = $_GET['id'];
}

$videoNovo = new Modificacao();
$videoNovo = $daoModificacao->buscarPorId($idSelecionado);

$autor = $daoAdm->buscarPorId($videoNovo->getIdAdm())->getNome();

?>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 1%; margin-bottom: 1%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        <div class="jumbotron" style=" background: white; ">
            
           <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados</h3>
                    </div>
                    <div class="panel-body">
                     <label>Titulo: <?php echo $videoNovo->getTitulo() ?></label><br />
                     <label>Tipo: <?php echo $videoNovo->getTipo() ?></label><br />
                     <label>Administrador: <?php echo $autor ?> </label><br />
                     
                     <hr />
                
                <center>
                 <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalDeletar">
                        <span class="glyphicon glyphicon-trash"></span>               
                        Deletar                       
                    </button> 
                     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAtualizar">
                        <span class="glyphicon glyphicon-search"></span>               
                        Atualizar                       
                    </button> 
                </div>
                </center>
                    
                    </div>
           </div>
                        
            
<!-- Modal de visualiziação  -->
<div id="modalDeletar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Exclusão</h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white;">
              <label>Tem certeza que deseja excluir <?php echo $videoNovo->getTitulo() ?>?</label>
              <br />
              <br />
              <center>
                  <div class="btn-group">
                      <a  href="<?php echo 'videos.php?id='.$idSelecionado.'&deletar=sim' ?>" class="btn btn-danger btn-lg" >
                        <span class="glyphicon glyphicon-ok"></span>               
                        Sim                       
                    </a>  
                    <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>               
                        Não                       
                    </button>  
                  </div>
              </center>         
          </div>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal de visualiziação do formulario -->
<div id="modalAtualizar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atualizar</h4>
      </div>
      <div class="modal-body">
          
          <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados</h3>
                    </div>
                    <div class="panel-body">
                <form action="videos.php" method="GET" role="form" >
                <input type="hidden" id="id" name="id" value="<?php echo $idSelecionado ?>" />
                <input type="hidden" id="atualizar" name="atualizar" value="sim" />
                    <div class="form-group">
                        <label  for="titulo">Titulo:</label>
                        <input type="text" value="<?php echo $videoNovo->getTitulo() ?>" class="form-control" id="titulo" name="titulo" />
                    </div>
                    <div class="form-group">
                        <label  for="texto">Texto:</label>
                        <input type="text" value="<?php echo $videoNovo->getTexto() ?>" class="form-control" id="texto" name="texto" />
                    </div>
                    <div class="form-group">
                        <label  for="url">Url Video:</label>
                        <input type="url" value="<?php echo $videoNovo->getVideo() ?>" class="form-control" id="url" name="url" />
                    </div>
                    <div class="form-group">
                        <label  for="tipo">Tipo:</label>
                        <div class="radio">
                            <label><input  type="radio" name="tipo" <?php 
                            if($videoNovo->getTipo()==="topvisitados"){
                                echo "checked='true'";
                            }
                              ?> value="topvisitados">Top visitados</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="tipo" <?php 
                            if($videoNovo->getTipo()==="lancamentos"){
                                echo "checked='true'";
                            }
                              ?> value="lancamentos">Lancamentos</label>
                        </div>
                    </div>
                    
                    <center>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success btn-lg">
                                <span class="glyphicon glyphicon-ok"></span>
                                Atualizar</button> 
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            
            <!-- LINK PARA VOLTAR -->        
            <a href="administrar.php" title="Voltar para a pagina incial" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    left:30px;" >
                <span class="glyphicon glyphicon-arrow-left"></span>
                Voltar</a>
            
        </div>
    </div>  
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
</div>  



<?php require '../template/rodape.php'; ?>

<!-- deletar usuario -->
<?php 


if(isset($_GET['deletar'])){
   if($_GET['deletar'] == "sim"){
      
       try{
      
       
       $daoModificacao->deletar($videoNovo->getId());
       
       echo "<script type='text/javascript'>";
    
            echo "alert('Video deletado com sucesso!');";
            echo "location.href='http://localhost/newbatutoriais/adm/administrar.php';";

       echo "</script>";
       
       
       }
       catch (Exception $erro){
           
       print($erro);  
           
       echo "<script type='text/javascript'>";
    
            echo "alert('Erro ao tentar deletar video!');";
            echo "location.href='http://localhost/newbatutoriais/adm/administrar.php';";

       echo "</script>";
           
       }
       
   } 
}


if(isset($_GET['atualizar'])){
   if($_GET['atualizar'] == "sim"){
      
      
       try{
           
           $novoVideo = new Modificacao();
           
           if(isset($_GET['id'])){
               $novoVideo->setId($_GET['id']);
           }
           
           if(isset($_GET['titulo'])){
               $novoVideo->setTitulo($_GET['titulo']);
           }
           
           if(isset($_GET["texto"])){
               $novoVideo->setTexto($_GET["texto"]);
           }
           
           if(isset($_GET["url"])){
               $novoVideo->setVideo($_GET["url"]);
           }
           
           if(isset($_GET["tipo"])){
               $novoVideo->setTipo($_GET["tipo"]);
           }
           
           $novoVideo->setIdAdm($videoNovo->getIdAdm());
           $novoVideo->setHtml($videoNovo->getHtml());
      
       
       $daoModificacao->atualizar($novoVideo);
       
       echo "<script type='text/javascript'>";
    
            echo "alert('Video atualizado com sucesso!');";
            echo "location.href='http://localhost/newbatutoriais/adm/administrar.php';";

       echo "</script>";
       
       
       }
       catch (Exception $erro){
           
       print($erro);  
           
       echo "<script type='text/javascript'>";
    
            echo "alert('Erro ao tentar atualizar video!');";
            echo "location.href='http://localhost/newbatutoriais/adm/gerenciar.php';";

       echo "</script>";
           
       }
       
   } 
}

?>

