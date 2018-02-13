<?php
class ControleDeAcesso {
    public function __construct(){
        // Iniciando uma sessão PHP
        session_start();
    }
    
    public function login($id, $nome, $email){
        /* Ao receber os dados do usuário encontrado no banco,
        são criadas VARIÁVEIS DE SESSÃO */
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
    } // fim login
    
    public function logout(){
        session_start();
        session_destroy();
        header("location:../login.php?logout");
        exit;
    } // fim logout
    
    public function verificaPermissao(){
        /* Se NÃO HOUVER uma variável de sessão (neste caso id),
        significa que NÃO HOUVE um processo de login com sucesso */
        if( !isset($_SESSION['id']) ){
            /* Então, garanta que não existe nenhuma sessão */
            session_destroy();
            
            /* Faça o usuário voltar para a página de login.php */
            header("location:../login.php?acesso_proibido");
            
            /* Pare qualquer outra execução de código */
            exit; // talvez seja o die();
        } else {
            /* Senão, simplesmente sinalize que deu tudo certo */
            return true;
        }
        
    } // fim verificaPermissao
}