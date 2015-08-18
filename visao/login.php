<?php


include_once  '../dao/DaoAdm.php';
include_once '../entidades/Adm.php';
include_once '../banco/Conexao.php';


session_start();

//VALIDAÇÃO DOS DADOS
if(isset($_POST["email"])){
    $email = $_POST["email"];
}

if(isset($_POST["senha"])){
    $senha = $_POST["senha"];
}

try{
    
$dao = new DaoAdm();
$user = $dao->buscarPorEmailSenha($email, $senha);


if($user->getId() > 0){
  
    //ENVIO DE DADOS PELA SEÇÃO
    $_SESSION['nome'] = $user->getNome();
    $_SESSION['telefone'] = $user->getTelefone(); 
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
      
    echo "<script type='text/javascript'>";
    
        echo "location.href='http://localhost/newbatutoriais/adm/principal.php';";

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


