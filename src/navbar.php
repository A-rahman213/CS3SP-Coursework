<?php
    
?>
<!-- imports Bootstrap CSS and creates a navbar to be used on all pages-->
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?print($title)?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    </head>
    
    <body>
    <nav class="navbar bg-info" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">Blogsite</a>
            <form class="d-flex">
                <a class="nav-link text-light" href="#">My Account</a>
                <?php if (empty($_SESSION['user_id'])):?>
                    <a class="btn btn-outline-light" href="login.php">Log in</a>
                <?php else: ?>
                    <a class="btn btn-outline-light" href="logout.php">Sign out</a>
                <?php endif; ?>
            </form>
        </div>
    </nav>