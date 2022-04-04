function viewToAdd(){
    $.ajax({
        url: './process/employee.php',
        type: 'POST',
        data: {
            viewToAdd: true
        },
        
        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}