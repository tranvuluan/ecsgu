$(document).ready(function() {
    $('#id_permission').DataTable();
} );

function getPermissionByPositionId(id_position) {
    $.ajax({
        url: './process/permission.php',
        type: 'GET',
        data: {
            get_permission: true,
            id_position: id_position
        },
        success: function (data) {
            $('#list-permission').html(data);
        }
    });
}

function deletePosition(id_position) {
    $.ajax({
        url: './process/permission.php',
        type: 'POST',
        data: {
            delete_position: true,
            id_position: id_position
        },
        success: function (data) {
            if (data == 1){
                alert('Xóa thành công');
                location.reload();
            } else {
                alert('Thất bại');
            }
        }
    });
}


function getModalAddPosition() {
    $.ajax({
        url: './process/permission.php',
        type: 'GET',
        data: {
            get_modal_add_position: true
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}

function getModalUpdatePosition(id_position) {
    $.ajax({
        url: './process/permission.php',
        type: 'GET',
        data: {
            get_modal_update_position: true,
            id_position: id_position
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}


function addPosition() {
    event.preventDefault();
    let id_position = $('input[name="add_id_position"]').val();
    let name_position = $('input[name="add_name_position"]').val();
    let checkbox = document.querySelectorAll('input[name="checkboxAdd[]"]');
    let permissions = [];
    let date = new Date();
    checkbox.forEach(item => {
        let permissionObj = {
            id_permission: item.value,
            isChecked: item.checked ? 1 : 0
        };
        console.log(permissionObj);
        permissions.push(permissionObj);
    });
    // console.log(permissions);
    $.ajax({
        url: './process/permission.php',
        type: 'POST',
        data: {
            add_position: true,
            id_position: id_position,
            name_position: name_position,
            permissions: permissions
        },
        success: function (data) {
            if (data == 1){
            alert('Thêm chức vụ thành công!');
            location.reload();
            } else {
                alert('Thêm thất bại!');
            }
        }
    });
}

function updatePosition(id_position) {
    event.preventDefault();
    // let id_position = $('input[name="add_id_position"]').val();
    let name_position = $('input[name="add_name_position"]').val();
    let checkbox = document.querySelectorAll('input[name="checkboxAdd[]"]');
    let permissions = [];
    let date = new Date();
    checkbox.forEach(item => {
        let permissionObj = {
            id_permission: item.value,
            isChecked: item.checked ? 1 : 0
        };
        console.log(permissionObj);
        permissions.push(permissionObj);
    });
    // console.log(permissions);
    $.ajax({
        url: './process/permission.php',
        type: 'POST',
        data: {
            update_position: true,
            id_position: id_position,
            name_position: name_position,
            permissions: permissions
        },
        success: function (data) {
            console.log(data);
            if (data == 1){
            alert('Cập nhật chức vụ thành công!');
            location.reload();
            } else {
                alert('Chức vụ thất bại!');
            }
        }
    });
}