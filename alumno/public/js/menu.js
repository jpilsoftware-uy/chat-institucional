document.getElementById("botonAbrir").addEventListener("click", abrirYcerrarMenu);
var menu = document.getElementById('menu');
var botonAbrir = document.getElementById('botonAbrir');
var body = document.getElementById('body');



function abrirYcerrarMenu(){
    body.classList.toggle("bodyMove");
    menu.classList.toggle("menuMove");
}


