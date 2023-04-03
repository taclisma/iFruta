<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFruta</title>
    <link rel="stylesheet" href="anime.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://dev.anthonyfessy.com/lottie.min.js"></script>
</head>
<body>
    <a href="/"><header><img id="logo" src="logo.png" alt=""></header></a>


    <section  class="container">
        <?php if(isset($status)): ?>
        <div>
            <div class="progress-bar"></div>
            <svg id="svg" x="0px" y="0px"
            viewBox="0 0 25 30" style="enable-background:new 0 0 25 30;">
            <path class="check" class="st0" d="M2,19.2C5.9,23.6,9.4,28,9.4,28L23,2"/>
            </svg>
            
            <div class="text">
                <h3 id="sucesso">SUCESSO!</h3>
                <p>O kit alimentação foi retirado com sucesso em:</p>
                <p> <?=$data?> </p>
            </div>
        </div>
        <?php else: ?>
            <div class="cancela"><p>x</p></div>

            <div class="text">
                <h3 id="erro">Ops!</h3>
                <p>Parece que o kit alimentação ja foi retirado hoje! Hora do registro:</p>
                <p> <?=$data?> </p>
            </div>
        <?php endif; ?>
    </section>


    <script src="anime.js"></script>

</html>