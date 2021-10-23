<?php namespace App\Models; 
use CodeIgniter\Model; 
class UsuarioModel extends Model { 
 protected $table = 'usuarios'; 
 protected $primaryKey = 'id'; 
 protected $returnType = 'array'; 
 protected $allowedFields = ['nome', 'email', 'senha', 'sexo','nivel','foto']; 
 protected $useTimestamps = false; 

 protected $beforeInsert = ['hashPassword']; 
 protected $beforeUpdate = ['hashPassword']; 
 public $niveis = [30=>"Assinante",40=>"Jornalista",50=>"Admin"];


 protected function hashPassword(array $data) { 
  #se a senha nao tiver sido enviada não faz nada 
  if ($data['data']['senha'] == "") { 
  return $data; 
  } 
  #caso contrário, criptografa 
  $data['data']['senha'] = sha1($data['data']['senha']); 
  return $data; 
 }
    public function logar($dados){ 
  
    $senha = sha1($dados["senha"]); 
    $this->where("email",$dados["email"]); 
    $this->where("senha",$senha); 
    return $this->first(); 
    }
    public function findByEmail($id, $email){ 
        $this->select("nome"); 
        $this->where("email",$email); 
        $this->where("id !=",$id); 
        return $this->first(); 
       }
        
 
}
