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