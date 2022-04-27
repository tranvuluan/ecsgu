function addToCart(id_product){
    event.preventDefault();
    $.ajax({
        url: './process/cart.php',
        type: 'POST',
        data: {
            id_product: id_product,
            addToCart: true
        },
        success: function(data){
            data;
            alert("Product has been added to cart");
            location.reload();
        }
    });
}