<?php namespace App\Models; 
use CodeIgniter\Model; 
class CategoriaModel extends Model { 
 protected $table = 'categorias'; 
 protected $primaryKey = 'idCategoria'; 
 protected $returnType = 'array'; 
 protected $allowedFields = ['nome']; 
 protected $useTimestamps = false; 


 public function filtrar($filtros){ 
    if (v($filtros,"filtro") != ""){ 
        $this->groupStart(); 
        $this->orLike("nomeCategoria",$filtros["filtro"]); 
        $this->groupEnd(); 
       } 
       
  
    return $this->paginate(5); 
   }
   public function receberTodos($filtros){
      if (v($filtros,"filtro") != ""){ 
         $this->groupStart(); 
         $this->orLike("nomeCategoria",$filtros["filtro"]); 
         $this->groupEnd(); 
        } 
      return $this->paginate(25);
   }
}