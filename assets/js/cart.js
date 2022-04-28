let currentOption;

function addToCart(id_product){
    event.preventDefault();

    console.log(id_product);
    $.ajax({
        url: './process/cart_items.php',
        type: 'POST',
        data: {  
            id_product: id_product,
            sku: currentOption,
            addToCart: true
        },
        success: function(response){
            $('#cart_items').html(response);
            alert("Product has been added to cart");
        }
    });
}


function pickSize(sku){
    currentOption = sku;
    $.ajax({
        url: 'process/product_details.php',
        type: 'POST',
        data: {
            sku: sku,
            pickSize: true
        },
        success: function(response){
            $('#viewSKU').html(response);
        }
    })
}
