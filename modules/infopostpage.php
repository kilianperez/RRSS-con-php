<div class="card gedf-card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="ml-2">
                           
                    <h1 class="card-title h3 m-0"><?=$content_post["title"];?></div>
                    </h1>

            </div>
            <div>

			<?php 
			
				if( !empty($content_post["user_id"])   &&
			$_SESSION["id"]  == $content_post["user_id"]){
			?>
			<!-- //////////ENVIAR INFORMACION PARA EDITAR  -->
				<form action="../views/updatepost.php?edit_post=true" method="post">
					<input type="hidden" name="edit_post_id" value="<?=$content_post["id"]?>" />
					<input type="hidden" name="edit_title" value="<?=$content_post["title"]?>" />
					<input type="hidden" name="edit_post_text" value="<?=$content_post["post_text"]?>" />
					<input type="hidden" name="edit_source_url" value="<?=$content_post["source_url"]?>" />
					<input type="hidden" name="edit_source_name" value="<?=$content_post["source_name"]?>" />
					<button type="submit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></button>
				</form>

			<!-- \\\\\\\\\\\\ -->

			<?php
			}else{
			?>

                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                        <div class="h6 dropdown-header">Configuration</div>
                        <a class="dropdown-item" href="#">Save</a>
                        <a class="dropdown-item" href="#">Hide</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Report</a>
                    </div>
                </div>
                <?php
                }
                ?>


            
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> <?= $content_post["created_at"]?></div>

        <p class="card-text">
        <?= $content_post["post_text"]?>
        </p>

        <div class="text-muted h7">Fuente: <a href="<?=$content_post["source_url"];?>"><?=$content_post["source_name"];?></a></div><a href="NULL">

    </a></div><a href="NULL">
    </a>
    <img class="img-fluid w-100" src="<?= $content_post["post_img"]?>" alt="">

    <div class="card-footer"><a href="NULL">
        </a><a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
    </div>
    </div> 
 

    <!-- Comments Form -->
    <div class="card my-4">
    <h5 class="card-header">Deja tu opinión</h5>
    <div class="card-body">
        <form>
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    <!-- 
    -->
    <!-- Single Comment -->
    <!-- 		
    <div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
    </div>
    -->
    <!-- Comment with nested comments -->
    <!--
    <div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    
        <div class="media mt-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
        </div>
    
        <div class="media mt-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
        </div>
    
    </div>
    </div>
-->
