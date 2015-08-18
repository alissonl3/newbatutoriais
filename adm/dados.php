<?php require '../template/topoadm.php'; 

include_once  '../dao/DaoAdm.php';
include_once '../entidades/Adm.php';
include_once '../banco/Conexao.php';


$daoUsuario = new DaoUsuario();


if(isset($_GET['id'])){
    $idSelecionado = $_GET['id'];
}

$usuarioSelecionado = $daoUsuario->buscarPorId($idSelecionado);

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
                     <label>Nome: <?php echo $usuarioSelecionado->getNome() ?> </label><br />
                     <label>Email: <?php echo $usuarioSelecionado->getEmail() ?> </label><br />
                     <label>Telefone: <?php echo $usuarioSelecionado->getTelefone() ?> </label><br />
                
                <center>
                 <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalDeletar">
                        <span class="glyphicon glyphicon-trash"></span>               
                        Deletar                       
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
              <label>Tem certeza que deseja excluir <?php echo $usuarioSelecionado->getNome() ?>?</label>
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
<div id="modalFormulario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulário</h4>
      </div>
      <div class="modal-body">
        
          <?php 
          
          if($verificacaoFormulario === true){
              
              echo " <fieldset>
                    <legend>Dados pessoais</legend>
                    <label>1 - Ano de Conclusão:</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getAnoConclusao() ." </label><br />" 
                    ."<label>2 - Sementre:</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getSemestre() ." </label><br />" 
                   ."</fieldset>"
                   ."<hr />";
              
              echo " <fieldset>
                    <legend>Informações sobre o curso</legend>
                    <label>1 - Qual o curso que você fez?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC1() ."</label><br />"  
                    ."<label>2 - Qual foi o tipo de curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC2() ."</label><br />"
                    ."<label>3 - O que achou do curso que fez?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC3() ."</label><br />"
                    ."<label>4 - A duração do curso foi suficiente?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC4() ."</label><br />"  
                    ."<label>5 - Como foi a parte teórica do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC5() ."</label><br />"  
                    ."<label>6 - Como foi a parte prática do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC6() ."</label><br />"
                    ."<label>7 - Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC7() ."</label><br />"  
                    ."<label>8 - Como você avalia o nivel de exigência do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC8() ."</label><br />"  
                    ."<label>9 - Qual foi a principal contribuição do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC9() ."</label><br />"  
                    ."<label>10 - Quais foram suas principais dificuldades logo após a conclusÃ£o do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC10() ."</label><br />"                  
                    ."</fieldset>"
                    ."<hr />";
              
              echo " <fieldset>
                    <legend>Informações sobre o corpo docente</legend>
                    <label>1 - De modo geral, os professores tinham domínio do conteúdo das disciplinas que deram?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID1() ." </label><br />" 
                    ."<label>2 - De modo geral, como foram os recursos utilizados pelos professores durante as aulas?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID2() ." </label><br />"
                    ."<label>3 - De Modo geral, como foi a relação do professor com os alunos?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID3() ." </label><br />"                    
                   ."</fieldset>"
                   ."<hr />";
              
              $painel = "";
              
              if($formularioSelecionado->getIP3() != null && ($formularioSelecionado->getIP3() != "Não"
                 && $formularioSelecionado->getIP3() != "não" && $formularioSelecionado->getIP3() != "NÃO"
                 && $formularioSelecionado->getIP3() != "nao" && $formularioSelecionado->getIP3() != "Nao" && $formularioSelecionado->getIP3() != "NAO"  )      ){
                  $painel = ""
                  ."<label>A - Qual o seu grau de satisfação com a sua atividade profissional?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3A() ." </label><br />"   
                  ."<label>B - Você egresso recém-formado, atende às necessidades da empresa para a qual você trabalha?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3B() ." </label><br />"
                  ."<label>C - Qual das habilidades abaixo está sendo mais exigida em seu exercício profissional?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3C() ." </label><br />"
                  ."<label> D - Qual a sua faixa salarial?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3D() ." </label><br />"
                      ;
              }else{
                  $painel = ""; 
              }
             
              echo "<fieldset>
                    <legend>Informações pessoais</legend>
                    <label>1 - Você já tinha uma profissão antes de fazer o curso? Se sim, onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP1() ." </label><br />" 
                    ."<label>2 - Você estava trabalhando na área durante o curso? Se sim, onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP2() ." </label><br />"
                    ."<label>3 - Você está trabalhando na área atualmente? Se sim, em que/onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3() ." </label><br />"                    
                    .$painel
                    ."</fieldset>"
                   ."<hr />";
              
              
              echo " <fieldset>
                    <legend>Informações adicionais</legend>
                     <label>1 - Na sua opinião um estudante recêm-formado em sua área que tenha dedicado todo o tempo de estudo somente às atividades acadêmicas, leva mais tempo para se adaptar ao mercado do que um outro que já trabalhava na área durante o dia e estudava a noite?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA1() ."</label><br />"  
                    ."<label>2 - Na contratação de um egresso de sua área, o que é relevante no processo de seleção?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA2() ."</label><br />"
                    ."<label>3 - O que tem faltado aos recêm-formados em sua área?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA3() ."</label><br />"
                    ."<label>4 - Em sua opinião, quanto tempo leva um egresso, recêm-formado em sua area, para tornar-se altamente produtivo, após ser contratado por sua empresa?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA4() ."</label><br />"  
                    ."<label>5 - Você voltaria a estudar no IFPR para fazer outros cursos?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA5() ."</label><br />"  
                    ."<label>6 - Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA6() ."</label><br />"
                    ."<label> Sugestões (se houver):</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getSugestao() ."</label><br />"
                    ."</fieldset>"
                    ."<hr />";
              
              
          }
          else{
              
              echo "<p>O usuário ".$usuarioSelecionado->getNome()." ainda não respondeu o formulário</p>";
          }
          
          ?>
               
          
          
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            
            <!-- LINK PARA VOLTAR -->        
            <a href="gerenciar.php" title="Voltar para a pagina incial" class="btn btn-sm btn-info" style="
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
       //verificar existencia do formulario
       if($usuarioSelecionado->getIdFormulario() != null && $usuarioSelecionado->getIdFormulario() != 0){
           
           $idForm = $usuarioSelecionado->getIdFormulario();   
       }
       
       $daoUsuario->deletar($usuarioSelecionado->getId());
       
       if($idForm != null && $idForm != 0){
              
           $daoFormulario->deletar($usuarioSelecionado->getIdFormulario());
       }
       
       echo "<script type='text/javascript'>";
    
            echo "alert('Usuario deletado com sucesso!');";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php';";

       echo "</script>";
       
       
       }
       catch (Exception $erro){
           
       print($erro);  
           
       echo "<script type='text/javascript'>";
    
            echo "alert('Erro ao tentar deletar usuario!');";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php';";

       echo "</script>";
           
       }
       
   } 
}

?>

