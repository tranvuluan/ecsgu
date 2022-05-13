$(document).ready(function() {
    $('#id_supplier').DataTable();
} );

function viewToAdd() {

    $.ajax({
        url: './process/supplier-process.php',
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
    let id = $('input[name="add_Id"]').val();
    let name = $('input[name="add_name"]').val();
    let address = $('input[name="add_address"]').val();

    let txtName = document.getElementById("validationName").value.trim();
    let txtAddress = document.getElementById("validationAddress").value.trim();

    if (txtName == "" || txtAddress == "") {
        if (txtName == "") {
            document.getElementById("validationName").style.borderColor = "red";
            document.getElementById("txtName").style.display = "block";
        }
        else {
            document.getElementById("validationName").style.borderColor = "green";
            document.getElementById("txtName").style.display = "none";
        }
        if (txtAddress == "") {
            document.getElementById("validationAddress").style.borderColor = "red";
            document.getElementById("txtAddress").style.display = "block";
        }
        else {
            document.getElementById("validationAddress").style.borderColor = "green";
            document.getElementById("txtAddress").style.display = "none";
        }
    }
    else {
        $.ajax({
            url: './process/supplier-process.php',
            type: 'POST',
            data: {
                id: id,
                name: name,
                address: address,
                add: true
            },
            success: function (response) {
                console.log(response);
                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = "./nhacungcap.php";
                }
            }
        });
    }

    // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
}

function getDetail(id) {
    console.log(id);

    $.ajax({
        url: './process/supplier-process.php',
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
        url: './process/supplier-process.php',
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
    let id = $('input[name="update_Id"]').val();
    let address = $('input[name="update_address"]').val();
    let name = $('input[name="update_name"]').val();


    let txtName = document.getElementById("validationName").value.trim();
    let txtAddress = document.getElementById("validationAddress").value.trim();

    if (txtName == "" || txtAddress == "") {
        if (txtName == "") {
            document.getElementById("validationName").style.borderColor = "red";
            document.getElementById("txtName").style.display = "block";
        }
        else {
            document.getElementById("validationName").style.borderColor = "green";
            document.getElementById("txtName").style.display = "none";
        }
        if (txtAddress == "") {
            document.getElementById("validationAddress").style.borderColor = "red";
            document.getElementById("txtAddress").style.display = "block";
        }
        else {
            document.getElementById("validationAddress").style.borderColor = "green";
            document.getElementById("txtAddress").style.display = "none";
        }
    }
    else {

        $.ajax({
            url: './process/supplier-process.php',
            type: 'POST',
            data: {
                id: id,
                address: address,
                name: name,
                update: true
            },
            success: function (response) {
                console.log(response);
                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = "./nhacungcap.php";
                }
            }
        });
    }
    // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

}

function deleteSupplier(id) {

    console.log(id);
    $.ajax({
        url: './process/supplier-process.php',
        type: 'POST',
        data: {
            id: id,
            delete: true
        },
        success: function (response) {
            console.log(id);
            console.log(response);
            if (response == 0) {
                console.log(response);
                alert('Lỗi');
            }
            else {
                alert('Xóa thành công');
                location.reload();
            }
        }
    });
}
