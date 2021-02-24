<?php

    while($result_lastp_user = mysqli_fetch_assoc($exec_latest_post)){
        // TAMAÑO DEL TEXTO DE ENTRADA
        $text_post = $result_lastp_user["post_text"];
        $characters_text = 350;
        if (strlen ( $text_post )>$characters_text) {
            $text_post = substr ( $result_lastp_user["post_text"], 0 , 350 ) ."...";
        }
        // require(__ROOT__.'/modules/infopostm.php');

?>
<!--- \\\\\\\Post-->

    <div class="card gedf-card">

        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-2">
                        <img class="rounded-circle cicle-medium" src="<?=$result_lastp_user["user_img"]?>" alt="">
                    </div>
                    <div class="ml-2">
                        <div class="h5 m-0"><a href="../views/user.php?user=<?=$result_lastp_user["user_id"]?>"><?= $result_lastp_user["name"]." ". $result_lastp_user["surname"]?></a></div>
                        <div class="h7 text-muted"><?= $result_lastp_user["role_user"]. " | " .$result_lastp_user["proficiency"]?></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <?= $result_lastp_user["created_at"]?></div>
            <a class="card-link" href="../views/pagepost.php?blog_post=<?=$result_lastp_user["id"]?>">
                <h5 class="card-title"> <?= $result_lastp_user["title"]?> </h5>
            </a>

            <p class="card-text">
                    <?= $text_post?>

            </p>
            
            <div class="text-muted h7">Fuente:  
                <a href="<?=$result_lastp_user["source_url"]?>"><?= $result_lastp_user["source_name"]?></a>
            
            
        </div>
        </div>
        <img class="img-fluid w-100" src="<?= $result_lastp_user["post_img"]?>" alt="">
        <div class="card-footer">
            <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
            <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
        </div>

        
    </div>

<!---------->
<?php


        
    }


?>