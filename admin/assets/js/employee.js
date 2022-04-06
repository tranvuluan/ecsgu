function viewToAdd(){
    $.ajax({
        url: './process/employee.php',
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
    let id = $('input[name="employeeId"]').val();
    let gender = $('select[name="gender"] option:selected').val();
    let birthday = $('input[name="birthday"]').val();
    let cmnd = $('input[name="cmnd"]').val();
    let name = $('input[name="employeeName"]').val();
    let email = $('input[name="email"]').val();
    let address = $('input[name="address"]').val();
    let phone = $('input[name="phone"]').val();
    let position = $('select[name="position"] option:selected').val();

    let username = $('input[name="username"]').val();
    let password = $('input[name="password"]').val();
    let confirmPassword = $('input[name="confirmPassword"]').val();

    $.ajax({
        url: './process/employee.php',
        type: 'POST',
        data: {
            id: id,
            gender : gender,
            birthday : birthday,
            cmnd : cmnd,
            name : name,
            email : email,
            address : address,
            phone : phone,
            position : position,
            username : username,
            password : password,
            confirmPassword : confirmPassword,
            add: true,
        },

        success: function(response) {
            console.log(response)
        }
    });
}