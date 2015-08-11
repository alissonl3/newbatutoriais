<?php

//include_once '../banco/Conexao.php';


class DaoAdm{
    
    private $pdo;
            
    function  DaoAdm(){
        
        $this->pdo = new Conexao();
        $this->pdo = $this->pdo->getPdo();
        
    }
    
    
    public function getNextID(){
        try{
            
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='usuario'";
            $result = $this->pdo->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC); 
            return $final_result['Auto_increment'];
         
        }  catch (Exception $e){
           
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
       
        }
    }


    public function inserir(Adm $usuario){
        try{
            
            $sql = "INSERT INTO usuario("
                    . "nome,"
                    . "email,"
                    . "telefone,"
                    . "senha,"
                    . "emailEnviado,"
                    . "respondeu,"
                    . "dataEnvio,"
                    . "idFormulario"                    
                    . ") VALUES ("
                    . ":nome,"
                    . ":email,"
                    . ":telefone,"
                    . ":senha,"
                    . ":emailEnviado,"
                    . ":respondeu,"
                    . ":dataEnvio,"
                    . ":idFormulario)";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":nome", $usuario->getNome());
            $p_sql -> bindValue(":email", $usuario->getEmail());
            $p_sql -> bindValue(":telefone", $usuario->getTelefone());
            $p_sql -> bindValue(":senha", $usuario->getSenha());
            $p_sql -> bindValue(":emailEnviado", $usuario->getEmailEnviado());
            $p_sql -> bindValue(":respondeu", $usuario->getRespondeu());
            $p_sql -> bindValue(":dataEnvio", $usuario->getDataEnvio());
            $p_sql -> bindValue(":idFormulario", $usuario->getIdFormulario());
            
            return $p_sql->execute();
         
            
        }  
        catch (Exception $e){
            
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. " .$e; 

        }
        
    }
    
    public function editarComSenha(Adm $usuario) { 
        try { 
            $sql = "UPDATE usuario SET nome = :nome, email = :email, emailEnviado = :emailEnviado, respondeu = :respondeu, telefone = :telefone, senha = :senha, dataEnvio = :dataEnvio, idFormulario = :idFormulario WHERE id = :id"; 
            $p_sql = $this->pdo->prepare($sql); 
            $p_sql->bindValue(":nome", $usuario->getNome()); 
            $p_sql->bindValue(":email", $usuario->getEmail()); 
            $p_sql->bindValue(":idFormulario", $usuario->getIdFormulario()); 
            $p_sql->bindValue(":senha", $usuario->getSenha()); 
            $p_sql->bindValue(":telefone", $usuario->getTelefone()); 
            $p_sql->bindValue(":id", $usuario->getId()); 
            $p_sql->bindValue(":emailEnviado", $usuario->getEmailEnviado()); 
            $p_sql->bindValue(":dataEnvio", $usuario->getDataEnvio());
            $p_sql->bindValue(":respondeu", $usuario->getRespondeu());  
            return $p_sql->execute(); 
            
        } catch (Exception $e) { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }

    public function alterarSenha($id, $senha_antiga, $senha_nova) { 
        try { 
            $user = $this->BuscarPorCOD($id); 
            if ($user->getSenha() == md5(trim(strtolower($senha_antiga)))) { 
                $sql = "UPDATE usuario set senha = :senha_nova WHERE id = :id and senha = :senha_antiga"; 
                $p_sql = $this->pdo->prepare($sql); 
                $p_sql->bindValue(":senha_nova", md5(trim(strtolower($senha_nova)))); 
                $p_sql->bindValue(":senha_antiga", md5(trim(strtolower($senha_antiga)))); 
                $p_sql->bindValue(":id", $id);
                return $p_sql->execute(); 
                
            } else 
                
                return false; 
            
            }
            catch (Exception $e) {
                
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
                
            } 
            
            }

    
    public function atualizar(Adm $usuario){
        
        try{
            
            $sql = "UPDATE usuario SET "
                    . "nome = :nome,"
                    . "email = :email,"
                    . "telefone = :telefone,"
                    . "senha = :senha,"
                    . "respondeu = :respondeu,"
                    . "emailEnviado = :emailEnviado,"
                    . "dataEnvio = :dataEnvio,"
                    . "idFormulario = :idFormulario "
                    . "WHERE id = :id";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":id", $usuario->getId());
            $p_sql -> bindValue(":nome", $usuario->getNome());
            $p_sql -> bindValue(":email", $usuario->getEmail());
            $p_sql -> bindValue(":telefone", $usuario->getTelefone());
            $p_sql -> bindValue(":senha", $usuario->getSenha());
            $p_sql -> bindValue(":emailEnviado", $usuario->getEmailEnviado());
            $p_sql -> bindValue(":respondeu", $usuario->getRespondeu());
            $p_sql->bindValue(":dataEnvio", $usuario->getDataEnvio());
            $p_sql -> bindValue(":idFormulario", $usuario->getIdFormulario());
            
            return $p_sql->execute();
            
            
        }
 catch (Exception $e){
     
      print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
    
   
 }
        
    }
    
    
    public function deletar($id){
        
        try{
            
            $sql = "DELETE FROM usuario WHERE id = :id";
            $p_sql  = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            
            return $p_sql->execute();
     
        }
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
    }
    
    public function alterarSenhaAlreadyCripted($id, $senha_nova_md5) { 
        try {
            
            $sql = "UPDATE usuario SET senha = :senha_nova WHERE id = :id"; 
            $p_sql = $this->pdo->prepare($sql);
            $p_sql->bindValue(":senha_nova", $senha_nova_md5); 
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute(); 
            
        } 
        catch (Exception $e) 
        { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }

    public function buscarPorEmailSenha($email, $senha){
        
         try{
            
            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":email", $email);
            $p_sql -> bindValue(":senha", $senha);
            $p_sql->execute();
            
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    public function login($email, $senha){
        
         try{
            
            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":email", $email);
            $p_sql -> bindValue(":senha", $senha);
            $p_sql->execute();
    
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    
     public function buscarPorId($id){
        
           try{
            
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            $p_sql->execute();
            
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
    
     }  
     
    
    public function buscarTodos(){
        
           try{
            
            $sql = "SELECT * FROM usuario ORDER BY nome";
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaUsuario($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
         
 }
        
    }
    
    private function populaUsuario($row){
        $user = new Adm();
        $user ->setId($row['id']);
        $user ->setNome($row['nome']);
        $user ->setEmail($row['email']);
        $user ->setSenha($row['senha']);
        $user ->setTelefone($row['telefone']);
        $user ->setEmailEnviado($row['emailEnviado']);
        $user ->setRepondeu($row['respondeu']);
        $user ->setDataEnvio($row['dataEnvio']);
        $user ->setIdFormulario($row['idFormulario']);
        
        return $user;
    }
    
    
}
