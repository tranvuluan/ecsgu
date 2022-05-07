$(document).ready(function() {
    $('#id_voucher').DataTable();
} );

function viewToAdd() {

    $.ajax({
        url: './process/khuyenmai.php',
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
    let id = $('input[name="voucherId"]').val().trim();
    let code = $('input[name="code"]').val().trim();
    let discount = $('input[name="discount"]').val().trim();
    let startdate = $('input[name="startdate"]').val().trim();
    let enddate = $('input[name="enddate"]').val().trim();

    let txtCode = document.getElementById("validationCode").value.trim();
    let txtDiscount = document.getElementById("validationDiscount").value.trim();
    let txtStartdate = document.getElementById("validationStartdate").value.trim();
    let txtEnddate = document.getElementById("validationEnddate").value.trim();

    let RegexDate = /^\d{4}\-\d{1,2}\-\d{1,2}$/;

    if (txtCode == "" || txtDiscount == "" || txtStartdate == "" || txtEnddate == "" || !txtStartdate.match(RegexDate) || !txtEnddate.match(RegexDate)) {
        if (txtCode == "") {
            document.getElementById("txtCode").style.display = "block";
            document.getElementById("validationCode").style.borderColor = "red";
        } else {
            document.getElementById("txtCode").style.display = "none";
            document.getElementById("validationCode").style.borderColor = "green";
        }
        if (txtDiscount == "") {
            document.getElementById("txtDiscount").style.display = "block";
            document.getElementById("validationDiscount").style.borderColor = "red";
        }
        else {
            document.getElementById("txtDiscount").style.display = "none";
            document.getElementById("validationDiscount").style.borderColor = "green";
        }
        if (txtStartdate == "" || !txtStartdate.match(RegexDate)) {
            document.getElementById("txtStartdate").style.display = "block";
            document.getElementById("validationStartdate").style.borderColor = "red";
        }
        else {
            document.getElementById("txtStartdate").style.display = "none";
            document.getElementById("validationStartdate").style.borderColor = "green";
        }
        if (txtEnddate == "" || !txtEnddate.match(RegexDate)) {
            document.getElementById("txtEnddate").style.display = "block";
            document.getElementById("validationEnddate").style.borderColor = "red";
        }
        else {
            document.getElementById("txtEnddate").style.display = "none";
            document.getElementById("validationEnddate").style.borderColor = "green";
        }
    }
    else {
        $.ajax({
            url: './process/khuyenmai.php',
            type: 'POST',
            data: {
                id: id,
                code: code,
                discount: discount,
                startdate: startdate,
                enddate: enddate,
                add: true
            },
            success: function (response) {
                console.log(response);
                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = "./khuyenmai.php";
                }
            }
        });
    }

    // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

}

function getDetail(id) {
    console.log(id);

    $.ajax({
        url: './process/khuyenmai.php',
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
        url: './process/khuyenmai.php',
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
    let id = $('input[name="voucherId"]').val().trim();
    let code = $('input[name="code"]').val().trim();
    let discount = $('input[name="discount"]').val().trim();
    let startdate = $('input[name="startdate"]').val().trim();
    let enddate = $('input[name="enddate"]').val().trim();

    let txtCode = document.getElementById("validationCode").value.trim();
    let txtDiscount = document.getElementById("validationDiscount").value.trim();
    let txtStartdate = document.getElementById("validationStartdate").value.trim();
    let txtEnddate = document.getElementById("validationEnddate").value.trim();
    if (txtCode == "" || txtDiscount == "" || txtStartdate == "" || txtEnddate == "") {
        if (txtCode == "") {
            document.getElementById("txtCode").style.display = "block";
            document.getElementById("validationCode").style.borderColor = "red";
        } else {
            document.getElementById("txtCode").style.display = "none";
            document.getElementById("validationCode").style.borderColor = "green";
        }
        if (txtDiscount == "") {
            document.getElementById("txtDiscount").style.display = "block";
            document.getElementById("validationDiscount").style.borderColor = "red";
        }
        else {
            document.getElementById("txtDiscount").style.display = "none";
            document.getElementById("validationDiscount").style.borderColor = "green";
        }
        if (txtStartdate == "") {
            document.getElementById("txtStartdate").style.display = "block";
            document.getElementById("validationStartdate").style.borderColor = "red";
        }
        else {
            document.getElementById("txtStartdate").style.display = "none";
            document.getElementById("validationStartdate").style.borderColor = "green";
        }
        if (txtEnddate == "") {
            document.getElementById("txtEnddate").style.display = "block";
            document.getElementById("validationEnddate").style.borderColor = "red";
        }
        else {
            document.getElementById("txtEnddate").style.display = "none";
            document.getElementById("validationEnddate").style.borderColor = "green";
        }
    }
    else {
        // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

        $.ajax({
            url: './process/khuyenmai.php',
            type: 'POST',
            data: {
                id: id,
                code: code,
                discount: discount,
                startdate: startdate,
                enddate: enddate,
                update: true
            },
            success: function (response) {
                console.log(response);
                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = "./khuyenmai.php";
                }
            }
        });
    }
}

function deleteVoucher(id) {

    console.log(id);
    $.ajax({
        url: './process/khuyenmai.php',
        type: 'POST',
        data: {
            id: id,
            delete: true
        },
        success: function (response) {
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


