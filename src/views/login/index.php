<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>node_modules/bootstrap/dist/css/bootstrap.css">
    <!-- Scripts -->
    <script src="<?= BASE_URL ?>node_modules/jquery/dist/jquery.js"></script>
    <script src="<?= BASE_URL ?>node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <div class="container mt-5 my-auto">
        <form class="form-signin" action="<?php echo BASE_URL ?>login/loginUser" method="POST">
            <div class="text-center mb-4">
                <img class="mb-4" src="https://cdn4.iconfinder.com/data/icons/people-avatar-1-1/128/29-512.png" alt="Image not found" height="150" />
            </div>
            <input type="text" id="inputEmailUsername" class="form-control my-3" name="email" placeholder="Email" required autofocus />
            <input type="password" id="inputPasswordLogIn" name="password" class="form-control my-3" placeholder="Password" required />
            <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Log in</button>
            <?php
            if (isset($this->error)) {
                echo "<p class='error-msg mt-5 mb-3 text-center'>{$this->error}</p>";
            }
            ?>
        </form>
    </div>

    <?php
    include_once 'assets/templates/footer.php';
    ?>

</body>

</html>