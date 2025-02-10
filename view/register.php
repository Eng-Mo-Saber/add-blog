<div class="container px-4 px-lg-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <h2 class="text-center mb-4">Sign Up</h2>
            <?php
            errorMas();
            successMas();
            ?>
            <form action="./index.php?page=control_register" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username"
                        placeholder="Enter username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Enter password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="./index.php?page=login">Login here</a>
            </p>
        </div>
    </div>
</div>