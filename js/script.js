function modalVerif (el, value, typeAction, id){
    const ID = id;
    const TYPEACTION = typeAction;
    const VALUE = value;

    var main = document.querySelector("main")
    var accept = document.createElement("div");

    accept.classList = "accept";
    main.appendChild(accept);


    modal = document.createElement("div");
    modal.classList = "modal";  
    accept.appendChild(modal);

    content = document.createElement("div");
    content.classList = "content";  
    modal.appendChild(content);

    text = document.createElement("p");
    text.classList = "text";

    switch(TYPEACTION){
        case "type":
            text.innerHTML = "Êtes-vous sur de vouloir supprimer le type " + VALUE + "?";
            break;
        case "SPA":
            text.innerHTML = "Êtes-vous sur de vouloir supprimer l'" + VALUE + "?";
            break;
        case "animal":
            text.innerHTML = "Êtes-vous sur de vouloir supprimer l'animal " + VALUE + "?";
            break;
        case "image":
            text.innerHTML = "Êtes-vous sur de vouloir supprimer cette image ?";
            break;
        case "blog":
            text.innerHTML = "Êtes-vous sur de vouloir supprimer le blog " + VALUE + "?";
            break;
        default:
            text.innerHTML = "Êtes-vous sur de vouloir supprimer ?";
            break;

    }
    
    content.appendChild(text);

    buttonValider = document.createElement("button");
    buttonValider.classList = "btnSuccess";
    buttonValider.innerHTML = "Valider"
    content.appendChild(buttonValider);

    buttonAnnuler = document.createElement("button");
    buttonAnnuler.classList = "btnError";
    buttonAnnuler.innerHTML = "Annuler"
    content.appendChild(buttonAnnuler);

    buttonAnnuler.addEventListener("click", function() {
        redirect = document.createElement('a');
        switch (TYPEACTION){
            case 'image':
                redirect.href = "index.php?action=modifierAnimal&&idAnimal=" + ID[0];
                break;
            case 'blog':
                redirect.href = "index.php?action=blogs";
                break;
            default:
                redirect.href = "index.php?action=admin";
                break;
        }
        redirect.click();
    })

    buttonValider.addEventListener("click", function() {

        var redirect = document.createElement('a');

        switch(TYPEACTION){
            case 'type':
                redirect.href = "index.php?action=supprimerType&&idType=" + ID;
                break;
            case 'SPA':
                redirect.href = "index.php?action=supprimerSPA&&idSPA=" + ID;
                break;
            case 'animal':
                redirect.href = "index.php?action=supprimerAnimal&&idAnimal=" + ID;
                break;
            case 'image':
                redirect.href = "index.php?action=supprimerImage&&idAnimal=" + ID[0] + "&&idImage=" + ID[1];
                break;
            case 'blog':
                redirect.href = "index.php?action=supprimerBlog&&idBlog=" + ID;
                break;
            default:
                redirect.href = "index.php?action=admin";
        }

        redirect.click();
    })
}