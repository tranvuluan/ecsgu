$(document).ready(function() {
    $('#id_brand').DataTable();
} );

function viewToAdd() {

    $.ajax({
        url: './process/brand-process.php',
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
    let id = $('input[name="add_Id"]').val().trim();
    let name = $('input[name="add_name"]').val().trim();

    let txtName = document.getElementById("validationName").value.trim();
    if (txtName == "") {
        document.getElementById("validationName").style.borderColor = "red";
        document.getElementById("txtName").style.display = "block";
    }
    else {
        $.ajax({
            url: './process/brand-process.php',
            type: 'POST',
            data: {
                id: id,
                name: name,
                add: true
            },
            success: function (response) {
                console.log(response);

                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = "./brand.php";
                }
            }
        });
    }
}

function getDetail(id) {
    console.log(id);

    $.ajax({
        url: './process/brand-process.php',
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
        url: './process/brand-process.php',
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
    let name = $('input[name="update_name"]').val();

    let txtName = document.getElementById("validationName").value.trim();
    if (txtName == "") {
        document.getElementById("validationName").style.borderColor = "red";
        document.getElementById("txtName").style.display = "block";
    }
    else {

        $.ajax({
            url: './process/brand-process.php',
            type: 'POST',
            data: {
                id: id,
                name: name,
                update: true
            },
            success: function (response) {
                console.log(response);
                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = "./brand.php";
                }
            }
        });
    }
}

function deleteBrand(id) {

    console.log(id);
    $.ajax({
        url: './process/brand-process.php',
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
