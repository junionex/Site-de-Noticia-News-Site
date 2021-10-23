<?php namespace App\Models; 
use CodeIgniter\Model; 
class NoticiaModel extends Model { 
 protected $table = 'noticias'; 
 protected $primaryKey = 'idNot'; 
 protected $returnType = 'array'; 
 protected $allowedFields = ['nomeAutor','tituloP', 'subtitulo','dataEnvio','tagsDesc','texto','idCategoria','publicar','publico']; 
 protected $useTimestamps = false; 
 protected $beforeFind = ['beforeFind'];

 
 public function beforeFind($obj){
    $this->select("noticias.*,categorias.nome as nomeCategoria");
    $this->join("categorias","categorias.idCategoria = noticias.idCategoria","inner");
    return  $obj;
 }
 public function filtrar($filtros){ 
    if (v($filtros,"filtro") != ""){ 
        $this->groupStart(); 
        $this->orLike("nomeAutor",$filtros["filtro"]); 
        $this->orLike("categoria",$filtros["filtro"]); 
        $this->groupEnd(); 
       } 
    return $this->paginate(4); 
   }
   
   public function noticiasPublicadas(){
         $this->where("publicar",1); 
         $this->orderBy('dataEnvio', 'desc');
      return $this->paginate(4); 
     }

     
   public function buscarTodasANoticiaPorCategoria($filtros = null){
      if (v($filtros,"filtro") != ""){ 
         
      }
         $this->where('noticias.idCategoria',$filtros);
         $this->where("publicar",1); 
         
         return $this->paginate(4); 
   }
     
         #filtro do assinante
   public function noticiasPublicadasA(){ 
        
         $this->where("publicar",1);  
        
      return $this->paginate(4); 
     }
   
     
   public function noticiasPublicadasP(){ 

         $this->where("publicar",1); 
         $this->where("publico",20); 
         
         
      return $this->paginate(4); 
     }
   }
