$(document).ready(function () {

    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container1 = $('div#kvartiri_kvartiribundle_hotels_hotelSeasons');
    var index = parseInt($container1.find(':input').length / 4 );

console.log("i a l instant" + index );
    // On ajoute un lien pour ajouter une nouvelle catégorie
    var $lienAjout1 = $('<a href="#" id="ajout_adresse" class="btn btn-info">Add new season</a>');
    $container1.append($lienAjout1);

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $lienAjout1.click(function (e) {
        console.log("avannt:"+index);
        if (index <= 5) {

            ajouterAdresse1($container1);
            console.log("apres" + index);
            calendarStart(index);



        } else if (index === 6) {

            var $lienlimit1 = $('<h1 class="btn btn-info">You are entitled to 6 seasons</h1>');
            $container1.append($lienlimit1);
            $lienAjout1.remove();


        }
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    // var index = $container1.find(':input').length;

    // On ajoute un premier champ directement s'il n'en existe pas déjà un (cas d'un nouvel article par exemple).
    if (index === 0) {

        ajouterAdresse1($container1);

    } else {
        // Pour chaque catégorie déjà existante, on ajoute un lien de suppression
        $container1.children('div').each(function () {
            ajouterLienSuppression1($(this));
        });
    }

    // La fonction qui ajoute un formulaire Categorie
    function ajouterAdresse1($container1) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var $prototype1 = $($container1.attr('data-prototype').replace(/__name__label__/g, 'Season n°' + (index))
                .replace(/__name__/g, index));

        // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
        ajouterLienSuppression1($prototype1, index);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container1.append($prototype1);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index++;
    }

    // La fonction qui ajoute un lien de suppression d'une categorie
    function ajouterLienSuppression1($prototype1, index) {
        // Création du lien
        $lienSuppression1 = $('<a href="#" class="btn btn-danger">Delete Season</a>');

        // Ajout du lien
        $prototype1.append($lienSuppression1);

        // Ajout du listener sur le clic du lien
        $lienSuppression1.click(function (e) {

            $prototype1.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l
            return false;
        });
    }

});
