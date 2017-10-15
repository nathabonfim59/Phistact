<?php
    // Trata as requisições do formulário
    if(isset($_GET['nome'])) {
        $contact = array(
            'name' => $_GET['nome'],
            'email' => $_GET['email'],
            'phone' => $_GET['phone']
        );

        store_contacts($contact);
    }

    // Redireciona o usuário para a página adequada de acordo com a URL
    if(isset($_REQUEST['page'])) {
        switch($_REQUEST['page']) {
            case 'list':
                $page = 'list_contacts.php';
                break;
            case 'add':
                $page = 'add_contacts.php';
                break;
            default:
                redirect_to_page('list');
                break;
        }
    } else {
        redirect_to_page('list');        
    }

    /**
     * Redireciona o usuário para uma página válida especificada
     *
     * @param [string] $page
     * Parâmetros válidos
     * $page = 'list' ou $page = 'add'
     * 
     * @return void
     */
    function redirect_to_page($page) {
        $current_url = (((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
        $target_url = explode('?', $current_url_raw)[0].'?page='.$page;
        header('Location: '.$target_url, true, 301);
        die();
    }

    /**
     * Armazena o contato em um cookie
     *
     * @param [type] $contact
     * @return void
     */
    function store_contacts($contact) {
        $contact_list = array();
        if (isset($_COOKIE['contact_list'])) {
            $contact_list = json_decode($_COOKIE['contact_list']);
        }

        array_push($contact_list, $contact);
        setcookie('contact_list', json_encode($contact_list), strtotime('+1 year'));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phistact</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include('bars.php'); ?>
    <div class="content">
        <?php include($page) ?>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>