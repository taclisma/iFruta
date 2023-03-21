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
      <script>0</script>
   </head>

   <body id="body_login">

      <a href="/"><header><img id="logo" src="logo.png" alt=""></header></a>
      <section class="section">

         <form class="box" action="/auth" method="POST">
            <h1>LOGIN </h1>
            <h3 id="info_login">Por favor, identifique-se <br> (usuário e senha do moodle)</h3>


            <div id="user_senha">
               <label for="user">Identificação do Usuário: </label>
               <input type="text" name="user" id="user" placeholder="Login">
               
               <label for="senha">Senha: </label>
               <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>
            
            <?php if (isset($errors['ldap'])) : ?>
               <p class="erro"> <?= $errors['ldap'] ?> </p>
            <?php endif; ?>

            <button type="submit" id="login" value="login">ENTRAR</button>

         </form>

         <?php //require 'partials/popup.php' ?>
      
   </body>

</html>
