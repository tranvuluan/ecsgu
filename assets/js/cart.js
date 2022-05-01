let currentOption;
let cart_items = [];
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
    let sku = $('#viewSKU > div.pro-details-sku-info.pro-details-same-style.d-flex > ul > li > a').text();


    let result = checkStock(sku, qty);
    if (result == 1) {
        let item = {
            sku: sku,
            qty: qty,
            size: currentOption
        };
        cart_items.push(item);
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
    for (let i = 1; i < rowTable.length; i++) {
        let quantity = $(`tr:nth-child(${i}) td.product-quantity .cart-plus-minus-box`)[0].value;
        let price = $(`tr:nth-child(${i}) td.product-price-cart`)[0].innerText;
        let subtotal = parseInt(quantity) * parseInt(price);
        if (quantity > stock) {
            quantity = stock;
            $(`tr:nth-child(${i}) td.product-quantity .cart-plus-minus-box`)[0].value = quantity;
            subtotal = parseInt(quantity) * parseInt(price);
            alert("Quantity just can be " + stock);

        }
        $(`tr:nth-child(${i}) td.product-subtotal`)[0].innerText = subtotal;
        total += subtotal;
        $('#total-product').text(`${total} đ`);
        $('#total-ship').text(`30000 đ`);
        $('#grand-total').text(`${total + 30000} đ`);


        $.ajax({
            url: './process/cart_items.php',
            type: 'POST',
            data: {
                sku: $(`tbody tr:nth-child(${i})`).attr('data-sku'),
                quantity: quantity,
                changeCart: true
            },
            success: function (response) {
                
            }
        });
    }
}


function checkStock(sku, quantity) {
    console.log(`sku: ${sku} : quantity: ${quantity}`);
    let result = 1;
    $.ajax({
        url: './process/product.php',
        type: 'GET',
        async: false,
        data: {
            sku: sku,
            quantity: quantity,
            checkStock: true
        },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                result = 1;
            } else {
                alert("Sản phẩm trong kho không đáp ứng được");
                result = 0;
            }
        },
        error: function (error) {
            console.log('loi')
            console.log(error);
            result = 0;
        }
    })
    return result;
}

