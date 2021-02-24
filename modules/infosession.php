<div class="card position-sticky mb-5">

    <div class="card-body">

        <div class="h5 m-0"><a href='../views/user.php?user=<?=$_SESSION["id"]?>'><?= $_SESSION["name"]." ". $_SESSION["surname"]?></a></div>
        <div class="h7 text-muted"><?= $_SESSION["role_user"]. " | " .$_SESSION["proficiency"]?></div>

        <div class="h7">
            Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
            etc.
        </div>

    </div>

</div>