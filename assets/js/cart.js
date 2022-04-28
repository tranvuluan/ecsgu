let currentOption;

function addToCart(id_product) {
    event.preventDefault();
    let qty = $('input[name="qtybutton"]').val().trim();

    if (qty == '' || qty <= 0) {
        alert("Please choose quantity and quantity must be greater than 0");
        return;
    }
    if (!currentOption) {
        alert("Please select a size");
        return;
    }
    $.ajax({
        url: './process/cart_items.php',
        type: 'POST',
        data: {
            id_product: id_product,
            sku: currentOption,
            qty: qty,
            addToCart: true
        },
        success: function (response) {
            $('#cart_items').html(response);
            alert("Product has been added to cart");
        }
    });
}


function pickSize(sku) {
    currentOption = sku;
    $.ajax({
        url: 'process/product_details.php',
        type: 'POST',
        data: {
            sku: sku,
            pickSize: true
        },
        success: function (response) {
            $('#viewSKU').html(response);
        }
    })
}
