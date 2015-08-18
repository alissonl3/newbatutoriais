<?php

//require_once './activerecord/ActiveRecord.php';
// 
////CRIAR CONEXAO COM O MYSQL
// ActiveRecord\Config::initialize(function($cfg)
// {
//     $cfg->set_model_directory('.');
//     $cfg->set_connections(array(
//         'development' => 'mysql://root:@localhost:3306/newba'));
// });

class Adm extends ActiveRecord\Model{
    
    function Adm(){}
    
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $senha;
    
    public function getId() { return $this->id; } 
    public function setId($id) { $this->id = $id; }
    
    public function getNome() { return $this->nome; } 
    public function setNome($nome) { $this->nome = $nome; }
    
    public function getEmail() { return $this->email; } 
    public function setEmail($email) { $this->email = $email; }
    
    public function getTelefone() { return $this->telefone; } 
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    
    public function getSenha(){ return $this->senha; } 
    public function setSenha($senha) { $this->senha = $senha; }
   

}

