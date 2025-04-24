function Adicionar(){
    let form = document.querySelector('#form-adciona')

    let produto  = form.produto.value
    console.log(produto)
    

    let valor = form.valor.value
    console.log(valor);
    
    let quantidade = form.quantidade.value
    console.log(quantidade);

    if(!produto || !quantidade || valor)
        window..alert("preencha todos os campos")

    else{
        let produto = document.createElement("tr")
        let codigoTD = document.createElement("td")
        let nomeTD= document.createElement("tr")
        let valorUnitTD = document.createElement("td")
        let quantidadeTD = document.createElement("tr")
        let valorTotaTD = document.createElement("td")

        codigoTD.appendChild  = document.querySelectorAll("tr").length
        nomeTD.appendChild= produto

    }


} 