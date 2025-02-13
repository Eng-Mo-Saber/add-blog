<main class="container mb-5">
    <?php
    $blogUpdate = null;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM `posts` WHERE id = $id";
        $res = mysqli_query($con, $sql);
        $blogUpdate = mysqli_fetch_assoc($res);
    }

    ?>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            errorMas();
            successMas();
            ?>
            <form action="./index.php?page=control_add_blog&id=<?= isset($blogUpdate) ? $blogUpdate['id'] : null ?>"
                method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="title">Blog Title</label>
                    <input type="text" id="title" name="title"
                        value="<?= isset($blogUpdate['title']) ? $blogUpdate['title'] : "" ?>" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control">
                    <?= isset($blogUpdate['content']) ? $blogUpdate['content'] : "" ?>
                    </textarea>
                </div>
                <div>
                    <input type="file" name="image" class="m-3">
                </div>
                <?php
                if (isset($_GET['id'])):
                ?>
                    <button type="submit" class="btn btn-primary">update Blog</button>
                <?php
                else:
                ?>
                    <button type="submit" class="btn btn-primary">Add Blog</button>
                <?php
                endif;
                ?>
            </form>

            <h2 class="mt-5">Blog Posts</h2>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `posts` ORDER BY created_at DESC";
                    $res = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['content'] . "</td>";
                        echo "<td> <img width='100' height='100' src='" . $row['image'] . "' /></td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>";
                        echo "<a href='./index.php?page=add_blog&id=" . $row['id'] . "' class='btn btn-success''>Edit</a>";
                        echo "<a href='./index.php?page=control_delete_blog&id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>