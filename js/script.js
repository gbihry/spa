function modalVerif (el, typeAction, id){
    const ID = id;
    const TYPEACTION = typeAction;
    var main = document.querySelector("main")
    var accept = document.createElement("div");
    accept.classList = "accept";
    main.appendChild(accept);


    modal = document.createElement("div");
    modal.classList = "modal";  
    accept.appendChild(modal);

    text = document.createElement("p");
    text.classList = "text";
    text.innerHTML = "Êtes-vous sur de vouloir supprimer ?"
    modal.appendChild(text);

    buttonValider = document.createElement("button");
    buttonValider.classList = "btnSuccess";
    buttonValider.innerHTML = "Valider"
    modal.appendChild(buttonValider);

    buttonAnnuler = document.createElement("button");
    buttonAnnuler.classList = "btnError";
    buttonAnnuler.innerHTML = "Annuler"
    modal.appendChild(buttonAnnuler);

    buttonValider.addEventListener("click", function() {
        var id = ID;
        var typeAction = TYPEACTION;

        var redirect = document.createElement('a');
        console.log(typeAction);
        switch(typeAction){
            case 'type':
                redirect.href = "index.php?action=supprimerType&&idType=" + id;
                break;
            default:
                redirect.href = "index.php?action=admin"
        }

        redirect.click();
    })
}