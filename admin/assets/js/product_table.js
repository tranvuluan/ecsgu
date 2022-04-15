function getDetail(id){
    $.ajax({
        url: './process/product_table.php',
        type: 'POST',
        data: {
            id: id,
            view: true,
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}