<!-- INCLUSÃO DO CABEÇALHO -->
<?php require_once "inc/cabecalho.php";?>
     

     

     <body>
        <header class="o-header">
            <div>
                <p><a href="index.php">home</a> | <a href="producao-dashboard.php">produção</a> > <a href="producao-op-direta.php">op direta</a>  </p>
            </div>
            
        </header>

<!-- INCLUSÃO DO MENU LATERAL -->        
<?php require_once "inc/menuLateral.php";?>

        <main class="o-main">
            <h3>OP DIRETA - WEBCRACHÁ </h3>
            <p>Inclua OPs no sistema de WebCrachá por aqui.</p>

           <form action="" method="post" id="insereOp" name="insereOp">
       
              
              
              <!-- SELEÇÃO DE CLIENTE -->
              <a href="selecione-cliente.php" target="_top">Listagem de Clientes</a><br>
              
              
                <input list="clientes" name="clientes" size="60" >
                  <datalist id="clientes">
                <!-- POPULAR SELECÃO DE CLIENTE -->                      <?php
                        require_once "class/Cliente.php";
                        $clientes = new Cliente();
                        $resultado = $clientes->lerClientes();             
                        while( $dados = mysqli_fetch_assoc($resultado) ){
                    ?>
                           <option value="<?=$dados['nome']?>">

                    <?php
                    }
                    ?>    
                  </datalist>
                  <p>Nome Arte: <input type="text" size="30" id="nome" name="nome" > </p>
                  <p>IdArte: <input type="text" size="30" id="id_cracha" name="id_cracha" > </p>
                  <p>Data de Hoje: <?php                
                    echo $data = date("d/m/Y"); 
                      ?> </p>
                <p>Previsão de Saída: <input type="date" value=""> </p> 
                <p>Quantidade de Crachás: <input type="text" size="5" maxlength="5" name="quantidade" id="quantidade" > uni</p>
                <p>Observação: <br> <textarea rows="4" cols="60">
                </textarea></p>                
                
                <p>Solicitante:
               <input list="user_name" name="user_name" size="20">
                  <datalist id="user_name">
                           <option value="Ednei">    
                           <option value="Pamella">    
                           <option value="Caline">    
                           <option value="Whashington">    
                           <option value="Luana">    
                           <option value="Elisangela">  

                  </datalist>       </p>      

<hr>               
               <input type="submit" name="enviar" value="Enviar" id="enviar" >
               <input type="submit" name="limpar" value="Limpar" >               
               
           </form>
           
           
<?php
if( isset($_POST['enviar']) ){
    

        require_once "class/Op.php";
    
        // Criação do objeto
        $op = new Op();
        
        // Setar/Colocar no objeto os valores dos campos do formulário
        $op->setIdCracha($_POST['id_cracha']);
        $op->setNome($_POST['nome']);
        $op->setUserName($_POST['user_name']);
        $op->setSolicitadoPor("Sistema");
        $op->setSituacao("Aberto");
        $op->setJsonData("");
        $op->setQuantidade($_POST['quantidade']);
        $op->setPerda("0");
/*        $op->setCreatedAt($_POST['created_at']);
        $op->setUpdatedAt($_POST['updated_at']);*/
    
        $op->inserirOp();
    
            echo "enviei";
            echo $_POST['id_cracha'];
            
    } else { // Caso os campos não estejam vazios, faça:

        


        
  
        

        
        // Invocar/Chamar o método responsável por inserir

        

               
    };
           
?>                       
           

           

           
           
            
        </main>  <!--FIM DA AREA PRINCIPAL MAIN GRID LAYOUT-->
        
<!-- INCLUSÃO DO RODAPE -->    
<?php require_once "inc/rodape.php";?>