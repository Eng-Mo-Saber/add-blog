<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <h2 class="text-center">Login</h2>
            <?php
            errorMas();
            ?>
            <form  action="./index.php?page=control_login" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="index.php?page=register">Don't have an account? Sign up</a>
            </div>
        </div>
    </div>
</div>