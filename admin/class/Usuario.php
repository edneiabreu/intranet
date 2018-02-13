<?php
require_once "Banco.php";
class Usuario extends Banco {
    private $id;
    private $nome;
    private $email;
    private $senha;

    /* Getters */
    public function getId(){ return $this->id; }
    public function getNome(){ return $this->nome; }
    public function getEmail(){ return $this->email; }
    public function getSenha(){ return $this->senha; }
    
    /* Setters */
    public function setId($valorId){
        $this->id = (int)$valorId;
    }
    public function setNome($valorNome){
        $this->nome = mysqli_real_escape_string($this->conexao, $valorNome);
    }
    public function setEmail($valorEmail){
        $this->email = mysqli_real_escape_string($this->conexao, $valorEmail);
    }
    public function setSenha($valorSenha){
        $this->senha = mysqli_real_escape_string($this->conexao, $valorSenha);
    }
    
    
    
    /* Métodos para o CRUD referente à tabela de usuários */
    public function lerUsuarios(){
        $sql = "SELECT * FROM usuarios ORDER BY nome";
        return parent::executaQuery($sql);
    } // fim lerUsuarios
    
    public function inserirUsuario(){
        $sql = "INSERT INTO usuarios (nome, email, senha) ";
        $sql.= " VALUES('{$this->nome}', '{$this->email}', '{$this->senha}')";
        return parent::executaQuery($sql);
    } // fim inserirUsuario
    
    public function excluirUsuario(){
        $sql = "DELETE FROM usuarios WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    } // fim excluirUsuario
    
    public function lerUmUsuario(){
        $sql = "SELECT * FROM usuarios WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    } // fim lerUmUsuario
    
    public function atualizarUsuario(){
        $sql = "UPDATE usuarios SET nome = '{$this->nome}', email = '{$this->email}', ";
        $sql.= "senha = '{$this->senha}' WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    } // fim atualizarUsuario
    
    public function buscaUsuario(){
        $sql = "SELECT * FROM usuarios ";
        $sql.= "WHERE email = '{$this->email}' AND senha = '{$this->senha}'";
        return parent::executaQuery($sql);
    } // fim buscaUsuario
    
    
    
    
    /* Métodos utilitários */
    public function codificaSenha($valorSenha){
        return hash("sha256", $valorSenha);
    } // fim codificaSenha
    
    public function verificaSenha($senhaNoFormulario, $senhaNoBanco){
        /* Se a senha digitada no formulário for IGUAL
        a senha já existente no banco */
        if( $senhaNoFormulario == $senhaNoBanco ){
            return $senhaNoBanco;
        } else {
            /* senão, codifique a senha nova (a que foi digitada) */
            return $this->codificaSenha($senhaNoFormulario);
        }
    } // fim verificaSenha
    
    
}