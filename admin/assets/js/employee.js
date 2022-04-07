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
    let confirm_password = $('input[name="confirm_password"]').val();
    let status = $('input[name="status"]:checked').val(); // 1==active, 0==lock

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
            confirm_password : confirm_password,
            status : status,
            add: true,
        },

        success: function(response) {
            // console.log(response);
            if(response == 0){
                alert('Thêm thất bại');
            }
            else{
                alert('Thêm thành công');
                window.location.href = './nhanvien.php';
            }
        }
    });
}

function getDetail(id){
    console.log(id);

    $.ajax({
        url: './process/employee.php',
        type: 'POST',
        data: {
            id: id,
            view: true
        },

        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}

function viewToUpdate(id){
    console.log(id);

    $.ajax({
        url: './process/employee.php',
        type: 'POST',
        data: {
            id: id,
            viewToUpdate: true
        },

        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}

function update(){
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
    let status = $('input[name="status"]:checked').val();
    let username = $('input[name="username"]').val();
    let password = $('input[name="password"]').val();
    let confirm_password = $('input[name="confirm_password"]').val();

// console.log(status);

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
            confirm_password : confirm_password,
            status : status,
            update: true,
        },
        success: function(response) {
            if(response == 0){
                console.log(response);
            }
            else{
                window.location.href = './nhanvien.php';
            }
        }
    });
}
