<?php 
namespace App\Libraries; 
class Validacoes { 
 public function senhaLetrasNumeros(string $str, string &$error = null): bool { 
 $hasLetter = false; 
 $hasNumber = false; 
 for($i = 0; $i < strlen($str); $i++){ 
     if (!is_numeric($str[$i])){ 
            $hasLetter = true; 
 } 
 if (is_numeric($str[$i])){ 
     $hasNumber = true; 
 } 
 } 
 if ($hasLetter && $hasNumber){ 
 return true; 
 } else { 
 return false; 
 } 
 } 
}
