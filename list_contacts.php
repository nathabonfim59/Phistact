<?php 
    /**
     * Exibe os contatos passados como argumento
     *
     * @param [array] $contacts
     * @return void
     */
    function display_contacts($contacts) {
        $position = 0;
        foreach ($contacts as $contact) {
            $position++;
            echo '
            <div class="contact contact-collapsed" onclick="toggle_contact(this)">
                <div class="contact-row contact-header">
                    <div>
                        <span class="contact-index">'.$position.'</span></div>
                    <p class="contact-name">'.$contact['name'].'</p>
                </div>
                <div class="contact-row contact-mail">
                    <div>
                        <i class="fa fa-envelope"></i>
                    </div>
                    <p>'.$contact['email'].'m</p>
                </div>
                <div class="contact-row contact-form">
                    <div>
                        <i class="fa fa-phone"></i>
                    </div>
                    <p>'.$contact['phone'].'</p>
                </div>
            </div>
            ';
        }
    }

    if (isset($_COOKIE['contact_list'])) {
        $contact_list = json_decode($_COOKIE['contact_list'], true);
        display_contacts($contact_list);
    } else {
        echo '<h1 style="text-align: center;padding-top: 30px;">Ainda não há nenhum contato salvo.<br><br>Adicione um clicando no botão "Adicionar contato" a esquerda.</h1>';
    }
?>