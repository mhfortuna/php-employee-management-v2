<nav id="mainNav" data-base_url="<?= BASE_URL ?>" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Employee Manager v2</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <a href="<?= BASE_URL ?>employee/dashboard" class="nav-item nav-link my-2 my-sm-0">Dashboard</a>
            <a href="<?= BASE_URL ?>user/dashboard" class="nav-item nav-link my-2 my-sm-0">Users</a>
        </ul>
        <form action="<?= BASE_URL ?>login/logoutUser" method="post" class="form-inline ml-auto">
            <button class="btn btn-outline-primary ml-auto my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>