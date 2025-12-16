let nomArticle = document.getElementById("nomArticle")
let description = document.getElementById("description")
let categorie = document.getElementById("categorie")
let prixUnitaire = document.getElementById("prixUnitaire")
let qteStock = document.getElementById("qteStock")
let imageInput = document.getElementById("image")

let button = document.getElementById("button")

function verifyArticleName(nom,e){
    let spanNom = document.getElementById("spanNomArticle")
    if(nom.value.trim() === ''){
        e.preventDefault()
        nomArticle.style.borderColor = "red"
        spanNom.textContent = "Remplissez ce champ"
        spanNom.style.color = "red"
        spanNom.style.textAlign = "center"
    }else{
        nomArticle.style.borderColor = "black"
        spanNom.textContent = ""
    }
}

function verifyDescription(nom,e){
    let spanDescription = document.getElementById("spanDescription")
    if(nom.value.trim() === ''){
        e.preventDefault()
        description.style.borderColor = "red"
        spanDescription.textContent = "Remplissez ce champ"
        spanDescription.style.color = "red"
        spanDescription.style.textAlign = "center"
    }else{
        description.style.borderColor = "black"
        spanDescription.textContent = ""
    }
}

function verifyCategorie(nom,e){
    let spanCategorie = document.getElementById("spanCategorie")
    if(nom.value.trim() === ''){
        e.preventDefault()
        categorie.style.borderColor = "red"
        spanCategorie.textContent = "Remplissez ce champ"
        spanCategorie.style.color = "red"
        spanCategorie.style.textAlign = "center"
    }else{
        categorie.style.borderColor = "black"
        spanCategorie.textContent = ""
    }
}

function verifyPrix(nom,e){
    let spanPrixUnitaire = document.getElementById("spanPrixUnitaire")
    if(nom.value.trim() === ''){
        e.preventDefault()
        prixUnitaire.style.borderColor = "red"
        spanPrixUnitaire.textContent = "Remplissez ce champ"
        spanPrixUnitaire.style.color = "red"
        spanPrixUnitaire.style.textAlign = "center"
    }else{
        prixUnitaire.style.borderColor = "black"
        spanPrixUnitaire.textContent = ""
    }
}

function verifyQuantite(nom,e){
    let spanQteStock = document.getElementById("spanQteStock")
    if(nom.value.trim() === ''){
        e.preventDefault()
        qteStock.style.borderColor = "red"
        spanQteStock.textContent = "Remplissez ce champ"
        spanQteStock.style.color = "red"
        spanQteStock.style.textAlign = "center"
    }else{
        qteStock.style.borderColor = "black"
        spanQteStock.textContent = ""
    }
}

function verifyImage(img, e){
    let image = img.files[0]
    if(image){
        let extension = image.name.toLowerCase().split('.').pop()
        let spanImage = document.getElementById("spanImage")

        let extensions = ["jpg", "png", "jpeg"]

        if(!extensions.includes(extension)){
            e.preventDefault();
            img.style.borderColor = 'red'
            spanImage.textContent = "Image invalide"
            spanImage.style.color = 'red'
            spanImage.style.textAlign = "center"
        }else{
            img.style.borderColor = 'black'
            spanImage.textContent = ""
        }
    }else{
        e.preventDefault();
        img.style.borderColor = 'red'
        spanImage.textContent = "Image invalide"
        spanImage.style.color = 'red'
        spanImage.style.textAlign = "center"
    }
}



button.addEventListener('click', (e)=>{
    verifyArticleName(nomArticle, e);
    verifyDescription(description, e)
    verifyCategorie(categorie, e)
    verifyPrix(prixUnitaire, e)
    verifyQuantite(qteStock, e)
    verifyImage(image, e)
})