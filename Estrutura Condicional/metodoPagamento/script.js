// Switch Case - Menu
//if

//Metodo  de pagamento

// 1 - pix - 10% de desconto
// 2 - debito - 5% de desconto
// 3 - credito - valor total

function calcularPagamento() {



    let formaPagamento = document.querySelector("#formaPagamento").value
    let valorTotal = parseFloat(document.querySelector("#valorCompra").value)
    console.log(formaPagamento, valorTotal);
    let resultado = document.querySelector("#resultado")
    let valorFinal

    if (valorTotal <= 0 || isNaN(valorTotal)) {
        resultado.innerHTML = "Insira um valor valido"
    }

    else

        switch (formaPagamento) {
            case "pix":
                valorFinal = valorTotal * 0.9
                resultado.innerHTML = `valor final foi de R$ ${valorFinal.toFixed(2)}`;
                break
            case "debito":
                valorFinal = valorTotal * 0.95
                resultado.innerHTML = `valor final foi de R$ ${valorFinal.toFixed(2)}`
                break
            case "credito":
                resultado.innerHTML = `valor final foi de R$ ${valorTotal.toFixed(2)}`

                break
            default:
                console.log("Informe um valor correto")
                break
        }
}