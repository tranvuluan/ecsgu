function viewToAdd(){
    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            viewToAdd: true
        },

        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}

function add(){
    event.preventDefault();
    let customerId = $('input[name="customerId"]').val();
    let phone = $('input[name="phone"]').val();
    let customerName = $('input[name="customerName"]').val();
    let email = $('input[name="email"]').val();
    let address = $('input[name="address"]').val();
    let point = $('input[name="point"]').val();
    let createDate = $('input[name="createDate"]').val();

    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            customerId: customerId,
            phone : phone,
            customerName : customerName,
            email : email,
            address : address,
            point : point,
            createDate : createDate,
            add: true
        },
        success: function(response){
            console.log(response);
        }
        
    });
}

function getDetail(id){

    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            id: id,
            view:true,
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    })
}

function viewToUpdate(id){

    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            id: id,
            viewToUpdate: true
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    })
}

function update(){
    event.preventDefault();
    let customerId = $('input[name="customerId"]').val();
    let phone = $('input[name="phone"]').val();
    let customerName = $('input[name="customerName"]').val();
    let email = $('input[name="email"]').val();
    let address = $('input[name="address"]').val();
    let point = $('input[name="point"]').val();
    let createDate = $('input[name="createDate"]').val();

    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            customerId: customerId,
            phone : phone,
            customerName : customerName,
            email : email,
            address : address,
            point : point,
            createDate : createDate,
            update: true
        },
        success: function(response){
            if(response == 0){
                alert('Update success');
                location.reload();
            }
            else{
                alert('Update fail');
            }
        }
        
    });
}

function deleteCustomer(id){
    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            id: id,
            delete: true
        },
        success: function(response){

            if(response == 0){
                alert('Delete success');
                location.reload();
            }
            else{
                alert('Delete fail');
            }
        }
        
    });
}