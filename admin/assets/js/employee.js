function viewToAdd() {
    $.ajax({
        url: './process/employee.php',
        type: 'POST',
        data: {
            viewToAdd: true
        },

        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    });
}

function add() {
    event.preventDefault();
    let id = $('input[name="employeeId"]').val().trim();
    let gender = $('select[name="gender"] option:selected').val().trim();
    let birthday = $('input[name="birthday"]').val().trim();
    let cmnd = $('input[name="cmnd"]').val().trim();
    let name = $('input[name="employeeName"]').val().trim();
    let email = $('input[name="email"]').val().trim();
    let address = $('input[name="address"]').val().trim();
    let phone = $('input[name="phone"]').val().trim();
    let position = $('select[name="position"] option:selected').val().trim();

    let username = $('input[name="username"]').val().trim();
    let password = $('input[name="password"]').val().trim();
    let confirm_password = $('input[name="confirm_password"]').val().trim();
    let status = $('input[name="status"]:checked').val(); // 1==active, 0==lock

    let txtBirthday = document.getElementById("validationBirthday").value.trim();
    let txtCMND = document.getElementById("validationCMND").value.trim();
    let txtName = document.getElementById("validationName").value.trim();
    let txtEmail = document.getElementById("validationEmail").value.trim();
    let txtAddress = document.getElementById("validationAddress").value.trim();
    let txtPhone = document.getElementById("validationPhone").value.trim();
    let txtUser = document.getElementById("validationUser").value.trim();
    let txtPassword = document.getElementById("validationPassword").value.trim();
    let txtConfirmPassword = document.getElementById("validationConfirmPassword").value.trim();

    let phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    let num = /^[0-9]+$/;

    if (txtName == '' || txtBirthday == '' || txtCMND == '' || txtEmail == '' || txtAddress == '' || txtPhone == '' || txtUser == '' || txtPassword == '' || txtConfirmPassword == '' || !txtCMND.match(num) || !txtPhone.match(phoneno)) {
        if (txtName == '') {
            document.getElementById("txtName").style.display = "block";
            document.getElementById("validationName").style.borderColor = "red";
        }
        else {
            document.getElementById("txtName").style.display = "none";
            document.getElementById("validationName").style.borderColor = "green";
        }
        if (txtBirthday == '') {
            document.getElementById("txtBirthday").style.display = "block";
            document.getElementById("validationBirthday").style.borderColor = "red";
        }
        else {
            document.getElementById("txtBirthday").style.display = "none";
            document.getElementById("validationBirthday").style.borderColor = "green";
        }
        if (txtCMND == ''  || !txtCMND.match(num)) {
            document.getElementById("txtCMND").style.display = "block";
            document.getElementById("validationCMND").style.borderColor = "red";
        }
        else {
            document.getElementById("txtCMND").style.display = "none";
            document.getElementById("validationCMND").style.borderColor = "green";
        }
        if (txtEmail == '') {
            document.getElementById("txtEmail").style.display = "block";
            document.getElementById("validationEmail").style.borderColor = "red";
        }
        else {
            document.getElementById("txtEmail").style.display = "none";
            document.getElementById("validationEmail").style.borderColor = "green";
        }
        if (txtAddress == '') {
            document.getElementById("txtAddress").style.display = "block";
            document.getElementById("validationAddress").style.borderColor = "red";
        }
        else {
            document.getElementById("txtAddress").style.display = "none";
            document.getElementById("validationAddress").style.borderColor = "green";
        }
        if (txtPhone == '' || !txtPhone.match(phoneno)) {
            document.getElementById("txtPhone").style.display = "block";
            document.getElementById("validationPhone").style.borderColor = "red";
        }
        else {
            document.getElementById("txtPhone").style.display = "none";
            document.getElementById("validationPhone").style.borderColor = "green";
        }
        if (txtUser == '') {
            document.getElementById("txtUser").style.display = "block";
            document.getElementById("validationUser").style.borderColor = "red";
        }
        else {
            document.getElementById("txtUser").style.display = "none";
            document.getElementById("validationUser").style.borderColor = "green";
        }
        if (txtPassword == '') {
            document.getElementById("txtPassword").style.display = "block";
            document.getElementById("validationPassword").style.borderColor = "red";
        }
        else {
            document.getElementById("txtPassword").style.display = "none";
            document.getElementById("validationPassword").style.borderColor = "green";
        }
        if (txtConfirmPassword == '') {
            document.getElementById("txtConfirmPassword").style.display = "block";
            document.getElementById("validationConfirmPassword").style.borderColor = "red";
        }
        else {
            document.getElementById("txtConfirmPassword").style.display = "none";
            document.getElementById("validationConfirmPassword").style.borderColor = "green";
        }
    } else {
        $.ajax({
            url: './process/employee.php',
            type: 'POST',
            data: {
                id: id,
                gender: gender,
                birthday: birthday,
                cmnd: cmnd,
                name: name,
                email: email,
                address: address,
                phone: phone,
                position: position,
                username: username,
                password: password,
                confirm_password: confirm_password,
                status: status,
                add: true,
            },

            success: function (response) {

                if (response == 0) {
                    alert('Thêm thất bại');
                }
                else {
                    alert('Thêm thành công');
                    window.location.href = './nhanvien.php';
                }
            }
        });
    }
}

