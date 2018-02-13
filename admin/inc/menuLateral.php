<aside class="o-aside">        
        <!-- MENU ACORDION GROUP-->
             <!-- Fonte: https://github.com/vctrfrnndz/jquery-accordion -->

    <section id="multiple" data-accordion-group>
                 <!-- MENU VENDAS  -->
      <section data-accordion>                    <!-- NIVEL 0 -->
        <button data-control>VENDAS</button>      <!-- NIVEL 0 -->  
        <div data-content>                        <!-- NIVEL 0 -->
          <article><a href="vendas-dashboard.php">1. DashBoard</a></article>                 <!-- NIVEL 1 -->
          <article data-accordion>                <!-- NIVEL 2 -->
            <button data-control>2. Cadastro</button> <!-- NIVEL 2 -->
            <div data-content>                <!-- NIVEL 2 -->
              <article><a href="vendas-cadastro-clientes.php">Cliente</a></article>        <!-- NIVEL 2 -->
              <article><a href="produtos-cadastro.php">Produto</a></article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
            </div>                            <!-- NIVEL 2 -->
          </article>                            <!-- NIVEL 2 -->
          <article data-accordion>
            <button data-control>3. Orçamento</button>
            <div data-content>
              <article><a href="vendas-tabela-precos.php">Tab.Preço</a></article>
              <article>Item</article>
              <article data-accordion>
                <button data-control>3rd Level</button>
                <div data-content>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                </div>
              </article>
              <article data-accordion>
                <button data-control>3rd Level</button>
                <div data-content>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                </div>
              </article>
            </div>
          </article>
          <article>Item</article>
          <article>Item</article>
          <article>Item</article>
        </div>
      </section>
                <!--  MENU PRODUÇÃO -->
      <section data-accordion>                    <!-- NIVEL 0 -->
        <button data-control>PRODUÇÃO</button>      <!-- NIVEL 0 -->  
        <div data-content>                        <!-- NIVEL 0 -->
          <article><a href="producao-dashboard.php">1. DashBoard</a></article>                 <!-- NIVEL 1 -->
          <article data-accordion>                <!-- NIVEL 2 -->
            <button data-control>2. Cracha</button> <!-- NIVEL 2 -->
            <div data-content>                <!-- NIVEL 2 -->
              <article><a href="producao-webcracha.php">WebCrachá</a></article>        <!-- NIVEL 2 -->
              <article><a href="producao-op-direta.php">OP Direta</a></article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
              <article>Item</article>        <!-- NIVEL 2 -->
            </div>                            <!-- NIVEL 2 -->
          </article>                            <!-- NIVEL 2 -->
          <article data-accordion>
            <button data-control>3. RFID</button>
            <div data-content>
              <article>Item</article>
              <article>Item</article>
              <article data-accordion>
                <button data-control>Folha A4 - Rfid</button>
                <div data-content>
                  <article><a href="producao-ac1000.php">AC 1000</a></article>
                  <article>MF 1000</article>
                  <article>HD 1000</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                </div>
              </article>
              <article data-accordion>
                <button data-control>3rd Level</button>
                <div data-content>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                  <article>Item</article>
                </div>
              </article>
            </div>
          </article>
          <article>Item</article>
          <article>Item</article>
          <article>Item</article>
        </div>
      </section>
    
</aside> <!-- FIM DA AREA MENU GRID LAYOUT -->
        
        

        
        
        
<!-- SCRITP DO MENU-LATERAL -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="menuLateral/js/jquery.accordion.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#only-one [data-accordion]').accordion();

    $('#multiple [data-accordion]').accordion({
      singleOpen: false
    });

    $('#single[data-accordion]').accordion({
      transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
      transitionSpeed: 200
    });
  });
</script>