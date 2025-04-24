//seleciona o tr
let produtos = document.querySelectorAll(".produto");
console.log(produtos);

for (let i = 0; i < produtos.length; i++){

//seleciona os td que estao no tr
let valorUnitproduto = produtos[i].querySelector(".info-valor-unidade").textContent
let quantidadeProduto = produtos[i].querySelector(".info-quantidade").textContent
let valorTotalProduto = produtos[i].querySelector(".info-valor-total")

console.log(valorUnitproduto);
console.log(quantidadeProduto);
console.log(valorTotalProduto);

// excluir o R$
let valorUnitprodutoLimpo = valorUnitproduto.replace(/R\$\ /, "")
console.log(valorUnitprodutoLimpo);
console.log(parseFloat(valorUnitprodutoLimpo) * parseInt(quantidadeProduto));



valorTotalProduto.innerHTML = "R$" + (parseFloat(valorUnitprodutoLimpo) * parseInt(quantidadeProduto)).toFixed(2)

}

