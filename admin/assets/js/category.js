// Danh muc me

$(document).ready(function () {
    $('#id_category').DataTable();
});
function viewToAdd() {
    $.ajax({
        url: './process/category-process.php',
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
    let id = $('input[name="add_idCate"]').val();
    let name = $('input[name="add_nameCate"]').val();

    let txtName = document.getElementById("validationName").value.trim();
    if (txtName == "") {
        document.getElementById("validationName").style.borderColor = "red";
        document.getElementById("txtName").style.display = "block";
    }
    else {
        $.ajax({
            url: './process/category-process.php',
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
                    window.location.href = "./danhmucsp.php";
                }
            }
        });
    }
}



function viewToUpdate(id) {
    console.log(id);

    $.ajax({
        url: './process/category-process.php',
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
    let id = $('input[name="update_idCate"]').val();
    let name = $('input[name="update_nameCate"]').val();

    let txtName = document.getElementById("validationName").value.trim();
    if (txtName == "") {
        document.getElementById("validationName").style.borderColor = "red";
        document.getElementById("txtName").style.display = "block";
    }
    else {
        // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

        $.ajax({
            url: './process/category-process.php',
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
                    window.location.href = "./danhmucsp.php";
                }
            }
        });
    }
}

function deleteCategory(id) {

    console.log(id);
    $.ajax({
        url: './process/category-process.php',
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

function getCategoryChild(id_category) {
    $.ajax({
        url: './process/category-process.php',
        type: 'GET',
        data: {
            getCategoryChild: true,
            id_category: id_category
        },
        success: function (response) {
            $('#tbody_categorychild').html(response); //innerHtml   
        }
    });
}

// end danh muc mẹ

// start danh mục con
function viewToAddChild() {
    $.ajax({
        url: './process/category-process.php',
        type: 'POST',
        data: {
            viewToAddChild: true
        },

        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    });
}
function addChild() {
    event.preventDefault();
    let sub_id = $('input[name="add_idCateChild"]').val();
    let id = $('#add_idCateMom option:selected').val();
    let name = $('input[name="add_nameCateChild"]').val();

    let txtName = document.getElementById("validationName").value.trim();
    if (txtName == "") {
        document.getElementById("validationName").style.borderColor = "red";
        document.getElementById("txtName").style.display = "block";
    }
    else {
        $.ajax({
            url: './process/category-process.php',
            type: 'POST',
            data: {
                sub_id: sub_id,
                id: id,
                name: name,
                addChild: true
            },
            success: function (response) {
                console.log(response);

                if (response == 0) {
                    console.log(response);
                }
                else {

                    // console.log(response);
                    window.location.href = "./danhmucsp.php";
                }
            }
        });
    }
}

function viewToUpdateChild(sub_id) {
    console.log(sub_id);

    $.ajax({
        url: './process/category-process.php',
        type: 'POST',
        data: {
            sub_id: sub_id,
            viewToUpdateChild: true
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    });
}

function updateChild() {
    event.preventDefault();
    let sub_id = $('input[name="update_idCateChild"]').val();
    let id = $('#update_idCateMom option:selected').val();
    let name = $('input[name="update_nameCateChild"]').val();

    let txtName = document.getElementById("validationName").value.trim();
    if (txtName == "") {
        document.getElementById("validationName").style.borderColor = "red";
        document.getElementById("txtName").style.display = "block";
    }
    else {

        // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

        $.ajax({
            url: './process/category-process.php',
            type: 'POST',
            data: {
                sub_id: sub_id,
                id: id,
                name: name,
                updateChild: true
            },
            success: function (response) {
                console.log(response);
                console.log(sub_id);
                console.log(id);
                console.log(name);
                if (response == 0) {
                    console.log(response);
                }
                else {
                    window.location.href = "./danhmucsp.php";
                }
            }
        });
    }
}

function deleteCategoryChild(sub_id) {

    $.ajax({
        url: './process/category-process.php',
        type: 'POST',
        data: {
            sub_id: sub_id,
            deleteChild: true
        },
        success: function (response) {
            console.log(response);
            // console.log(sub_id);
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
// end danh mục con

