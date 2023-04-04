<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
  <link rel="shortcut icon" href="fruta.ico" type="image/x-icon">
      <title>iFruta</title>

      <!-- import de icon para o botao float -->
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <link rel="stylesheet" href="index.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
      <script>0</script>
   </head>

   <body id="body_login">

  
      <section class="container section">
     
         <form class="box" action="/auth" method="POST">
         <img id="logo" src="fundo.png" alt="">
         <p id="texto-info">Informe o usuário e a senha do Moodle</p>
         <?php if (isset($errors['ldap'])) : ?>
               <p class="erro"> <?= $errors['ldap'] ?> </p>
            <?php endif; ?>
               <label for="user">Identificação do Usuário: </label>
               <input type="text" name="user" id="user">
               
               <label for="senha">Senha: </label>
               <input type="password" name="senha" id="senha">
         
            <button type="submit" id="login" value="login">ENTRAR</button>

         </form>
      </section>
      
   </body>

</html>
