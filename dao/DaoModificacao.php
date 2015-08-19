<?php


class DaoModificacao{
    
    private $pdo;
            
    function  DaoModificacao(){
        
        $this->pdo = new Conexao();
        $this->pdo = $this->pdo->getPdo();
        
    }
    
    
    public function getNextID(){
        try{
            
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='modificacao'";
            $result = $this->pdo->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC); 
            return $final_result['Auto_increment'];
         
        }  catch (Exception $e){
           
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
       
        }
    }


    public function inserir(Modificacao $modi){
        try{
            
            $sql = "INSERT INTO modificacao("
                    . "titutlo,"
                    . "texto,"
                    . "video,"
                    . "tipo,"
                    . "html,"
                    . "idAdm"
                    . ") VALUES ("
                    . ":titutlo,"
                    . ":texto,"
                    . ":video,"
                    . ":tipo"
                    . ":html"
                    . ":idAdm";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":titutlo", $modi->getTitulo());
            $p_sql -> bindValue(":texto", $modi->getTexto());
            $p_sql -> bindValue(":video", $modi->getVideo());
            $p_sql -> bindValue(":tipo", $modi->getTipo());
            $p_sql -> bindValue(":html", $modi->getHtml());
            $p_sql -> bindValue(":idAdm", $modi->getIdAdm());
          
            
            return $p_sql->execute();
         
            
        }  
        catch (Exception $e){
            
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. " .$e; 

        }
        
    }
    
    public function atualizar(Modificacao $modi) { 
        try { 
            $sql = "UPDATE modificacao SET titulo = :titulo, texto = :texto, video = :video, tipo = :tipo WHERE id = :id"; 
            $p_sql = $this->pdo->prepare($sql); 
            $p_sql -> bindValue(":titutlo", $modi->getTitulo());
            $p_sql -> bindValue(":texto", $modi->getTexto());
            $p_sql -> bindValue(":video", $modi->getVideo());
            $p_sql -> bindValue(":tipo", $modi->getTipo());
            $p_sql->bindValue(":id", $modi->getId()); 
            return $p_sql->execute(); 
            
        } catch (Exception $e) { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }


  
    
    public function deletar($id){
        
        try{
            
            $sql = "DELETE FROM modificacao WHERE id = :id";
            $p_sql  = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            
            return $p_sql->execute();
     
        }
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
    }
    

    
     public function buscarPorId($id){
        
           try{
            
            $sql = "SELECT * FROM modificacao WHERE id = :id";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            $p_sql->execute();
            
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
    
     }  
     
      public function buscarPorTitulo($titulo){
        
           try{
            
            $sql = "SELECT * FROM modificacao WHERE titulo = :titulo";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":titulo", $titulo);
            $p_sql->execute();
            
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
    
     } 
     
    
    public function buscarTodos(){
        
           try{
            
            $sql = "SELECT * FROM modificacao ORDER BY titulo";
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
    
    private function populaModificacao($row){
        
        $modi = new Modificacao();
        $modi ->setId($row['id']);
        $modi ->setTitulo($row['titulo']);
        $modi ->setTexto($row['texto']);
        $modi ->setTipo($row['tipo']);
        $modi ->setVideo($row['video']);
        $modi ->setHtml($row['html']);
        $modi ->setIdAdm($row['idAdm']);

        
        return $modi;
    }
    
    
}
