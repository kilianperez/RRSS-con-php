<?php
            
    if($num_paginas>1){
?>

<nav class="d-flex justify-content-center" aria-label="Page navigation example">
    <ul class="pagination">
        <?php
            // echo $num_paginas;
            $site_url = "";
            if(!empty($_GET["user"])){

                $site_url = "user=".$content_post['user_id']."&";      
            }
            if(!empty($_GET["search"])){
                $site_url = "search=".$_GET['search']."&"; 
            }
            if (($page-1)>=1){
        ?>
        <li class="page-item"><a class="page-link" href='?<?=$site_url?>page=<?=$page-1?>'>Previous</a></li>
        <?php  
        }
        ?>
        <?php
            if ($num_paginas>1) {
                for ($i=1; $i <= $num_paginas; $i++) { 
                    if($page == $i){
                        $active = "active";
                    }else{
                        $active = "";
                    }
                    ?>
                    <li class='page-item <?=$active?>'>
                        <a class='page-link' href='?<?=$site_url?>page=<?=$i?>'><?=$i?></a>
                    </li>
                    <?php
                }
            }
        ?>
        <?php
            if ($page<=($num_paginas-1)) {
        ?>
        <li class="page-item"><a class="page-link" href='?<?=$site_url?>page=<?=$page+1?>'>Next</a></li>
    </ul>
</nav>
<?php
    }
?>
<?php
    }
?>