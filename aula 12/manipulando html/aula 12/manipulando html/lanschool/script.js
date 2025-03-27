//getElementsByTagName - Seleciona todas as tags que eu desejar

let paragrafos = document.getElementsByTagName('p');
paragrafos[0].innerHTML = "Palmeiras sem mundial0";
let input = document.getElementsByTagName("input")[0].value;


//getElementsById - Seleciona um elemento do tipo ID
var titulo = document.getElementById ('titulo');
titulo.innerHTML = 'Alterado usando JS';

//get.ElementsByClassName - Seleciona todas os elementos do tipo class
const caixas = document.getElementsByClassName('caixa');
caixas[0].style.backgroundColor =  "red"
caixas[1].style.backgroundColor =  "green"

//querySelector - Seleciona um elemento do tipo Class ou Id
const paragrafosQuery = document.querySelector('#paragrafoQuery')
paragrafosQuery.style.backgroundColor = "blue"
paragrafosQuery.style.padding = "10px"


function alterarTexto(){
    let input = document.getElementsByTagName('input')[0].value
    titulo.innerHTML = input
    
}

function alterarQuery(){
    let input = document.getElementsByTagName('input')[1].value
    paragrafoQuery.innerHTML = input

}

//querySelector - Seleciona todos os elementos de classe ou id
const caixaQuery = document.querySelectorAll ('.caixaQuery')

caixaQuery [0].style.backgroundColor = 'purple'
caixaQuery [1].style.backgroundColor = 'black'
caixaQuery [1].style.style = 'white'

