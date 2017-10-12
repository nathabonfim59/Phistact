function activate_button(id) {
    // Adiciona a aparência de botão selectionado
    document.getElementById(id).style.backgroundColor = '#9C528B';
    document.getElementById(id).style.color = '#fff';

    // Remove a seleção do elemento anterior
    if (id === 'add-users') {
        document.getElementById('list-users').style.backgroundColor = 'rgba(0, 0, 0, 0)';
        document.getElementById('list-users').style.color = '#676A95';
    } else {
        document.getElementById('add-users').style.backgroundColor = 'rgba(0, 0, 0, 0)';
        document.getElementById('add-users').style.color = '#676A95';
    }
}

function toggle_contact(contact) {
    contact.classList.toggle('contact-collapsed');
    contact.classList.toggle('contact-expanded');    
}