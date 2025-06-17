<?php
require '../Config/Conecction.php';
require_once '../Config/AuthJWT.php';
class LoginUser{
    private $user;
    private $pass; 

    public function get_pass(){
        return $this->pass;
    }
    
    public function set_pass($pass){
        $this->pass = $pass;
    }
    
    public function get_user(){
        return $this->user;
    }
    
    public function set_user($user){        
        $this->user = $user;        
    }

    public function ValidaLogin($user,$pass){
       
        $conn= new conecctionDB;
        $conn->connection();
        $pdo = $conn->getConnection(); // Pega o objeto PDO para usar
        $sql = $pdo->prepare("select * from usuario_mercado where email=:email and senha=:senha");
        $sql->execute(['email' => $user,'senha' =>$pass]);
        $RD = $sql->fetch(PDO::FETCH_ASSOC);
        if(!empty($RD)){
            $payload =[
                "exp" => time()+10,
                "iat" => time(),
                "email" =>$RD['email']
            ];
            $authJWT = new authenticJWT;
            $token=$authJWT->AuthLoginJWT($payload);
        
            echo json_encode([
                'success' => true,            
                'user' => $RD['email']
            ]);
        }else{
            echo json_encode([
                'success' => false,            
                'msg' => 'Email ou Senha incorretos'
            ]);
        }

    }
}