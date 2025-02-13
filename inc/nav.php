<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="">Blog App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <?php if (isset($_SESSION['name'])) { ?>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=about">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=post">Sample Post</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=contact">Contact</a></li>

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=add_blog">Add Blog</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=logout">Logout</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href=""><?php echo $_SESSION['name']; ?></a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=register">Register</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?page=login">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>