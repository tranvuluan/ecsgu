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
            sku: sku,
            evaluate: rateProduct,
            rating: star,
            rate: true,
        },
        success: function (response) {
            // if (response == 1) {
            //     alert('Rate success');
            //     window.location.reload();
            // } else {
            //     alert('Rate fail');
            // }
            console.log(response);
        }
    });
}