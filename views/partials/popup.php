         <!-- botao float para popup-->
         <a href="#"  onclick="show('popup2')">
            <button class="float">
               <i class='fas fa-apple-alt'></i>
            </button>
         </a>
         <!-- fim botao float -->
      </section>
      
      <!-- popup hiden -->
      <div class="popup" id="popup2" >
         <!-- onclick="hide('popup2')" -->
         <div id="popx"><a id="x" href="#" onclick="hide('popup2')">X</a></div> 
         <p id="poptxt">Cardapio do dia: <br> <span>Banana</span></p>
         
      </div>
      <!-- fim popup hiden -->
      
      <script><?php require("script.js")?></script>