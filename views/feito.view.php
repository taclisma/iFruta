<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título da aba -->
    <title>iFruta | Confirmação de recebimento</title>

    <!-- Icone da página -->
    <link rel="shortcut icon" href="/images/fruta.ico" type="image/x-icon">

    <!-- Fontes -->
    <link rel="stylesheet" href="/Css/receber.css">

    <!-- Script animação -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://dev.anthonyfessy.com/lottie.min.js"></script>
</head>

<body >

    <header>
        <a href="/">
            <img id="logo_header" src="/images/logo_ifrs.png" alt="Logo do IFRS Campus Porto Alegre">
        </a>
    </header>


    <section>
        <?php if(isset($status)): ?>
            <div class="progress-bar"></div>
            <svg id="svg" x="0px" y="0px"
            viewBox="0 0 25 30" style="enable-background:new 0 0 25 30;">
            <path class="check" class="st0" d="M2,19.2C5.9,23.6,9.4,28,9.4,28L23,2"/>
            </svg>
    
            <div class="texto_registro">
                <h3 id="sucesso">SUCESSO!</h3>
                <p>O kit alimentação foi retirado com sucesso em:</p>
                <p> <?=$data?> </p>
            </div>
      
        <?php else: ?>
        <div class="falha_registro"><p>x</p></div>

            <div class="texto_registro">
                <h3 id="erro">Ops!</h3>
                <p>Parece que o kit alimentação ja foi retirado hoje!</p>
                <p>Hora do registro: <?=$data?>  </p>
        </div>
        <?php endif; ?>
    </section>

    <script src="/javascript/anime.js"></script>
   
</body>
</html>