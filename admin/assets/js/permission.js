function getPersition(id_position) {
    $.ajax({
        url: './process/permisstion.php',
        type: 'GET',
        data: {id_position: id_position},
        success: function (data) {
            $('#permission').html(data);
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


function addPosition() {
    event.preventDefault();
    let id_position = $('input[name="add_id_position"]').val();
    let name_position = $('input[name="add_name_position"]').val();
    let checkbox = document.querySelectorAll('input[name="checkboxAdd[]"]');
    let permissions = [];
    checkbox.forEach(item => {
        let permissionObj = {
            id_permission: item.value,
            isChecked: item.checked ? 1 : 0
        };
        permissions.push(permissionObj);
    });
    $.ajax({
        url: './process/permission.php',
        type: 'POST',
        data: {
            add_position: true,
            id_posision: id_position,
            name_position: name_position,
            permissions: permissions
        },
        success: function (data) {
            console.log(data);
            // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}