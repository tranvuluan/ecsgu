function addToWishList(id_product) {
    $.ajax({
        url: './process/wishlist.php',
        type: 'POST',
        data: {
            addToWishList: true,
            id_product: id_product,
        },
        success: function (data) {
            $('#wishlist_items').html(data);
            console.log(data);

            $.ajax({

                url: './process/wishlist.php',
                type: 'POST',
                data: {
                    id_product: id_product,
                    displayWishlist: true,
                },
                success: function (response) {
                    // $('#displayWishlist').html(response1);
                    console.log(response);
                }
            })
        }
    });
}

function removeItem(id_product) {
    $.ajax({
        url: 'process/wishlist.php',
        type: 'POST',
        data: {
            id_product: id_product,
            removeItem: true
        },
        success: function (response) {
            $('#wishlist_items').html(response);
            window.location.reload();
        }
    })
}

