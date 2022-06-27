(function ($) {
    $(document).ready(function() {
        $('#edit-adresse-rue').autocomplete({
            source : function(requete, reponse){ // les deux arguments représentent les données nécessaires au plugin
                $.ajax({
                    url : Drupal.url('cgt-syndicalisation/address-autocomplete'), // on appelle le script JSON
                    dataType : 'json', // on spécifie bien que le type de données est en JSON
                    type: "POST",
                    data : {
                        //variable envoyé avec la requête vers le serveur
                        name_startsWith : $('#edit-adresse-rue').val(), // on donne la chaîne de caractère tapée dans le champ de recherche
                    },
                    success : function(donnee){
                        //donnee est la variable reçu du serveur avec les résultats
                        reponse($.map(donnee, function(objet){
                            return {'label':objet.properties.label,
                                'value':objet.properties.name,
                                'postcode':objet.properties.postcode,
                                'id':objet.properties.id,
                                'city':objet.properties.city,}; // on retourne cette forme de suggestion
                        }));
                    }
                });
            }
        });

        $('#edit-adresse-rue').on( "autocompleteselect", function( event, ui ) {
            var postcode = ui.item.postcode;
            var city = ui.item.city;
            $('#edit-code-postal').val(postcode);
            $('#edit-ville').val(city);
        });

    });
})(jQuery);