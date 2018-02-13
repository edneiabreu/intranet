<?php
require_once "Banco.php";
class Op extends Banco {
    private $id;   /* ID da OP */
    private $id_cracha;
    private $nome;
    private $user_name;
    private $solicitado_por;
    private $situacao;
    private $json_data;
    private $quantidade;
    private $perda;    
    private $created_at;
    private $updated_at;
   
 
        
    // getters (métodos para leitura de dados das propriedades)
    public function getId(){ return $this->id; }
    public function getIdCracha(){ return $this->id_cracha; }
    public function getNome(){ return $this->nome; }
    public function getUserName(){ return $this->user_name; }
    public function getSolicitadoPor(){ return $this->solicitado_por; }
    public function getSituacao(){ return $this->situacao; }
    public function getJsonData(){ return $this->json_data; }
    public function getQuantidade(){ return $this->quantidade; }
    public function getPerda(){ return $this->perda; }    
    public function getCreatedAt(){ return $this->created_at; }
    public function getUpdatedAt(){ return $this->updated_at; }

    
    // setters (métodos para atribuir dados às propriedades)
    public function setId($valorId){
        $this->id = $valorId;    
    }
    public function setIdCracha($valorIdCracha){
        $this->id_cracha = $valorIdCracha;    
    }    
    public function setNome($valorNome){    
        $this->nome = $valorNome;
    }
    public function setUserName($valorUserName){
        $this->user_name = $valorUserName;    
    }
    public function setSolicitadoPor($valorSolicitadoPor){
        $this->solicitado_por = $valorSolicitadoPor;    
    }   
    public function setSituacao($valorSituacao){
        $this->situacao = $valorSituacao;
    } 
    public function setJsonData($valorJsonData){
        $this->json_data = $valorJsonData;
    } 
    public function setQuantidade($valorQuantidade){
        $this->quantidade = $valorQuantidade;
    } 
    public function setPerda($valorPerda){
        $this->perda = $valorPerda;
    } 
    public function setCreatedAt($valorCreatedAt){
        $this->created_at = $valorCreatedAt;
    } 
    public function setUpdatedAt($valorUpdatedAt){
        $this->updated_at = $valorUpdatedAt;
    } 
    
    /* Métodos CRUD */
    public function lerClientes(){
        $sql = "SELECT * FROM clientes ORDER BY nome";
        return parent::executaQuery($sql);
    } // fim lerClientes
    
    
    
    public function inserirOp(){
        $sql = "INSERT INTO producoes (id_cracha, nome, user_name, solicitado_por, situacao, json_data, quantidade, perda, created_at, updated_at) VALUES('{$this->id_cracha}', '{$this->nome}', '{$this->user_name}','{$this->solicitado_por}', '{$this->situacao}', '{$this->json_data}', '{$this->quantidade}', '{$this->perda}', NOW(), NOW() )";
        return parent::executaQuery($sql);
    } // fim inserir OP
    
    
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