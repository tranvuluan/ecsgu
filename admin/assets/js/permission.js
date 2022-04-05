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