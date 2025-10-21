<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;

class UsuarioController extends Controller{

    public function index(){
        $this->view('layouts/header',['titulo'=>'Cadastro de Usuario']);
        $this->view ("usuario/cadastro");
    }

    public function create(){
        $nome = $_POST['nome'];
        $email = $_POST['email']; 
        $senha = $_POST['senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        if($senha!=$confirmar_senha){
            return $this->redirect(url_to('usuario/cadastrar'));
        }

        $usuario = new Usuario();
        $dados =[
            'nome'=>$nome,
            'email'=>$email,
            'senha'=>password_hash($senha, PASSWORD_DEFAULT)
        ];
        $usuario->create($dados);
        $this->redirect(url_to('./'));
    }

}