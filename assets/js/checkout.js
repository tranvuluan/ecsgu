function checkout(){ 
    $('#loadingModal').modal('show');
    $.ajax({
        url: 'process/checkout.php',
        type: 'POST',
        data: {
            placeOrder: true,
            fullname: $('input[name="firstname"')[0].value,
            phone: $('input[name="phone"')[0].value,
            address: $('input[name="address"')[0].value,
            email: $('input[name="email"')[0].value,
            country: $('select[name="country"')[0].value
        },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                $('#loadingModal').modal('hide');
                alert('Đặt hàng thành công!');
            } else {
                $('#loadingModal').modal('hide');
                alert('Lỗi!');
            }
        },
        
    })
}

