<?php

include_once  '../dao/DaoModificacao.php';
include_once '../entidades/Modificacao.php';
include_once '../dao/DaoAdm.php';
include_once '../entidades/Adm.php';
include_once '../banco/Conexao.php';


      
try{
           
           if(isset($_POST["titulo"])){
               $videoSelecionado->setTitulo($_POST["titulo"]);
           }
           
           if(isset($_POST["texto"])){
               $videoSelecionado->setTitulo($_POST["texto"]);
           }
           
           if(isset($_POST["url"])){
               $videoSelecionado->setTitulo($_POST["url"]);
           }
           
           if(isset($_POST["tipo"])){
               $videoSelecionado->setTipo($_POST["tipo"]);
           }
      
       
       $daoModificacao->atualizar($videoSelecionado->getId());
       
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
       


