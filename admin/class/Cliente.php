<?php
require_once "Banco.php";
class Cliente extends Banco {
    private $id;
    private $codigo;
    private $nome;
    private $ficha;
    private $fantasia;
    private $cnpj;
    private $status;
    private $created_at;
    private $updated_at;
   
 
        
    // getters (métodos para leitura de dados das propriedades)
    public function getId(){ return $this->id; }
    public function getCodigo(){ return $this->codigo; }
    public function getNome(){ return $this->nome; }
    public function getFicha(){ return $this->ficha; }
    public function getFantasia(){ return $this->fantasia; }
    public function getCnpj(){ return $this->cnpj; }
    public function getStatus(){ return $this->status; }
    public function getCreatedAt(){ return $this->created_at; }
    public function getUpdatedAt(){ return $this->updated_at; }

    
    // setters (métodos para atribuir dados às propriedades)
    public function setId($valorId){
        $this->id = (int)$valorId;    
    }
    public function setCodigo($valorCodigo){
        $this->codigo = (int)$valorCodigo;    
    }    
    public function setNome($valorNome){    
        $this->nome = mysqli_real_escape_string($this->conexao, $valorNome);
    }
    public function setFicha($valorFicha){
        $this->ficha = mysqli_real_escape_string($this->conexao, $valorFicha);    
    }
    public function setFantasia($valorFantasia){
        $this->fantasia = mysqli_real_escape_string($this->conexao, $valorFantasia);    
    }   
    public function setCnpj($valorCnpj){
        $this->cnpj = mysqli_real_escape_string($this->conexao, $valorCnpj);
    } 
    public function setStatus($valorStatus){
        $this->status = mysqli_real_escape_string($this->conexao, $valorStatus);
    } 
    public function setCreatedAt($valorCreatedAt){
        $this->created_at = mysqli_real_escape_string($this->conexao, $valorCreatedAt);
    } 
    public function setUpdatedAt($valorUpdatedAt){
        $this->updated_at = mysqli_real_escape_string($this->conexao, $valorUpdatedAt);
    } 
    
    /* Métodos CRUD */
    public function lerClientes(){
        $sql = "SELECT * FROM clientes ORDER BY nome";
        return parent::executaQuery($sql);
    } // fim lerClientes
    
    
    
    public function inserirPost(){
        $sql = "INSERT INTO posts (titulo, texto, resumo, imagem, usuario_id)";
        $sql.= " VALUES('{$this->titulo}', '{$this->texto}', '{$this->resumo}', ";
        $sql.= "'{$this->imagem}', {$this->usuarioId})";
        return parent::executaQuery($sql);
    } // fim lerPosts
    
    public function lerUmPost(){
        $sql = "SELECT * FROM posts WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    } // fim método lerUmPost()
    
    public function atualizarPost(){
        $sql = "UPDATE posts SET titulo = '{$this->titulo}', ";
        $sql.= " texto = '{$this->texto}', resumo = '{$this->resumo}', ";
        $sql.= " imagem = '{$this->imagem}' ";
        $sql.= " WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    } // fim método atualizarPost()   
    
    
    public function excluirPost(){
        $sql = "DELETE FROM posts WHERE id = {$this->id}";
        return parent::executaQuery($sql);
    } // fim método excluirPost()    
    
    
    
    /* Métodos CRUD (SELECT) para as páginas públicas do site 
    (index.php, post-detalhe.php e search.php) */
    
    public function lerTodosPosts(){
        // $sql = "SELECT * FROM posts ORDER BY data DESC";
        
        $sql = "SELECT posts.id, posts.titulo, posts.data, posts.imagem, ";
        $sql.= " posts.resumo, usuarios.nome AS autor FROM posts ";
        $sql.= " INNER JOIN usuarios ON posts.usuario_id = usuarios.id ";
        $sql.= " ORDER BY data DESC";
        
        return parent::executaQuery($sql);        
    } // fim método lerTodosPosts
    
    public function lerUmPostEmDetalhe(){
        $sql = "SELECT posts.id, posts.titulo, posts.data, posts.imagem, ";
        $sql.= " posts.texto, usuarios.nome AS autor FROM posts";
        $sql.= " INNER JOIN usuarios ";
        $sql.= " ON posts.usuario_id = usuarios.id ";
        $sql.= " WHERE posts.id = {$this->id}";
        return parent::executaQuery($sql);
    } // fim método lerUmPostEmDetalhe
    
    public function busca(){
        $sql = "SELECT * FROM posts WHERE titulo LIKE '%{$this->termo}%' ";
        $sql.= " OR texto LIKE '%{$this->termo}%' ORDER BY data DESC";
        return parent::executaQuery($sql);
    } // fim método busca
    
    
    
    /* Utilitários */
    public function formataData( $data ){
        return date("d/m/Y H:i", strtotime($data));    
    } // fim método formataData
    
    public function formataTextos( $valorTexto ){        
        return str_replace("\n", "</p><p>", "<p>$valorTexto</p>");
    } // fim método formataTextos
    
    
    /* Método responsável por verificar se uma imagem foi enviada,
    e extrair do arquivo de imagem informações como: nome do arquivo, 
    extensão, gerar um nome provisório, verificações de segurança etc */
    public function upload($dadosImagem) {
        /* Se o nome da imagem (vindo do array FILES) for diferente de vazio... */
        if($dadosImagem["name"] != ""){
            /* Então faça: */
            
            // Configurações para o upload da imagem
            $this->imagem = $dadosImagem["name"]; // pega o nome e a extensão da imagem
            $nomeTemporario = $dadosImagem['tmp_name'];	// pega o nome temporário 
            
            // Obtendo SOMENTE a extensão
            $tipoDeArquivo = strtolower( pathinfo($this->imagem, PATHINFO_EXTENSION) ); 
            
            // Definição do diretório/pasta de destino já com o caminho para o nome/extensão      
            $pasta = "../img/{$this->imagem}"; 
        
            // Avaliando se é uma extensão de imagem válida
            switch($tipoDeArquivo){
                // Caso seja qualquer uma dessas abaixo...
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                case 'svg':
                    // ... então mova o arquivo do diretorio temp do servidor para o destino
                    move_uploaded_file($nomeTemporario, $pasta); 
                    
                    // e retorne a operação como true (houve upload e deu tudo certo)
                    return true;
                break;

                // Caso seja qualquer outra extensão...
                default:
                    // ...então atribua uma string vazia para a propriedade imagem
                    $this->imagem = "";
                    
                    // e retorne false (não houve upload e vai gerar um erro)
                    return false;
                break;
            }           
        /* Senão... */
        } else {
            // ... atribua uma string vazia para a propriedade imagem
            $this->imagem = "";
            
            // e retorne a operação como true (não houve upload, mas deu tudo certo!)
            return true;
        }
    } // fim método upload
}