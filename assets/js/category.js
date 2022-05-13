let filter = {
    category: null,
    size: null
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

function filterProductByKeyword(){
    let search = $('input[name="search"]').val();
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