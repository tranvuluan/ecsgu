function viewReview(id_product){
    event.preventDefault();
    $.ajax({
        url: './process/description_product_details.php',
        type: 'POST',
        data: {
            viewReview: true,
            id_product: id_product
        },
        success: function (response) {
            $('#des-details3').html(response);
        }
    });
}
function viewDescription(id_product){
    event.preventDefault();
    $.ajax({
        url: './process/description_product_details.php',
        type: 'POST',
        data: {
            viewDescription: true,
            id_product: id_product
        },
        success: function (response) {
            $('#des-details1').html(response);
        }
    });
}
function viewInformation(id_product){
    event.preventDefault();
    $.ajax({
        url: './process/description_product_details.php',
        type: 'POST',
        data: {
            viewInformation: true,
            id_product: id_product
        },
        success: function (response) {
            $('#des-details2').html(response);
        }
    });
}

function rateProduct(id_product){
    let rateProduct = $('#rateProduct').val();
    star = $('input[name="rate"]:checked').val();
    
    if (star == undefined) {
        alert('Please choose a star');
        return;
    }
    if (rateProduct == '') {
        alert('Please enter your comment');
        return;
    }
    $.ajax({
        url: './process/description_product_details.php',
        type: 'POST',
        data: {
            id_product: id_product,
            evaluate: rateProduct,
            rating: star,
            rate: true,
        },
        success: function (response) {
            $('#AlertEvaluate').html(response);
            location.reload();
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