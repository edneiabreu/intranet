<?php
class Banco {
    private $servidor;
    private $usuario;
    private $senha;
    private $banco;
    protected $conexao;
    
    public function __construct(){
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "gruponmartins2";
        
        $this->conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);
        
        if( $this->conexao ){
            mysqli_set_charset($this->conexao, "utf8");
        } else {
            die("Erro ao conectar: " .mysqli_connect_error($this->conexao));
        }
    } // fim construct 
    
    
    protected function executaQuery($sql){
        $resultado = mysqli_query($this->conexao, $sql) or die(mysqli_error($this->conexao));
        return $resultado;
    } // fim executaQuery
    
    
    public function __destruct(){
        mysqli_close($this->conexao);
    } // fim destruct

}
