<?php require '../template/topoadm.php'; 

include_once  '../dao/DaoAdm.php';
include_once '../dao/DaoModificacao.php';
include_once '../entidades/Adm.php';
include_once '../entidades/Modificacao.php';
include_once '../banco/Conexao.php';


$daoUsuario = new DaoAdm();
$daoModi = new DaoModificacao();



if(isset($_GET['id'])){
    $idSelecionado = $_GET['id'];
}

$admSelecionado = $daoUsuario->buscarPorId($idSelecionado);

//buscar todos os videos de acordo com o administrador
$videosDoUsuario = $daoModi->buscarPorAdm($idSelecionado);

?>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 1%; margin-bottom: 1%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        <div class="jumbotron" style=" background: white; border: 2px greenyellow solid;">
            
           <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados</h3>
                    </div>
                    <div class="panel-body">
                     <label>Nome: <?php echo $admSelecionado->getNome() ?> </label><br />
                     <label>Email: <?php echo $admSelecionado->getEmail() ?> </label><br />
                     <label>Telefone: <?php echo $admSelecionado->getTelefone() ?> </label><br />
                
                <center>
                 <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalDeletar">
                        <span class="glyphicon glyphicon-trash"></span>               
                        Deletar                       
                    </button> 
                     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalHistorico">
                        <span class="glyphicon glyphicon-search"></span>               
                        Histórico                       
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
              <label>Tem certeza que deseja excluir <?php echo $admSelecionado->getNome() ?>?</label>
              <br />
              <br />
              <center>
                  <div class="btn-group">
                      <a  href="<?php echo 'dados.php?id='.$idSelecionado.'&deletar=sim' ?>" class="btn btn-danger btn-lg" >
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
<div id="modalHistorico" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Histórico</h4>
      </div>
      <div class="modal-body">
          
          <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dados</h3>
                    </div>
                    <div class="panel-body">
        
          <?php 
          
          if(count($videosDoUsuario) > 0){
              
              echo '<div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title">';
                      echo count($videosDoUsuario);
                        echo '</h3>
                              </div>
                              <div class="panel-body">
                               <center>';
                        
                        foreach ($videosDoUsuario as $video){
                          
                            echo 'Tituto: '.$video->getTitulo();
                            echo '<br />';
                            echo 'Texto: '.$video->getTexto();
                            echo '<br />';
                            echo '<hr />';
                            
                        }
  
                        echo "</center>
                              </div>
                              </div>";
       
          }
          else{
              
              echo "<p>O usuário ".$admSelecionado->getNome()." ainda não possui histórico!</p>";
          }
          
          ?>
               
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
      
       
       $daoUsuario->deletar($admSelecionado->getId());
       
       echo "<script type='text/javascript'>";
    
            echo "alert('Administrador deletado com sucesso!');";
            echo "location.href='http://localhost/newbatutoriais/adm/gerenciar.php';";

       echo "</script>";
       
       
       }
       catch (Exception $erro){
           
       print($erro);  
           
       echo "<script type='text/javascript'>";
    
            echo "alert('Erro ao tentar deletar usuario!');";
            echo "location.href='http://localhost/newbatutoriais/adm/gerenciar.php';";

       echo "</script>";
           
       }
       
   } 
}

?>

