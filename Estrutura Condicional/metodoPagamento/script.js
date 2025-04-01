// Switch Case - Menu
//if

//Metodo  de pagamento

// 1 - pix - 10% de desconto
// 2 - debito - 5% de desconto
// 3 - credito - valor total

function calcularPagamento() {



    let formaPagamento = "credito"
    let valorTotal = 100

    switch (formaPagamento) {
        case "pix":
            valorFinal = valorTotal * 0.9
            console.log(valorFinal); 0
            break
        case "debito":
            valorFinal = valorTotal * 0.95
            console.log(valorFinal);
            break
        case "credito":
            console.log(valorTotal);
            break
        default:
            console.log("Informe um valor correto")
            break
    }
}