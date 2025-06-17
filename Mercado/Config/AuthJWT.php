<?php

require_once __DIR__ . '/vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__,1));
$dotenv->load();

class authenticJWT {
    private $encode;

    public function AuthLoginJWT($payload){
        $this->encode =JWT::encode($payload,$_ENV['KEY'],'HS256');
        setcookie(
            'token',              // nome do cookie
            $this->encode,                 // valor do token JWT
            time() + 10,        // expira em 1 hora
            '/',                  // path válido
            '',                   // domínio (deixa vazio para padrão)
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',  // secure (HTTPS)
            true                  // httponly (não acessível via JS)
        );
        return json_encode($this->encode);

    }

    public function ValidaTokenJWT($payload){
       try {
           $decode = JWT::decode($payload, new Key($_ENV['KEY'], 'HS256'));
            return [
                'success' => true,
                'data' => $decode
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Token inválido ou expirado'
            ];
        }

    }

}