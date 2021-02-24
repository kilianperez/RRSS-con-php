<?php
   if (!empty($_GET["blog_post"])) {
      $user_info = $content_post;
   }

?>

<div class="card gedf-card">
   <img class="card-img-top header-profile" src="<?=$user_info["user_img_header"]?>" alt="Card image cap">
   <div class="card-footer">
      <div >
         <div>
            <div class="row">
               <div class="col-sm-6">                
                  <img class="mb-2 header-img rounded-circle cicle-large" src="<?=$user_info["user_img"]?>" alt="">
               </div>
               <!-- <div class="col-sm-6 text-right">
                  <form action="../models/follower.class.php" method="post">
                     <input type="hidden" name="follower" value="<$_SESSION["id"]?>">
                     <input type="hidden" name="following" value="<$user_info["user_id"]?>">
                     <button type="submit" class="btn btn-primary">SEGUIR</i>
                     </button>
                  </form>
               </div> -->
            </div >
            <div class="d-flex align-items-end">
               <div class="ml-2">
                  <div class="h5 m-0"><a href="../views/user.php?user=<?=$user_info["user_id"]?>"><?= $user_info["name"]. " ".$user_info["surname"]?></a></div>
                  <div class="h7 text-muted"><?=$user_info["role_user"]?> | <?=$user_info["proficiency"]?></div>
                  <div class="h7">
                     Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js, etc.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div>
      </div>
   </div>
</div>