<!-- ALERTAS DE ERRORES CONTRASEÑA -->

<?php
    if($_GET["password_dif"]=="fail"){
    ?>
    <div class="alert alert-danger" role="alert">
    Las contraseñas no son iguales
    </div>
    <?php
    }
    ?>



    <?php
    if($_GET["password_char"]=="fail"){
    ?>
    <div class="alert alert-danger" role="alert">
    La contraseña debe contener 6 caracteres
    </div>
    <?php
    }
    ?>
    <?php
    if($_GET["password_pas"]=="fail"){
    ?>
    <div class="alert alert-danger" role="alert">
    La contraseña no puede contener password
    </div>
    <?php
    }
    ?>

    <?php
    if($_GET["password_empty"]=="fail"){
    ?>
    <div class="alert alert-danger" role="alert">
    La contraseña no puede estar vacía
    </div>
    <?php
    }
    ?>

    <?php
    if($_GET["password_num"]==123456){
    ?>
    <div class="alert alert-danger" role="alert">
    La contraseña no puede contener 123456
    </div>
    <?php
    }
    ?>
    <?php
    if($_GET["password_login"]=="fail"){
    ?>
    <div class="alert alert-danger" role="alert">
    La contraseña es incorrecta
    </div>
    <?php
    }
?>

<!-- ALERTAS DE ERRORES CAMPOS email-->

<?php
    if($_GET["email_user"]=="fail"){
    ?>
    <div class="alert alert-danger" role="alert">
    El formato correo es incorrecto
    </div>
    <?php
    }
?>

<!-- ALERTAS DE ERRORES CAMPOS TEXTO SIGNUP-->

<?php
  if($_GET["name"]=="fail"){
  ?>
  <div class="alert alert-danger" role="alert">
  Debes indicar un nombre
  </div>
  <?php
  }
  ?>


  <?php
  if($_GET["surname"]=="fail"){
  ?>
  <div class="alert alert-danger" role="alert">
  Debes indicar un apellido
  </div>
  <?php
  }
  ?>

  <?php
  if($_GET["proficiency"]=="fail"){
  ?>
  <div class="alert alert-danger" role="alert">
  Debes indicar una habilidad
  </div>
  <?php
  }
  ?>

  <?php
  if($_GET["role"]=="fail"){
  ?>
  <div class="alert alert-danger" role="alert">
  Debes indicar tus años de experiencia
  </div>
  <?php
  }
  ?>

  <?php
  if($_GET["not_title"]=="fail"){
  ?>
  <div class="alert alert-danger" role="alert">
  Debes indicar un título para el tips
  </div>
  <?php
  }
  ?>

  <?php
  if($_GET["not_text"]=="fail"){
  ?>
  <div class="alert alert-danger" role="alert">
  El texto debe contener más de 250 palabras
  </div>
  <?php
  }


?>

<!-- ALERTAS DE ERRORES VALIDACION IMG-->

<?php
    if($_GET["validateImgType"]=="fail"){
    ?>
    <div class="alert alert-danger" role="alert">
    El formato de las imganes debe ser jpeg, jpg o png
    </div>
    <?php
    }
?>

<!-- ALERTAS DE ERRORES CAMPO VACIO -->

<?php
      if($_GET["not_empty"]=="fail"){
      ?>
      <div class="alert alert-danger" role="alert">
      Los campos requeridos deben estar completos
      </div>
      <?php
      }
  ?>

  <?php
      if($_GET["not_pass"]=="fail"){
      ?>
      <div class="alert alert-danger" role="alert">
      Introduce la contraseña
      </div>
      <?php
      }
  ?>

  <?php
      if($_GET["not_email"]=="fail"){
      ?>
      <div class="alert alert-danger" role="alert">
      Introduce el email
      </div>
      <?php
      }
?>

<!-- ALERTAS DE NO EXISTE USUARIO -->

<?php
    if($_GET["not_user"]=="fail"){
    ?>
    <div class="alert alert-info d-flex justify-content-between" role="alert">
    No existe el usuario 
    
    <a href="../views/signup.php" class="">Registrarse ></a>
    </div>
    <?php
    }
?>

<!-- ALERTAS DE NO EXISTE USUARIO -->

<?php
    if($_GET["create_post"]=="now"){
    ?>
    <div class="alert alert-info d-flex justify-content-between" role="alert">
      
    Crea tu primer Tips para ver tu perfil
    
    </div>
    <?php
    }
?>









