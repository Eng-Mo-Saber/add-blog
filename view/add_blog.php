<main class="container mb-5">
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10 mx-auto">
        <?php 
        errorMas();
        successMas();
        ?>
        <form action="./index.php?page=control_add_blog" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="title">Blog Title</label>
                <input type="text" id="title" name="title" value="" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control">
                
                </textarea>
            </div>
            <div>
                <input type="file" name="image" class="m-3">
            </div>
                <button type="submit" class="btn btn-primary">update Blog</button>
                <button type="submit" class="btn btn-primary">Add Blog</button>
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
                // $sql = "SELECT * FROM `posts` ORDER BY created_at DESC";
                // $res = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['content'] . "</td>";
                    echo "<td> <img width='100' height='100' src='" . $row['image'] . "' /></td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "<td>";
                    echo "<a href='./index.php?page=add-blog&id=" . $row['id'] . "' class='btn btn-success''>Edit</a>";
                    echo "<a href='./index.php?page=delete-blog&id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</main>