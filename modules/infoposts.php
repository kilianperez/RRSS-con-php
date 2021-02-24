
<div class="card gedf-card border-bottom-0">
    <h5 class="card-header" >Nuevos usuarios</h5>

    <?php
            
            while($result_new_users = mysqli_fetch_assoc($exec_new_users)){

        ?>
            
        <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-2">
                    <img class="rounded-circle cicle-medium" src="<?=$result_new_users["user_img"]?>" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5 m-0"><a href="../views/user.php?user=<?=$result_new_users["id"]?>"><?= $result_new_users["name"]." ". $result_new_users["surname"]?></a></div>
                    <div class="h7 text-muted"><?= $result_new_users["role_user"]. " | " .$result_new_users["proficiency"]?></div>
                </div>
            </div>
        </div>
        </div>
        <?php
        }
    ?>

</div>