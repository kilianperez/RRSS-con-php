<div class="card gedf-card position-sticky">
    <div class="card-body">
        <h2 class="text-left"> Entra en el Blog </h2>
        <form action="../controllers/user.controller.php" method="post">
        <div class="form-group">
            <label for="email_user">Correo</label>
            <input type="email" class="form-control" id="email_user" name="email_user" >
            </div>
            <div class="form-group">
                <label for="password_user">Contraseña</label>
                <input type="password" class="form-control" id="password_user" name="password_user" >
            </div>
            <div class="form-group">
                <input type="submit"  id="login" name="login_user" class="btn btn-primary" value="Entra" >
            </div>
            <?php

            if (!empty($_GET)) {
                require_once('../modules/alertserrors.php');
            }
            ?>
        </form>
    </div>	
</div>





