function viewOrderDetail(id_order) {
    // console.log(id_order);
    $.ajax({
        url: './process/account.php',
        type: 'POST',
        data: {
            id_order: id_order,
            viewOrderDetail: true
        },
        success: function (data) {
            console.log(data);
            // alert(data);

            $('#switchModal').html($('<div class="modal fade">' + data + ' </div>').modal('show'));
            console.log('run this');
        }
    });
}



function update() {
    event.preventDefault();
    let id_customer = $('input[name="id_customer"]').val();
    let id_acccount = $('input[name="id_acccount"]').val();
    let createDate = $('input[name="create-date"]').val();
    let point = $('input[name="point"]').val();
    let name = $('input[name="full-name"]').val();
    let address = $('input[name="address"]').val();
    let email = $('input[name="email"]').val();
    let phone = $('input[name="phone"]').val();
    $.ajax({
        url: './../process/account.php',
        type: 'POST',
        data: {
            id_customer: id_customer,
            id_acccount: id_acccount,
            createDate: createDate,
            point: point,
            name: name,
            address: address,
            email: email,
            phone: phone,
            update: true
        },
        success: function (response) {
            console.log(response);
            if (response == 0) {
                alert('Update success');
                window.location.href = './../my-account.php';
            } else {
                alert('Update fail');
            }
        }

    });
}

function getDetailOrderItem(id) {
    $.ajax({
        url: './process/account.php',
        type: 'POST',
        data: {
            id: id,
            viewOrderItem: true,
        },
        success: function (data) {
            $('#viewOrderItem').html(data);
        }
    });
}

function cancelOrder(id_order) {
    let reason = $('#reasonCancel').val();
    if (reason == '') {
        alert('Please choose a reason');
        return;
    }

    let spinnerHtml = spinner();
    document.getElementById('elementButton').innerHTML = spinnerHtml;

    $.ajax({
        url: './process/account.php',
        type: 'POST',
        data: {
            id_order: id_order,
            reason: reason,
            cancelOrder: true,
        },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                alert('Cancel success');
                location.reload();
            } else {
                alert('Cancel fail');
                location.reload();
            }
        }
    });
}

function rateProduct(sku) {
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
        url: './process/account.php',
        type: 'POST',
        data: {
            sku: sku,
            rateProduct: rateProduct,
            star: star,
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

function spinner() {
    let html = '<div class="spinner-border" role="status">' +
                '<span class="sr-only">Loading...</span>' +
                '</div>';
    return html;
}