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

function orderProcess() {
    event.preventDefault();
    let id = $('#orderId').val();
    $.ajax({
        url: './process/order.php',
        type: 'POST',
        data: {
            id: id,
            process: true,
        },
        success: function (response) {
            if (response == 1) {
                alert('Order Processed');
                $('#switchModel').modal('hide');
                location.reload();
            }
        }
    });
}

function orderComplete() {
    event.preventDefault();
    let id = $('#orderId').val();
    $.ajax({
        url: './process/order.php',
        type: 'POST',
        data: {
            id: id,
            complete: true,
        },
        success: function (response) {
            if (response == 1) {
                alert('Order Completed');
                $('#switchModel').modal('hide');
                location.reload();
            }
        }
    });
}