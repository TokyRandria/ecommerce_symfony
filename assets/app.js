/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

const formTaxe = document.querySelector('#form_taxe');
const videosList = document.querySelector('#videos_list');

formTaxe.addEventListener('submit', function (e) {
    e.preventDefault();
    fetch(this.action, {
        body: new FormData(e.target),
        method: 'POST'
    })
        .then(response => response.json())
        .then(json => {
            handleResponse(json);
        });
});

const handleResponse = function (response) {
    removeErrors();
    switch(response.code) {
        case 'VIDEO_ADDED_SUCCESSFULLY':
            videosList.innerHTML += response.html;
            break;
        case 'VIDEO_INVALID_FORM':
            handleErrors(response.errors);
            break;
    }
}

// Treeview Initialization
$(document).ready(function() {
    $('.treeview-colorful').mdbTreeview();
});

