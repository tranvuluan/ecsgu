$(document).ready(function() {
    $('#id_order').DataTable();
} );

function getDetail(id) {
    $.ajax({
        url: './process/order.php',
        type: 'POST',
        data: {
            id: id,
            view: true,
        },
        success: function (data) {
            $('#switchModel').html($('<div class="modal fade">' + data + '</div>').modal());
        }
    });
}


function getDetailOrderItem(id) {
    $.ajax({
        url: './process/order.php',
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

function orderProcess(id) {
    event.preventDefault();
    let spinnerHtml = spinner();
    document.getElementById('elementButton').innerHTML = spinnerHtml;
    $.ajax({
        url: './process/order.php',
        type: 'POST',
        data: {
            id_order: id,
            process: true,
        },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                alert('Order Processed');
                $('#switchModel').modal('hide');
                location.reload();
            }
        }
    });
}

function orderComplete(id_order) {
    event.preventDefault();
    let spinnerHtml = spinner();
    document.getElementById('elementButton').innerHTML = spinnerHtml;
    $.ajax({
        url: './process/order.php',
        type: 'POST',
        data: {
            id_order: id_order,
            complete: true,
        },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                alert('Order Completed');
                $('#switchModel').modal('hide');
                location.reload();
            }
        }
    });
}

function cancelOrder(id) {
    event.preventDefault();
    document.getElementById("OrderRemove").style.display = "block";
    let txtReason = $('#txtReason').val();
    if (txtReason == '') {
        alert('Please enter your reason');
    }
    else {
        $.ajax({
            url: './process/order.php',
            type: 'POST',
            data: {
                id: id,
                reason: txtReason,
                cancelOrder: true,
            },
            success: function (response) {
                if (response == 1) {
                    alert('Order Canceled');
                    $('#switchModel').modal('hide');
                    location.reload();
                }
            }
        });
    }

}

function spinner() {
    let html = '<div class="spinner-border" role="status">' +
                '<span class="sr-only">Loading...</span>' +
                '</div>';
    return html;
}