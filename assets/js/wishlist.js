function addToWishList(func) {
    console.log(func);
    let id_product = func.getAttribute("id");

    if(func.classList.contains('active')){
        $.ajax({
            url: './process/wishlist.php',
            type: 'POST',
            data: {
                addToWishList: true,
                id_product: id_product,
            },
            success: function (data) {
                $('#wishlist_items').html(data);
                // console.log(data);
                func.classList.remove("active");

            }
        });
    }else{
        $.ajax({
            url: './process/wishlist.php',
            type: 'POST',
            data: {
                addToWishList: true,
                id_product: id_product,
            },
            success: function (data) {
                $('#wishlist_items').html(data);
                // console.log(data);
                func.classList.add("active");
            }
        });
    }
}

function addToWishListProductDetail(func1) {
    console.log(func1);
    let id_product = func1.getAttribute("id");

    if(func1.style.color == "red"){
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
                func1.style.color = "white";

            }
        });
    }else{
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
                func1.style.color = "red";
            }
        });
    }
}

function confirmLogin() {
    alert("Please login to begin");
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

