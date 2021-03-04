<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>node_modules/jsgrid/dist/jsgrid-theme.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>node_modules/jsgrid/dist/jsgrid.css">
    <!-- Scripts -->
    <script src="<?= BASE_URL ?>node_modules/jquery/dist/jquery.js"></script>
    <script src="<?= BASE_URL ?>node_modules/jsgrid/dist/jsgrid.js"></script>
    <script src="<?= BASE_URL ?>node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script type="module" src="<?= BASE_URL ?>assets/js/user/dashboard.js"></script>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <?php
    include BASE_PATH . '/assets/templates/navbar.php';
    ?>

    <main class="container h-100 row align-items-center">
        <div class="table-responsive col" id="grid_table">
        </div>
    </main>

    <?php
    include BASE_PATH . '/assets/templates/footer.php';
    ?>
</body>

</html>