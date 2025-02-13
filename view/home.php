<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
            $sql = "SELECT * FROM `posts` ORDER BY created_at DESC";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $content = substr($row['content'], 0, 30);
            ?>
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="./index.php?page=single_blog&id=<?= $row['id'] ?>">
                        <h2 class="post-title"><?= $row['title'] ?></h2>
                        <h3 class="post-subtitle"><?= $content ?> ...</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="./index.php?page=single_blog&id=<?= $row['id'] ?>">Start Bootstrap</a>
                        on <?= $row['created_at'] ?>
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            <?php } ?>
        </div>
    </div>
</div>