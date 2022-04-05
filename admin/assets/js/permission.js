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
        url: './process/modal_add_position.php',
        type: 'GET',
        success: function (data) {
            $('#modal_add_position').html(data);
        }
    });
}