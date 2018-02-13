<!-- INCLUSÃO DO CABEÇALHO -->
<?php require_once "inc/cabecalho.php";?>

    <body>
        <header class="o-header">
            <div>
                <p><a href="index.php">home</a> | <a href="producao-dashboard.php">produção</a> > <a href="producao-ac1000.php">ac1000</a>  </p>
            </div>
            
        </header>

<!-- INCLUSÃO DO MENU LATERAL -->        
<?php require_once "inc/menuLateral.php";?>

        <main class="o-main">
            <h3>RFID - AC 1000 </h3>
            <p>Inclua folhas de RFID - AC 1000.</p>
            <hr>
         
           <h4>Dados Fornecedor</h4>
            <p>Fornecedor:</p>
              <p>Nota/Documento:</p>
              <p>Data: / Hora:</p>
              <p>Responsável</p>
              <p>Observação</p>
               
            <hr>
            
            <h4>Entrada Dados</h4>   
<form action="" method="post" >
               
<table border="1" >
    <tr>
        <th>Seq.</th>
        <th>Binário</th>
        <th>Mestre?</th>
        <th>Erro?</th>
    </tr>
    <tr>
        <td>01</td>
        <td><input type="text" id="entrada01" name="entrada01" value="" size="60" > </td>
        <td><input type="checkbox" name="chkMestre01" ></td>
        <td><input type="checkbox" name="chkErro01" ></td>
    </tr>
    <tr>
        <td>02</td>
        <td><input type="text" id="entrada02" name="entrada02" value="" size="60"></td>
        <td><input type="checkbox" name="chkMestre02" ></td>
        <td><input type="checkbox" name="chkErro02" ></td>
    </tr>
    <tr>
        <td>03</td>
        <td> <input type="text" id="entrada03" name="entrada03" value="" size="60" ></td>
        <td><input type="checkbox" name="chkMestre03" ></td>
        <td><input type="checkbox" name="chkErro03" ></td>
    </tr>
    <tr>
        <td>04</td>
        <td> <input type="text" id="entrada04" name="entrada04" value="" size="60"></td>
        <td><input type="checkbox" name="chkMestre04" ></td>
        <td><input type="checkbox" name="chkErro04" ></td>
    </tr>
    <tr>
        <td>05</td>
        <td><input type="text" id="entrada05" name="entrada05" value="" size="60"></td>
        <td><input type="checkbox" name="chkMestre05" ></td>
        <td><input type="checkbox" name="chkErro05" ></td>
    </tr>
    <tr>
        <td>06</td>
        <td><input type="text" id="entrada06" name="entrada06" value="" size="60"></td>
        <td><input type="checkbox" name="chkMestre06" ></td>
        <td><input type="checkbox" name="chkErro06" ></td>
    </tr>
    <tr>
        <td>07</td>
        <td><input type="text" id="entrada07" name="entrada07" value="" size="60"></td>
        <td><input type="checkbox" name="chkMestre07" ></td>
        <td><input type="checkbox" name="chkErro07" ></td>
    </tr>
    <tr>
        <td>08</td>
        <td><input type="text" id="entrada08" name="entrada08" value="" size="60" ></td>
        <td><input type="checkbox" name="chkMestre08" ></td>
        <td><input type="checkbox" name="chkErro08" ></td>
    </tr>
    <tr>
        <td>09</td>
        <td> <input type="text" id="entrada09" name="entrada09" value="" size="60"></td>
        <td><input type="checkbox" name="chkMestre09" ></td>
        <td><input type="checkbox" name="chkErro09" ></td>
    </tr>
    <tr>
        <td>10</td>
        <td> <input type="text" id="entrada10" name="entrada10" value="" size="60" ></td>
        <td><input type="checkbox" name="chkMestre10" ></td>
        <td><input type="checkbox" name="chkErro10" ></td>
    </tr>
    
</table>
   
    
    <button name="btConverter" onclick="btConverter" >Converter</button>
    
</form>


