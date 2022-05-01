function viewOrderDetail(id_order){
    console.log(id_order);
    $.ajax({
        url: './process/account.php',
        type: 'POST',
        data: {
            id_order: id_order,
            viewOrderDetail: true
        },
        success: function(data){
            // console.log(data);
            // alert(data);
            
            $('#switchModal').html($('<div class="modal fade">' +data+' </div>').modal());
            console.log('run this');
        }
    });
}


function viewToUpdate(id_customer){
    console.log(id_customer);
    $.ajax({
        url: './process/account.php',
        type: 'POST',
        data: {
            id_customer: id_customer,
            viewToUpdate: true
        },
        success: function(data) {
            console.log(data);
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    });
}
function update(){
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
        success: function(response){
            console.log(response);
            if(response == 0){
                alert('Update success');
                window.location.href = './../my-account.php';
            }else{
                alert('Update fail');
            }
        }
    
    });
}