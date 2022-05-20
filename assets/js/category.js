let filter = {
    category: null,
    size: null
}

let url = new URL(location.href);
let search = url.searchParams.get("search");

if (search) {
    filterProductByKeyword(search);
}


function filterSize(size) {
    filter.size = size;
    getFilter();
}


function filterCategory(id_category) {
    filter.category = id_category;
    getFilter();
}

function getFilter() {
    $.ajax({
        url: './process/category.php',
        method: 'GET',
        data: {
            category: filter.category,
            size: filter.size,
            filterProduct: true

        },
        success: function (response) {
            // console.log(response);
            $('#grid_product').html(response);
        }
    })
}

function filterProductByKeyword(word) {
    let search;
    if (!word)
         search = $('input[name="search"]').val();
    else 
        search = word
    $.ajax({
        url: './process/category.php',
        method: 'GET',
        data: {
            search: search,
            filterProductByKeyword: true
        },
        success: function (response) {
            // console.log(response);
            $('#grid_product').html(response);
        }
    })
}

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