<?php namespace App\Models; 
use CodeIgniter\Model; 
class JornalistaModel extends Model { 
 protected $table = 'noticias'; 
 protected $primaryKey = 'idNot'; 
 protected $returnType = 'array'; 
 protected $allowedFields = ['nomeAutor','tituloP', 'subtitulo','dataEnvio','tagsDesc','texto','idCategoria', 'usu']; 
 protected $useTimestamps = false; 
 protected $beforeFind = ['beforeFind'];

 public function beforeFind($obj){
    $this->select("noticias.*,categorias.nome as nomeCategoria");
    $this->join("categorias","categorias.idCategoria = noticias.idCategoria","inner");
    return  $obj;
 }
public function cadNotJornalista($filtros = null){ 
      if (v($filtros,"filtro") != ""){ 
         
         } 
         $this->where("usu", $_SESSION['user']['id']); 
    
      return $this->paginate(5); 
     }
     
   }
  
