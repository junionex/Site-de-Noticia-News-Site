<?php namespace App\Models; 
use CodeIgniter\Model; 

class TelefoneModel extends Model { 
 protected $table = 'telefones'; 
 protected $primaryKey = 'id'; 
 protected $returnType = 'array'; 
 protected $allowedFields = ['telefone', 'idusuario']; 
 protected $useTimestamps = false; 
 public function getFones($idUsuario){ 
    $this->where("idusuario",$idUsuario); 
    return $this->findAll(); 
   } 
   public function addFones($idUsuario, $telefones){ 
    #deleta todos os telefones 
    $this->where("idusuario",$idUsuario); 
    $this->delete(); 
    #adiciona os telefones enviados 
    foreach($telefones as $fone){ 
    if ($fone != ""){ 
    $this->save(["idusuario"=>$idUsuario,"telefone"=>$fone]);  } 
    } 
   }
   
}
