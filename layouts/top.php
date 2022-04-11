<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>phpblog - <?=$_SERVER['REQUEST_URI'] ?? '' ?></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500&display=swap"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/css/uikit.min.css" />
        <link rel="stylesheet" href="/app.css" />
    </head>
    <body>
        <div id="app">
            <nav id="nav" role="navigation" class="uk-navbar-container uk-navbar-transparent uk-padding uk-padding-remove-vertical uk-margin-bottom" uk-navbar>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li><a href="/">Home</a></li>
                        <?php if(array_key_exists('user', $_SESSION)) : ?>
                            <li><a href="/user/update.php">My Page</a></li>
                            <li><a href="/post/write.php">Write</a></li>
                            <li><a href="/auth/logout.php">Sign out</a></li>
                        <?php else : ?>
                            <li><a href="/user/register.php">Register</a></li>
                            <li><a href="/auth/login.php">Sign in</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
            <main id="main" role="main">
                