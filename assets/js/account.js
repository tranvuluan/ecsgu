function viewAccountToUpdate($id_cus){
    console.log($id_cus);
    $.ajax({
        url: './../process-account.php',
        type: 'POST',
        data: {
            id_cus: $id_cus,
            viewToUpdate: true
        },
        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}
function update(){
    event.preventDefault();
    let id_cus = $('input[name="id_cus"]').val();
    let id_acc = $('input[name="id_acc"]').val();
    let createDate = $('input[name="create-date"]').val();
    let point = $('input[name="point"]').val();
    let name = $('input[name="full-name"]').val();
    let address = $('input[name="address"]').val();
    let email = $('input[name="email"]').val();
    let phone = $('input[name="phone"]').val();
    $.ajax({
        url: './../process-account.php',
        type: 'POST',
        data: {
            id_cus: id_cus,
            id_acc: id_acc,
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
                window.location.href = './my-account.php';
            }else{
                alert('Update fail');
            }
        }
    
    });
}