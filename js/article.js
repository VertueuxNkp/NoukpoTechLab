const button = document.getElementsByClassName("btn btn-primary")
const backToToAdd = document.getElementById('add');
let id = []
for(let i = 0; i <= button.length-1; i++){
    button[i].addEventListener('click', (e)=>{
        id.push(button[i].dataset.id)
        console.log(id)
        backToToAdd.classList.add('show');
    })
}