<?php
 
class Modificacao{
    
    function Modificacao(){}
    
    private $id;
    private $titulo;
    private $texto;
    private $video;
    private $tipo;
    private $html;
    private $idAdm;
    
    public function getId() { return $this->id; } 
    public function setId($id) { $this->id = $id; }
    
    public function getTitulo() { return $this->titulo; } 
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    
    public function getTexto() { return $this->texto; } 
    public function setTexto($texto) { $this->texto = $texto; }
    
    public function getVideo() { return $this->video; } 
    public function setVideo($video) { $this->video = $video; }
    
    public function getTipo(){ return $this->tipo; } 
    public function setTipo($tipo) { $this->tipo = $tipo; }
    
    public function getHtml(){ return $this->html; } 
    public function setHtml($html) { $this->html = $html; }
    
    public function getIdAdm(){ return $this->idAdm; } 
    public function setIdAdm($idAdm) { $this->idAdm = $idAdm; }
   

}

