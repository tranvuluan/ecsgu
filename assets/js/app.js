$(document).ready(function () {

});
console.log('load');
let userReister;

function login() {
    var username = $('#username').val().trim();
    var password = $('#password').val().trim();

    if (username == "" || password == "") {
        if (username == "") {
            document.getElementById("username").style.borderColor = "red";
            document.getElementById("username").style.marginBottom = "0px";
            document.getElementById("txtUsername").style.display = "block";
        }
        else {
            document.getElementById("username").style.borderColor = "green";
            document.getElementById("txtUsername").style.display = "none";
        }
        if (password == "") {
            document.getElementById("password").style.borderColor = "red";
            document.getElementById("password").style.marginBottom = "0px";
            document.getElementById("txtPassword").style.display = "block";
        }
        else {
            document.getElementById("password").style.borderColor = "green";
            document.getElementById("txtPassword").style.display = "none";
        }
    } else {
        $.ajax({
            url: './process/auth.php',
            type: 'POST',
            data: {
                login: true,
                username: username,
                password: password
            },
            success: function (response) {
                if(response == 1){
                    location.href = './index.php';
                }
                else if(response == 0){
                    alert('Username or password is incorrect');
                }
                else if(response == 12){
                    alert('Your user can not login');
                }

            }

        });
    }
}

function register() {
    var fullname = $('#fullname').val().trim();
    var address = $('#address').val().trim();
    var phone = $('#phone').val().trim();
    var resusername = $('#res-username').val().trim();
    var email = $('#email').val().trim();
    var respassword = $('#res-password').val().trim();
    var confirmpassword = $('#confirm-password').val().trim();

    let RegexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if (fullname == "" || address == "" || phone == "" || resusername == "" || email == "" || respassword == "" || confirmpassword == "" || !phone.match(phoneno) || !email.match(RegexEmail)) {
        if (fullname == "") {
            document.getElementById("fullname").style.borderColor = "red";
            document.getElementById("fullname").style.marginBottom = "0px";
            document.getElementById("txtFullname").style.display = "block";
        }
        else {
            document.getElementById("fullname").style.borderColor = "green";
            document.getElementById("txtFullname").style.display = "none";
        }
        if (address == "") {
            document.getElementById("address").style.borderColor = "red";
            document.getElementById("address").style.marginBottom = "0px";
            document.getElementById("txtAddress").style.display = "block";
        }
        else {
            document.getElementById("address").style.borderColor = "green";
            document.getElementById("txtAddress").style.display = "none";
        }
        if (phone == "" || !phone.match(phoneno)) {
            document.getElementById("phone").style.borderColor = "red";
            document.getElementById("phone").style.marginBottom = "0px";
            document.getElementById("txtPhone").style.display = "block";
        }
        else {
            document.getElementById("phone").style.borderColor = "green";
            document.getElementById("txtPhone").style.display = "none";
        }
        if (resusername == "") {
            document.getElementById("res-username").style.borderColor = "red";
            document.getElementById("res-username").style.marginBottom = "0px";
            document.getElementById("res-txtUsername").style.display = "block";
        }
        else {
            document.getElementById("res-username").style.borderColor = "green";
            document.getElementById("res-txtUsername").style.display = "none";
        }
        if (email == "" || !email.match(RegexEmail)) {
            document.getElementById("email").style.borderColor = "red";
            document.getElementById("email").style.marginBottom = "0px";
            document.getElementById("txtEmail").style.display = "block";
        }
        else {
            document.getElementById("email").style.borderColor = "green";
            document.getElementById("txtEmail").style.display = "none";
        }
        if (respassword == "") {
            document.getElementById("res-password").style.borderColor = "red";
            document.getElementById("res-password").style.marginBottom = "0px";
            document.getElementById("res-txtPassword").style.display = "block";
        }
        else {
            document.getElementById("res-password").style.borderColor = "green";
            document.getElementById("res-txtPassword").style.display = "none";
        }
        if (confirmpassword == "") {
            document.getElementById("confirm-password").style.borderColor = "red";
            document.getElementById("confirm-password").style.marginBottom = "0px";
            document.getElementById("txtConfirmPassword").style.display = "block";
        }
        else {
            document.getElementById("confirm-password").style.borderColor = "green";
            document.getElementById("txtConfirmPassword").style.display = "none";
        }
        if (respassword != confirmpassword) {
            document.getElementById("confirm-password").style.borderColor = "red";
            document.getElementById("confirm-password").style.marginBottom = "0px";
            document.getElementById("txtConfirmPassword").style.display = "block";
        }

    } else {
        userReister = {
            fullname: fullname,
            address: address,
            phone: phone,
            username: resusername,
            email: email,
            respassword: respassword,
            confirmpassword: confirmpassword
        }
        $.ajax({
            url: 'http://14.225.192.186:5555/api/authSendMail',
            type: 'POST',
            data: {
                username: userReister.username,
                email: userReister.email
            },
            success: function (response) {
                console.log(response)
                $('#verifymail')[0].click();
            }

        });
    }
}




function logout() {
    console.log('clic')
    $.ajax({
        url: './process/auth.php',
        type: 'POST',
        data: {
            logout: true
        },
        success: function (response) {
            console.log(response)
            if (response == 0) {
                console.log(response);
            }
            else {
                window.location.href = "./index.php";
            }
        }
    });
}

function resendEmail() {
    $.ajax({
        url: 'http://14.225.192.186:5555/api/authSendMail',
        type: 'POST',
        data: {
            username: userReister.username,
            email: userReister.email
        },
        success: function (response) {
            console.log(response)
        }

    });
}

function verifyEmail() {
    let registerCode = $('input[name="registerCode"]').val().trim();
    $.ajax({
        url: 'http://14.225.192.186:5555/api/verifyEmail',
        type: 'POST',
        data: {
            username: userReister.username,
            email: userReister.email,
            phone: userReister.phone,
            address: userReister.address,
            fullname: userReister.fullname,
            respassword: userReister.respassword,
            registerCode: registerCode
        },
        success: function (response) {
            $.ajax({
                url: './process/auth.php',
                type: 'POST',
                data: {
                    username: userReister.username,
                    email: userReister.email,
                    phone: userReister.phone,
                    address: userReister.address,
                    fullname: userReister.fullname,
                    respassword: userReister.respassword,
                    register: true,
                },
                success: function (response1) {
                    console.log(response1);
                    if (response1 == 1) {
                        location.href = './login.php'
                    }
                    else {
                        console.log('fail');
                        console.log(response1);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
            console.log(response)
            alert(response.message);
            location.reload();
        },
        error: function (response) {
            console.log(response);
            alert(response.responseJSON.message);
        }

    });
}

function viewDetailModal(id){
    event.preventDefault();
    $.ajax({
        url: './process/product_detail_modal.php',
        type: 'POST',
        data: {
            id_product: id,
            viewDetailModal: true,
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">' + data + ' </div>').modal());
            // console.log(data);
        }
    });
}


function searchFromNavbar() {
    let search = $('#searchFromNavbar').val().trim();
    location.href = './categories.php?search=' + search;
}
