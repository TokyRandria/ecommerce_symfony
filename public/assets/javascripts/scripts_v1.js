$(document).ready(function(){
    $(".menu-button").click(function(){
    $(".menu-bar").toggleClass( "open" );
    $("body")
    })
    })

//formulaire
    function show() {
        var p = document.getElementById('inputPassword');
        p.setAttribute('type', 'text');
    }
    
    function hide() {
        var p = document.getElementById('inputPassword');
        p.setAttribute('type', 'password');
    }
    
    var pwShown = 0;
    
    document.getElementById("eye").addEventListener("click", function () {
        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    }, false);