function getDetail(id) {
    console.log(id);

    $.ajax({
        url: './process/employee.php',
        type: 'POST',
        data: {
            id: id,
            view: true
        },

        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    });
}

function viewToUpdate(id) {
    console.log(id);

    $.ajax({
        url: './process/employee.php',
        type: 'POST',
        data: {
            id: id,
            viewToUpdate: true
        },

        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    });
}

function update() {
    event.preventDefault();
    let id = $('input[name="employeeId"]').val().trim();
    let gender = $('select[name="gender"] option:selected').val().trim();
    let birthday = $('input[name="birthday"]').val().trim();
    let cmnd = $('input[name="cmnd"]').val().trim();
    let name = $('input[name="employeeName"]').val().trim();
    let email = $('input[name="email"]').val().trim();
    let address = $('input[name="address"]').val().trim();
    let phone = $('input[name="phone"]').val().trim();
    let position = $('select[name="position"] option:selected').val().trim();
    let status = $('input[name="status"]:checked').val().trim();
    let username = $('input[name="username"]').val().trim();
    // let password = $('input[name="password"]').val().trim();
    // let confirm_password = $('input[name="confirm_password"]').val().trim();

    let txtBirthday = document.getElementById("validationBirthday").value.trim();
    let txtCMND = document.getElementById("validationCMND").value.trim();
    let txtName = document.getElementById("validationName").value.trim();
    let txtEmail = document.getElementById("validationEmail").value.trim();
    let txtAddress = document.getElementById("validationAddress").value.trim();
    let txtPhone = document.getElementById("validationPhone").value.trim();
    let txtUser = document.getElementById("validationUser").value.trim();
    // let txtPassword = document.getElementById("validationPassword").value.trim();
    // let txtConfirmPassword = document.getElementById("validationConfirmPassword").value.trim();

    let phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    let num = /^[0-9]+$/;


    if (txtName == '' || txtBirthday == '' || txtCMND == '' || txtEmail == '' || txtAddress == '' || txtPhone == '' || txtUser == '' || !txtPhone.match(phoneno) || !txtCMND.match(num)) {
        if (txtName == '') {
            document.getElementById("txtName").style.display = "block";
            document.getElementById("validationName").style.borderColor = "red";
        }
        else {
            document.getElementById("txtName").style.display = "none";
            document.getElementById("validationName").style.borderColor = "green";
        }
        if (txtBirthday == '') {
            document.getElementById("txtBirthday").style.display = "block";
            document.getElementById("validationBirthday").style.borderColor = "red";
        }
        else {
            document.getElementById("txtBirthday").style.display = "none";
            document.getElementById("validationBirthday").style.borderColor = "green";
        }
        if (txtCMND == '' || !txtCMND.match(num)) {
            document.getElementById("txtCMND").style.display = "block";
            document.getElementById("validationCMND").style.borderColor = "red";
        }
        else {
            document.getElementById("txtCMND").style.display = "none";
            document.getElementById("validationCMND").style.borderColor = "green";
        }
        if (txtEmail == '') {
            document.getElementById("txtEmail").style.display = "block";
            document.getElementById("validationEmail").style.borderColor = "red";
        }
        else {
            document.getElementById("txtEmail").style.display = "none";
            document.getElementById("validationEmail").style.borderColor = "green";
        }
        if (txtAddress == '') {
            document.getElementById("txtAddress").style.display = "block";
            document.getElementById("validationAddress").style.borderColor = "red";
        }
        else {
            document.getElementById("txtAddress").style.display = "none";
            document.getElementById("validationAddress").style.borderColor = "green";
        }
        if (txtPhone == '' || !txtPhone.match(phoneno)) {
            document.getElementById("txtPhone").style.display = "block";
            document.getElementById("validationPhone").style.borderColor = "red";
        }
        else {
            document.getElementById("txtPhone").style.display = "none";
            document.getElementById("validationPhone").style.borderColor = "green";
        }
        if (txtUser == '') {
            document.getElementById("txtUser").style.display = "block";
            document.getElementById("validationUser").style.borderColor = "red";
        }
        else {
            document.getElementById("txtUser").style.display = "none";
            document.getElementById("validationUser").style.borderColor = "green";
        }

    } else {

        $.ajax({
            url: './process/employee.php',
            type: 'POST',
            data: {
                id: id,
                gender: gender,
                birthday: birthday,
                cmnd: cmnd,
                name: name,
                email: email,
                address: address,
                phone: phone,
                position: position,
                username: username,
                status: status,
                update: true,
            },
            success: function (response) {
                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = './nhanvien.php';
                }
            }
        });
    }
}
