let currentOption;
let currentQuantity;
function addToCart(id_product) {
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

function removeItem(sku) {
    $.ajax({
        url: 'process/cart_items.php',
        type: 'POST',
        data: {
            sku: sku,
            removeItem: true
        },
        success: function (response) {
            $('#cart_items').html(response);
            window.location.reload();
        }
    })
}

function deleteCartItem(sku) {
    $.ajax({
        url: 'process/cart_body.php',
        type: 'POST',
        data: {
            sku: sku,
            deleteCartItem: true
        },
        success: function (response) {
            $('#cart_body').html(response);
            window.location.reload();
        }
    })
}

function changeQuantity(stock) {
    let rowTable = $('tr');
    let total = 0;
    for (let i=1; i<rowTable.length; i++) {
        let quantity = $(`tr:nth-child(${i}) td.product-quantity .cart-plus-minus-box`)[0].value;
        let price = $(`tr:nth-child(${i}) td.product-price-cart`)[0].innerText;
        let subtotal = parseInt(quantity)*parseInt(price);
        if(quantity > stock) {
            quantity = stock;
            $(`tr:nth-child(${i}) td.product-quantity .cart-plus-minus-box`)[0].value = quantity;
            subtotal = parseInt(quantity)*parseInt(price);
            alert("Quantity just can be " + stock);

        }
        $(`tr:nth-child(${i}) td.product-subtotal`)[0].innerText = subtotal;
        total += subtotal;  
    }
}
