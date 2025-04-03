function verificarLogin(){
let usuario = document.querySelector('#usuario').value;
let senha = parseFloat(document.querySelector('#senha').value);
let mensagem = document.querySelector('#mensagem');

if (usuario === 'admin' && senha === 1234){
    mensagem.innerText= "VALIDO"
}
else {
   if (usuario != 'admin') {
    mensagem.innerText = "usuario invalido"
   }
   else{
    mensagem.innerText = "senha invalida"
   }

}

}