<?php require '../template/topoadm.php'; 

include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';

$daoUsuario = new DaoAdm();

$listaUsuarios = $daoUsuario->buscarTodos();

?>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        <div class="jumbotron" style=" background: white;">
            <center>
                <h3><label>Gerenciar</label></h3>
                <br />
                <br />
            </center>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
    <?php 

    
    foreach ($listaUsuarios as $usuario) {
        echo '<tr>';
            echo '<td>';
                echo  $usuario->getNome();
            echo '</td>';
            echo '<td>';
            echo "<div class='btn-group'>";
                echo   '<a href="dados.php?id='.$usuario->getId().'" class="btn btn-info btn-sm"  >';
                echo   '<span class="glyphicon glyphicon-search"></span>';                
                echo   '</a>';
            echo "</div>";
            echo '</td>';
        echo '</tr>';
    }
    
    ?>
    </tbody>
  </table>
                 
            
<!-- Modal de visualiziação  -->
<div id="modalVisualizar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Nome:</b><?php echo "Nome" ?></h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white;">
          <fieldset>
              <legend>Dados</legend>

                <label><b>Email:</b></label>
                <label style="color: graytext;"><?php echo "Email" ?></label><br />
                <label><b>Telefone:</b></label>
                <label style="color: graytext;"> <?php echo "Telefone" ?></label><br />
              
          </fieldset>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            
            <!-- LINK PARA VOLTAR -->        
             <a href="principal.php" title="Voltar para a pagina incial" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    left:30px;" >Voltar</a>
            
        </div>
    </div>  
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
</div>  

<?php require '../template/rodape.php'; ?>

