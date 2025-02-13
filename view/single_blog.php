<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
            if ($_GET['id']) {
                $sql = "SELECT * FROM `posts` ORDER BY created_at DESC";
                $res = mysqli_query($con, $sql);
                if ($row = mysqli_fetch_assoc($res)) :
                    if (isset($row['image'])):
            ?>
                        <img src="<?= $row['image'] ?>" />
                    <?php endif; ?>
                    <div class="post-preview">
                        <a href="post.php">
                            <h2 class="post-title"><?= $row['title'] ?></h2>
                            <h3 class="post-subtitle"><?= $row['content'] ?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="">Start Bootstrap</a>
                            on <?= $row['created_at'] ?>
                        </p>
                    </div>
            <?php else: echo "Blog not found";
                endif;
            } else {
                echo "infaild request";
            }
            ?>
        </div>
    </div>
</div>