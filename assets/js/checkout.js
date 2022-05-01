function checkout(){ 
    console.log('chay ham nay');
    $.ajax({
        url: 'process/checkout.php',
        type: 'POST',
        data: {
            placeOrder: true
        },
        success: function (response) {
            console.log(response);
        },
        
    })
}