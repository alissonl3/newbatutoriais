<?php


class DaoAdm{
    
    
    public function salvar($adm){
        $adm->save();
    }
    
    public function buscarPorId($id){
        $adm = Adm::find($id);    
        return $adm;
    }
    
    public function buscarPorCondicao($condicao, $tabela){
        $sql = "SELECT * FROM ".$tabela." WHERE ".$condicao;
        
    }
    
    
}