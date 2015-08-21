<?php

include_once  '../dao/DaoModificacao.php';
include_once '../entidades/Modificacao.php';
include_once '../banco/Conexao.php';


  
  

try{
  
        $url = "";
        
        $videoNovo = new Modificacao();
        $daoVideo = new DaoModificacao();
        
        if(isset($_POST['urlatual'])){
            $url = $_POST['urlatual'];
        }else{
            $url = "http://localhost/newbatutoriais/adm/principal.php";
        }
        
           if(isset($_POST['idadm'])){
             $videoNovo->setIdAdm($_POST['idadm']);
           }
           
           if(isset($_POST["titulo"])){
               $videoNovo->setTitulo($_POST["titulo"]);
           }
           
           if(isset($_POST["texto"])){
               $videoNovo->setTexto($_POST["texto"]);
           }
           
           if(isset($_POST["url"])){
               $videoNovo->setVideo($_POST["url"]);
           }
           
           if(isset($_POST["tipo"])){
               $videoNovo->setTipo($_POST["tipo"]);
           }
           
           $videoNovo->setHtml("");
      
         
      $daoVideo->inserir($videoNovo);
       
               
       echo "<script type='text/javascript'>";
    
            echo "alert('Video adicionado com sucesso!');";
            echo "location.href='".$url."';";

       echo "</script>";
       
       
       }
       catch (Exception $erro){
           
       print($erro);  
           
       echo "<script type='text/javascript'>";
    
            echo "alert('Erro ao tentar adicionar video!');";
            echo "location.href='".$url."';";

       echo "</script>";
           
       }

       




