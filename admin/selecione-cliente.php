<a href="producao-op-direta.php">Voltar</a>



        <main class="o-main">
            <h3>CADASTRO CLIENTES</h3>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nome do cliente.." title="Type in a name">
            <table id="myTable" >
                <thead>
                    <tr class="header">
                        <th>Código</th>
                        <th>Cliente</th>
                        <th colspan="2">Operações</th>
                    </tr>
                </thead>
                <tbody>            
<?php
require_once "class/Cliente.php";
$clientes = new Cliente();
$resultado = $clientes->lerClientes();             
while( $dados = mysqli_fetch_assoc($resultado) ){
?>
                    <tr>
                        <td> <?=$dados['codigo']?> </td>
                        <td> <?=$dados['nome']?> </td>
                        <td>
                        <a href="usuario-atualiza.php?id=<?=$dados['id']?>" class="alterar">Selecione</a></td>

                    </tr>
<?php
}
?>                    
                </tbody>
            </table>
            
            
            
        </main>  <!--FIM DA AREA PRINCIPAL MAIN GRID LAYOUT-->
        
<script>   /* https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_filter_table */
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>