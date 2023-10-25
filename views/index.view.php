<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Título da aba -->
      <title>iFruta</title>

      <!-- Icone da página -->
      <link rel="shortcut icon" href="/images/fruta.ico" type="image/x-icon">
 
        <!-- Import do css -->
      <link rel="stylesheet" href="/css/login.css">

      <!-- Fontes -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

      <!-- import de icon para o botao float -->
      <script src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/js/font-awesome.min.js" crossorigin="anonymous"></script>
   </head>

   <body>
      <section class="container section">
         <form class="box_form" action="/auth" method="POST">
         <img id="logo_login" src="/images/logo_ifrs.png" alt="Logo do IFRS Campus Porto Alegre">
         <p id="login_paragraph">Informe o usuário e a senha do Moodle</p>
         <?php if (isset($errors['ldap'])) : ?>
               <p class="mensagem_erro"> <?= $errors['ldap'] ?> </p>
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
