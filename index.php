<?php 
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    if(file_exists('pages/'.$url[0].'.php')){
        $pages = 'pages/'.$url[0].'.php';
        include('main.php');
    }else{
        include('login.php');
    }
?>