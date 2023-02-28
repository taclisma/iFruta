<!DOCTYPE html>
<html lang="pt-br">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFruta</title>
      
    <!-- import de icon para o botao float -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Poppins:wght@200&display=swap"
        rel="stylesheet">

     
   </head>

<body id="body_sucess">
    <header><img src="logo.png" alt="sucesso"></header>

    <section  class="container">
        <form method="POST" class="container -imagem" action="/registrar"> 
            <input hidden value="<?= $matricula;?>" name="user" id="user">
            <button type="submit" id="receber">
                <div class="text">RECEBER</div>
            </button>
            <p>
              Matrícula: <?= $matricula;?>
            </p>
           
        </form>
        
    </section>


    
</body>

</html>