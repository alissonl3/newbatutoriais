<?php


include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';


session_start();
//VALIDAÇÃO DOS DADOS
if(isset($_POST["email"])){
    $email = $_POST["email"];
}

if(isset($_POST["senha"])){
    $senha = $_POST["senha"];
}

//USUARIO MASTER
if($email == "ifpr@edu.br" && $senha == "root"){
    
    $_SESSION['nome'] = "Moderador";
    
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    
    //VARIAVEL DE VERIFICAÇÃO DO LOGI... saber se é adm ou usuario
    $_SESSION['tipo'] = "adm";
    
     echo "<script type='text/javascript'>";
    
        echo "location.href='http://localhost/questionario/adm/principal.php';";

    echo "</script>";

}
else{

try{
    
$dao = new DaoAdm();
$user = $dao->buscarPorEmailSenha($email, $senha);


if($user->getId() > 0){
  
    //ENVIO DE DADOS PELA SEÇÃO
    $_SESSION['nome'] = $user->getNome();
    $_SESSION['id'] = $user->getId(); 
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['telefone'] = $user->getTelefone();
    $_SESSION['emailEnviado'] = $user->getEmailEnviado();
    $_SESSION['idFormulario'] = $user->getIdFormulario();
    $_SESSION['respondeu'] = $user->getRespondeu();
    $_SESSION['dataEnvio'] = $user->getDataEnvio();
    
    
    //VARIAVEL DE VERIFICAÇÃO DO LOGI... saber se é adm ou usuario
    $_SESSION['tipo'] = "user";
      
    echo "<script type='text/javascript'>";
    
        echo "location.href='http://localhost/questionario/aluno/principal.php';";

    echo "</script>";
    
   
    
}
else
 {
    
    unset ($_SESSION['email']);
    unset ($_SESSION['senha']);
     
    echo "<script type='text/javascript'>";
    
        echo "alert('Login ou senha incorretos. Tente novamente.');";
        echo "location.href='http://localhost/questionario/index.php';";

    echo "</script>";
  
    
}


} 
catch (Exception $e){
    
    print "Erro " .$e;
}

}

