$(document).ready(function() {
    $('#id_customer').DataTable();
} );

function viewToAdd() {
    $.ajax({
        url: './process/customer.php',
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
            phone: phone,
            customerName: customerName,
            email: email,
            address: address,
            point: point,
            createDate: createDate,
            add: true
        },
        success: function (response) {
            console.log(response);
        }

    });
}

function getDetail(id) {

    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            id: id,
            view: true,
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    })
}

function viewToUpdate(id) {

    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            id: id,
            viewToUpdate: true
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    })
}

function update() {
    event.preventDefault();
    let customerId = $('input[name="customerId"]').val().trim();
    let phone = $('input[name="phone"]').val().trim();
    let customerName = $('input[name="customerName"]').val().trim();
    let email = $('input[name="email"]').val().trim();
    let address = $('input[name="address"]').val().trim();
    let point = $('input[name="point"]').val().trim();
    let createDate = $('input[name="createDate"]').val().trim();

    let txtPhone = document.getElementById("validationPhone").value.trim();
    let txtCreatedate = document.getElementById("validationCreatedate").value.trim();
    let txtName = document.getElementById("validationName").value.trim();
    let txtEmail = document.getElementById("validationEmail").value.trim();
    let txtAddress = document.getElementById("validationAddress").value.trim();
    let txtPoint = document.getElementById("validationPoint").value.trim();


    let phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    let RegexDate = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
    let RegexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (txtPhone == "" || txtCreatedate == "" || txtName == "" || txtEmail == "" || txtAddress == "" || txtPoint == "" || !txtPhone.match(phoneno) || !txtCreatedate.match(RegexDate) || !txtEmail.match(RegexEmail)) 
    {
        if (txtPhone == "" || !txtPhone.match(phoneno)) {
            document.getElementById("validationPhone").style.borderColor = "red";
            document.getElementById("txtPhone").style.display = "block";
        }
        else {
            document.getElementById("validationPhone").style.borderColor = "green";
            document.getElementById("txtPhone").style.display = "none";
        }
        if (txtCreatedate == "" || !txtCreatedate.match(RegexDate)) {
            document.getElementById("validationCreatedate").style.borderColor = "red";
            document.getElementById("txtCreatedate").style.display = "block";
        }
        else {
            document.getElementById("validationCreatedate").style.borderColor = "green";
            document.getElementById("txtCreatedate").style.display = "none";
        }
        if (txtName == "") {
            document.getElementById("validationName").style.borderColor = "red";
            document.getElementById("txtName").style.display = "block";
        }
        else {
            document.getElementById("validationName").style.borderColor = "green";
            document.getElementById("txtName").style.display = "none";
        }
        if (txtEmail == "" || !txtEmail.match(RegexEmail)) {
            document.getElementById("validationEmail").style.borderColor = "red";
            document.getElementById("txtEmail").style.display = "block";
        }
        else {
            document.getElementById("validationEmail").style.borderColor = "green";
            document.getElementById("txtEmail").style.display = "none";
        }
        if (txtAddress == "") {
            document.getElementById("validationAddress").style.borderColor = "red";
            document.getElementById("txtAddress").style.display = "block";
        }
        else {
            document.getElementById("validationAddress").style.borderColor = "green";
            document.getElementById("txtAddress").style.display = "none";
        }
        if (txtPoint == "") {
            document.getElementById("validationPoint").style.borderColor = "red";
            document.getElementById("txtPoint").style.display = "block";
        }
        else {
            document.getElementById("validationPoint").style.borderColor = "green";
            document.getElementById("txtPoint").style.display = "none";
        }
    } else {
        $.ajax({
            url: './process/customer.php',
            type: 'POST',
            data: {
                customerId: customerId,
                phone: phone,
                customerName: customerName,
                email: email,
                address: address,
                point: point,
                createDate: createDate,
                update: true
            },
            success: function (response) {
                if (response == 0) {
                    alert('Update success');
                    location.reload();
                }
                else {
                    alert('Update fail');
                }
            }

        });
    }
}

function deleteCustomer(id) {
    $.ajax({
        url: './process/customer.php',
        type: 'POST',
        data: {
            id: id,
            delete: true
        },
        success: function (response) {

            if (response == 0) {
                alert('Delete success');
                location.reload();
            }
            else {
                alert('Delete fail');
            }
        }

    });
}