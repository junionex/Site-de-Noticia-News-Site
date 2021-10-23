<?php namespace App\Models; 
use CodeIgniter\Model; 
class CrudModel extends Model { 
 protected $table = 'usuarios'; 
 protected $primaryKey = 'id'; 
 protected $returnType = 'array'; 
 protected $allowedFields = ['nome', 'email', 'senha', 'sexo','nivel','foto','cep',
                             'rua','bairro', 'cidade','uf','numero']; 
 protected $useTimestamps = false; 
 protected $beforeInsert = ['hashPassword']; 
 protected $beforeUpdate = ['hashPassword']; 
 
 public $niveis = [NIVEL_ASSINANTE=>"Assinante",
                   NIVEL_JORNALISTA=>"Jornalista",
                   NIVEL_ADMIN=>"Admin"];

 protected function hashPassword(array $data) { 
  #se a senha nao tiver sido enviada não faz nada 
  if ($data['data']['senha'] == "") { 
  return $data; 
  } 
  #caso contrário, criptografa 
  $data['data']['senha'] = sha1($data['data']['senha']); 
  return $data; 
 }

 public function filtrar($filtros){ 
   if (v($filtros,"filtro") != ""){ 
      $this->groupStart(); 
      $this->orLike("nome",$filtros["filtro"]); 
      $this->orLike("email",$filtros["filtro"]);
      $this->orLike("cidade",$filtros["filtro"]); 
      $this->groupEnd(); 
     } 
     if (v($filtros,"nivel") != ""){ 
      $this->where("nivel",$filtros["nivel"]); 
     }
  
    return $this->paginate(5); 
   }
   
   public function findByEmail($id, $email){ 
      $this->select("nome"); 
      $this->where("email",$email); 
      $this->where("id !=",$id); 
      return $this->first(); 
     }
}