<?php
if( isset( $_POST["btConverter"] ) ){
    require_once "class/Converte.php";
    
    $binario01 = new Converte();
    $binario01->converter( $_POST["entrada01"] );
    
    $binario02 = new Converte();
    $binario02->converter( $_POST["entrada02"] );
    
    $binario03 = new Converte();
    $binario03->converter( $_POST["entrada03"] );
    
    $binario04 = new Converte();
    $binario04->converter( $_POST["entrada04"] );

    $binario05 = new Converte();
    $binario05->converter( $_POST["entrada05"] );

    $binario06 = new Converte();
    $binario06->converter( $_POST["entrada06"] );

    $binario07 = new Converte();
    $binario07->converter( $_POST["entrada07"] );

    $binario08 = new Converte();
    $binario08->converter( $_POST["entrada08"] );
    
    $binario09 = new Converte();
    $binario09->converter( $_POST["entrada09"] );
    
    $binario10 = new Converte();
    $binario10->converter( $_POST["entrada10"] );
   

}


?>
<br>

<table border="1" >
   <tr>
       <th>Seq</th>
       <th>Binario </th>
       <th>Decimal</th>
       <th>Hexadecimal  </th>
       <th>Wiegand </th>
   </tr>
   
    <tr>
        <td> 01 </td>
        <td> <?= $binario01->saidaBin;?>  </td>
        <td> <?= $binario01->saidaDec;?> </td>
        <td> <?= $binario01->saidaHex;?>  </td>
        <td> <?= $binario01->saidaWieg;?>   </td>
    </tr>
    
    <tr>
        <td> 02 </td>
        <td> <?= $binario02->saidaBin;?>  </td>
        <td> <?= $binario02->saidaDec;?> </td>
        <td> <?= $binario02->saidaHex;?>  </td>
        <td> <?= $binario02->saidaWieg;?>   </td>
    </tr>
    
    <tr>
        <td> 03 </td>
        <td> <?= $binario03->saidaBin;?>  </td>
        <td> <?= $binario03->saidaDec;?> </td>
        <td> <?= $binario03->saidaHex;?>  </td>
        <td> <?= $binario03->saidaWieg;?>   </td>
    </tr>

    <tr>
        <td> 04 </td>
        <td> <?= $binario04->saidaBin;?>  </td>
        <td> <?= $binario04->saidaDec;?> </td>
        <td> <?= $binario04->saidaHex;?>  </td>
        <td> <?= $binario04->saidaWieg;?>   </td>
    </tr>
    

    <tr>
        <td> 05 </td>
        <td> <?= $binario05->saidaBin;?>  </td>
        <td> <?= $binario05->saidaDec;?> </td>
        <td> <?= $binario05->saidaHex;?>  </td>
        <td> <?= $binario05->saidaWieg;?>   </td>
    </tr>

    <tr>
        <td> 06 </td>
        <td> <?= $binario06->saidaBin;?>  </td>
        <td> <?= $binario06->saidaDec;?> </td>
        <td> <?= $binario06->saidaHex;?>  </td>
        <td> <?= $binario06->saidaWieg;?>   </td>
    </tr>

    <tr>
        <td> 07 </td>
        <td> <?= $binario07->saidaBin;?>  </td>
        <td> <?= $binario07->saidaDec;?> </td>
        <td> <?= $binario07->saidaHex;?>  </td>
        <td> <?= $binario07->saidaWieg;?>   </td>
    </tr>

    <tr>
        <td> 08 </td>
        <td> <?= $binario08->saidaBin;?>  </td>
        <td> <?= $binario08->saidaDec;?> </td>
        <td> <?= $binario08->saidaHex;?>  </td>
        <td> <?= $binario08->saidaWieg;?>   </td>
    </tr>

    <tr>
        <td> 09 </td>
        <td> <?= $binario09->saidaBin;?>  </td>
        <td> <?= $binario09->saidaDec;?> </td>
        <td> <?= $binario09->saidaHex;?>  </td>
        <td> <?= $binario09->saidaWieg;?>   </td>
    </tr>

    <tr>
        <td> 10 </td>
        <td> <?= $binario10->saidaBin;?>  </td>
        <td> <?= $binario10->saidaDec;?> </td>
        <td> <?= $binario10->saidaHex;?>  </td>
        <td> <?= $binario10->saidaWieg;?>   </td>
    </tr>
    
    
    
</table>


           
           
            
        </main>  <!--FIM DA AREA PRINCIPAL MAIN GRID LAYOUT-->
        
<!-- INCLUSÃO DO RODAPE -->    
<!--<?php require_once "inc/rodape.php";?>-->