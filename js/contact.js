let nom = document.getElementById("nom")
let mail = document.getElementById("mail")
let texte = document.getElementById("texte")
let numero = document.getElementById("numero") 
let bouton = document.getElementById("button")

let spanNom = document.getElementById("spanNom")
let spanMail = document.getElementById("spanMail")
let spanTexte = document.getElementById("spanTexte")
let spanNumero = document.getElementById("spanNumero")

function verifyChamp(input, span, e){
    if(input.value.trim() === ''){
        e.preventDefault()
        input.style.borderColor = "red"
        span.textContent = "Remplissez ce champ"
        span.style.color = "red"
        span.style.display = "flex"
        span.style.justifyContent = 'center';
    }else{
        input.style.borderColor = "black"
        span.textContent = ""
    }
}

function verifyMail(mail, span, e){
    
    const mailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(mail.value.trim() === ''){
        e.preventDefault();
        span.textContent = 'Remplissez ce champ';
        span.style.color = 'red';
        span.style.display = 'flex';
        span.style.justifyContent = 'center';
        mail.style.border = '1px solid red';
    }
    else if(!(mailRegex.test(mail.value))){
        e.preventDefault();
        span.textContent = 'Adresse mail invalide';
        span.style.color = 'red';
        span.style.display = 'flex';
        span.style.justifyContent = 'center';
        mail.style.border = '1px solid red';
    }
    else{
        span.style.display = 'none';
        mail.style.borderColor = 'black';
    } 
}

bouton.addEventListener('click', (e)=>{
    verifyChamp(nom, spanNom, e)
    verifyMail(mail, spanMail, e)
    verifyChamp(texte, spanTexte, e)
    verifyChamp(numero, spanNumero, e)
})