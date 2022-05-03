function checkout(){ 
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
                alert('Đặt hàng thành công!');
            } else {
                alert('Lỗi!');
                failPlaceOrder();
            }
        },
        
    })
}


