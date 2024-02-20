function increment(element, name) {
    var quantityInput = document.getElementsByName(name)[0];
    var currentQuantity = parseInt(quantityInput.value, 10);
    quantityInput.value = currentQuantity + 1;
}

function decrement(element, name) {
    var quantityInput = document.getElementsByName(name)[0];
    var currentQuantity = parseInt(quantityInput.value, 10);

    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
}