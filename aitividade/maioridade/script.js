function verificarIdade(){
    let idade = document.querySelector('#idade').value;
    let mensagem = document.querySelector('#mensagem');

    if (idade >= 18 ){
        mensagem.innerText= "Maior de idade"

}
    else {
        mensagem.innerText= "Menor de idade"
    }

}