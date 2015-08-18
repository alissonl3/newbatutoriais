<?php


class DaoAdm{
    
    private $pdo;
            
    function  DaoAdm(){
        
        $this->pdo = new Conexao();
        $this->pdo = $this->pdo->getPdo();
        
    }
    
    
    public function getNextID(){
        try{
            
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='adm'";
            $result = $this->pdo->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC); 
            return $final_result['Auto_increment'];
         
        }  catch (Exception $e){
           
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
       
        }
    }


    public function inserir(Adm $adm){
        try{
            
            $sql = "INSERT INTO adm("
                    . "nome,"
                    . "email,"
                    . "telefone,"
                    . "senha"                  
                    . ") VALUES ("
                    . ":nome,"
                    . ":email,"
                    . ":telefone,"
                    . ":senha)";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":nome", $adm->getNome());
            $p_sql -> bindValue(":email", $adm->getEmail());
            $p_sql -> bindValue(":telefone", $adm->getTelefone());
            $p_sql -> bindValue(":senha", $adm->getSenha());
          
            
            return $p_sql->execute();
         
            
        }  
        catch (Exception $e){
            
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. " .$e; 

        }
        
    }
    
    public function editarComSenha(Adm $adm) { 
        try { 
            $sql = "UPDATE adm SET nome = :nome, email = :email, telefone = :telefone, senha = :senha WHERE id = :id"; 
            $p_sql = $this->pdo->prepare($sql); 
            $p_sql->bindValue(":nome", $adm->getNome()); 
            $p_sql->bindValue(":email", $adm->getEmail()); 
            $p_sql->bindValue(":senha", $adm->getSenha()); 
            $p_sql->bindValue(":telefone", $adm->getTelefone()); 
            $p_sql->bindValue(":id", $adm->getId()); 
            return $p_sql->execute(); 
            
        } catch (Exception $e) { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }

    public function alterarSenha($id, $senha_antiga, $senha_nova) { 
        try { 
            $adm = $this->BuscarPorCOD($id); 
            if ($adm->getSenha() == md5(trim(strtolower($senha_antiga)))) { 
                $sql = "UPDATE adm set senha = :senha_nova WHERE id = :id and senha = :senha_antiga"; 
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

    
    public function atualizar(Adm $adm){
        
        try{
            
            $sql = "UPDATE adm SET "
                    . "nome = :nome,"
                    . "email = :email,"
                    . "telefone = :telefone,"
                    . "senha = :senha "
                    . "WHERE id = :id";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":id", $adm->getId());
            $p_sql -> bindValue(":nome", $adm->getNome());
            $p_sql -> bindValue(":email", $adm->getEmail());
            $p_sql -> bindValue(":telefone", $adm->getTelefone());
            $p_sql -> bindValue(":senha", $adm->getSenha());

            
            return $p_sql->execute();
            
            
        }
 catch (Exception $e){
     
      print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
    
   
 }
        
    }
    
    
    public function deletar($id){
        
        try{
            
            $sql = "DELETE FROM adm WHERE id = :id";
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
            
            $sql = "UPDATE adm SET senha = :senha_nova WHERE id = :id"; 
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
            
            $sql = "SELECT * FROM adm WHERE email = :email AND senha = :senha";
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
            
            $sql = "SELECT * FROM adm WHERE email = :email AND senha = :senha";
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
            
            $sql = "SELECT * FROM adm WHERE id = :id";
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
            
            $sql = "SELECT * FROM adm ORDER BY nome";
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
        $adm = new Adm();
        $adm ->setId($row['id']);
        $adm ->setNome($row['nome']);
        $adm ->setEmail($row['email']);
        $adm ->setSenha($row['senha']);
        $adm ->setTelefone($row['telefone']);

        
        return $adm;
    }
    
    
}
