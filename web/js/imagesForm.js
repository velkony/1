$(document).ready(function () {


    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container2 = $('div#kvartiri_kvartiribundle_hotels_images');

    // On ajoute un lien pour ajouter une nouvelle catégorie
    var $lienAjout2 = $('<a href="#" id="ajout_adresse" class="btn btn-info">Add an image</a>');
    $container2.append($lienAjout2);

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $lienAjout2.click(function (e) {
        if (index <= 9) {
            ajouterAdresse2($container2);
        } else if (index === 10) {

            var $lienlimit2 = $('<h1 class="btn btn-info">You are entitled to 10 images</h1>');
            $container2.append($lienlimit2);
            $lienAjout2.remove();


        }
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container2.find(':input').length;

    // On ajoute un premier champ directement s'il n'en existe pas déjà un (cas d'un nouvel article par exemple).
    if (index === 0) {

        ajouterAdresse2($container2);

    } else {
        // Pour chaque catégorie déjà existante, on ajoute un lien de suppression
        $container2.children('div').each(function () {
            ajouterLienSuppression2($(this));
        });
    }

    // La fonction qui ajoute un formulaire Categorie
    function ajouterAdresse2($container2) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var $prototype2 = $($container2.attr('data-prototype').replace(/__name__label__/g, 'Image n°' + (index + 1))
            .replace(/__name__/g, index));

        // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
        ajouterLienSuppression2($prototype2, index);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container2.append($prototype2);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index++;
    }

    // La fonction qui ajoute un lien de suppression d'une categorie
    function ajouterLienSuppression2($prototype2, index) {
        // Création du lien
        $lienSuppression2 = $('<a href="#" class="btn btn-danger">Delete Image</a>');

        // Ajout du lien
        $prototype2.append($lienSuppression2);

        // Ajout du listener sur le clic du lien
        $lienSuppression2.click(function (e) {

            $prototype2.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l
            return false;
        });
    }

});