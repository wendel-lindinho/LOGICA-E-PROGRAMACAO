function verificarNumero(){
    let numero = document.querySelector('#numero').value;
    let mensagem = document.querySelector('#mensagem')

    if (numero % 2 === 0){
        mensagem.innerText = "o numero é par"
    }

    else {
        mensagem.innerText = "o numero é impar"
    }
}