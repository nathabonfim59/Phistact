<?php
    /**
     * Coloca a classe active em um botao da sibar caso a página corresponda
     * 
     * @param [string] $location
     * @param [page] $butto1n
     * @return void
     */
    function check_button($location, $page) {
        if ($page == $location) {
            echo 'button-active';
        }
    }
?>
<div class="navbar pure-u-5-5">
    <h1 class="navbar-brand">Phistact</h1>
</div>
<div class="pure-u-3-24 sidebar">
    <a href="?page=list">
        <div class="button <?php check_button('list', $_REQUEST['page']); ?>" onclick="activate_button(this.id)" id="list-users">
            <i class="fa fa-list button-icon"></i>
            <p class="button-name">Listar contatos</p>
        </div>
    </a>
    <a href="?page=add">
        <div class="button <?php check_button('add', $_REQUEST['page']); ?>" onclick="activate_button(this.id)" id="add-users">
            <i class="fa fa-user-plus button-icon"></i>
            <p class="button-name">Adicionar contato</p>
        </div>
    </a>
</div>