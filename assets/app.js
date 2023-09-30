/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import 'flowbite';

document.addEventListener("DOMContentLoaded", function() {
    let buttons = document.querySelectorAll('[data-modal-toggle="readProductModal"]');
    let modalContent = document.getElementById('modal-content');

    buttons.forEach(function(button) {
        button.addEventListener("click", function() {
            let letterId = button.getAttribute('data-letter-id');
            let letter = letter.find(function(letter) {
                return letter.id === letterId;
            });

            if (letter) {
                modalContent.textContent = letter.response;
                // Affichez la modale ici si elle n'est pas déjà affichée
            }
        });
    });
});
