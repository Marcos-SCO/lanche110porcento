<?php

$controller = isset($controller) ? $controller : false;

$dataPage = isset($dataPage) ? $dataPage : mb_strtolower($controller);

$isHomeController = $controller == 'Home';

$isGalleryPage = $dataPage == 'gallery';

$tinyMceControllers = ['posts/show'];
$isTinyMce = in_array($dataPage, $tinyMceControllers);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=description content="Gordão a 110% melhor lanchonete e restaurante da região. É gordão ou nada!">
    <meta name="keywords" content="Gordão, lanchonete, Gordo, Gordão, Gordo Lanchonete, Gordão a 110%, Gordo 110%, Lanchonete Gordão, 110% lanchonete, 110% Gordão Lanchonete, lanchonete a 110%, gordao a 110%, Lanchonete a 110%">
    <meta name=author content='Marcos dos Santos Carvalho'>

    <!-- fav icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $BASE ?>/public/resources/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $BASE ?>/public/resources/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $BASE ?>/public/resources/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $BASE ?>/public/resources/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= $BASE ?>/public/resources/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php $getQuery = getQueryString(); // get url 
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@700&display=swap" rel="stylesheet">

    <?php
      // tiny MCE 
    if ($isTinyMce) echo "<!-- Tiny MCE -->
    <script src='https://cdn.tiny.cloud/1/dksjdj5uue9ro7l3iyr2xu6basfnwgrqpkh8y5beu0m60kwl/tinymce/5/tinymce.min.js' referrerpolicy='origin'></script><script>tinymce.init({selector:'#tinyMCE'});</script>";

    // Light Box 
    if ($isGalleryPage) echo "<!-- LightBox -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css'><script src='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox-plus-jquery.min.js' defer></script>";

    ?>

    <link rel="stylesheet" href="<?= $BASE . '/public/dist/css/index.css'; ?>">

    <title><?= $title ?? 'Olá mundo!' ?></title>

</head>

<body data-page="<?= $dataPage; ?>">

    <?php // if (!$isHomeController) echo '<!-- Spinner --><div id="loader" class="center" style="display:none"></div>'; ?>

    <header class="<?= $isHomeController ? 'fixed-top' : '' ?> z-index bg-light" id="topNav" data-js="navHeader">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#f8f9fa;">
            <!--  Show this only on mobile to medium screens  -->
            <a class="navbar-brand d-lg-none" href="<?= $BASE ?>"><img src="<?= $BASE ?>/public/resources/img/template/gordao110Logo100.png" alt="gordao110Logo100.png" title="Grodão a 110%"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarToggle" style="padding-right: 4.4rem;">
                <?php

                function activePage($getQuery, $op)
                {
                    $active = ($getQuery[0] == $op) ? 'active' : '';
                    return $active;
                }

                ?>

                <ul class="navbar-nav">
                    <li class="nav-item <?= activePage($getQuery, '') ?>"><a class="nav-link" href="<?= $BASE ?>">Home<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item <?= ($getQuery[0] == 'products' || $getQuery[0] == 'categories') ? 'active' : '' ?>"><a class="nav-link" href="<?= $BASE ?>/products">Ofertas</a></li>
                    <li class="nav-item <?= activePage($getQuery, 'posts') ?>"><a class="nav-link" href="<?= $BASE ?>/posts">Blog</a></li>
                    <li class="nav-item <?= activePage($getQuery, 'gallery') ?>"><a class="nav-link" href="<?= $BASE ?>/gallery">Galeria</a></li>
                </ul>

                <!--   Show this only lg screens and up   -->
                <a class="navbar-brand d-none d-lg-block" style="position:absolute;top:0;margin:0!important;" href="<?= $BASE ?>"><img src="<?= $BASE ?>/public/resources/img/template/gordao110Logo100.png" alt="gordao110Logo100.png" title="Grodão a 110%"></a>

                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?= activePage($getQuery, 'about') ?>" href="<?= $BASE ?>/about">Sobre</a></li>
                    <li class="nav-item dropdown <?= activePage($getQuery, 'contact') ?>">
                        <a class="nav-link dropdown-toggle" style="background:#f8f9fa!important" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contato</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= $BASE ?>/contact/message">Enviar Messagem</a>
                            <a class="dropdown-item" href="<?= $BASE ?>/contact/work">Trabalhe conosco</a>
                        </div>
                    </li>

                    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="background:#f8f9fa!important" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adicionar</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= $BASE ?>/users/create">Usuário</a>
                                <a class="dropdown-item" href="<?= $BASE ?>/categories/create">Categorias</a>
                                <a class="dropdown-item" href="<?= $BASE ?>/products/create">Produtos</a>
                                <a class="dropdown-item" href="<?= $BASE ?>/posts/create">Postagens</a>
                                <a class="dropdown-item" href="<?= $BASE ?>/gallery/create">Fotos</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown <?= activePage($getQuery, 'users') ?>">
                            <a class="nav-link dropdown-toggle" style="background:#f8f9fa!important" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['user_name'] ?? "" ?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= $BASE ?>/users/edit/<?= $_SESSION['user_id'] ?>">Meu perfil</a>
                                <a class="dropdown-item" href="<?= $BASE ?>/users/show/<?= $_SESSION['user_id'] ?>">Página</a>
                                <a class="dropdown-item" href="<?= $BASE ?>/users/">Usuários</a>
                                <a class="dropdown-item" href="<?= $BASE ?>/users/logout">Sair</a>
                            </div>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </nav>
        <!-- end nav -->
    </header>

    <?php

    if ($isHomeController) {

        // Hero Slider
        include_once __DIR__ . '/../components/heroSlider.php';
    }

    // Display flash messages
    if (isset($flash) && $flash != false && $flash != null) {

        $flashClass = isset($flash['class']) ? $flash['class'] : '';
        $flashMessage = isset($flash['message']) ? $flash['class'] : '';

        echo "<div class='" . $flashClass . "' id='msg-flash' style='transition: transform .18s, opacity .18s, visibility 0s .18s;position:absolute;left:5%;top:17%;text-align: center;z-index:9999999999;'>" . $flashMessage . "</div><script>/*flash message*/ let flash = document.querySelector('#msg-flash'); if (flash != null) {setTimeout(() => { flash.style = 'display:none;transition: transform .18s, opacity .18s, visibility 0s .18s;'; }, 4000); }</script>";
    }

    ?>

    <!-- To top btn -->
    <button id="topBtn" data-anima="right"><i class="fa fa-arrow-up"></i></button>

    <!-- Whatsapp btn -->
    <a href="https://api.whatsapp.com/send?phone=5511916459334&text=Olá+Marcos+tudo+bem?+Vim+por+meio+do+link+no+site+%22Gordão+a+110%%22+e+gostaria+de+conversar+com+você." class="float" target="_blank" id="whats"><i class="fa fa-whatsapp my-float"></i></a>

    <main>