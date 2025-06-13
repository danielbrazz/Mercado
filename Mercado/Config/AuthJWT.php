<?php
require __DIR__ . '/vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__,1));
$dotenv->load();

class authenticJWT {
    private $encode;

    public function AuthLoginJWT($payload){
        $this->encode =JWT::encode($payload,$_ENV['KEY'],'HS256');
       
        return json_encode($this->encode);

    }
}