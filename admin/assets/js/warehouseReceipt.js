function viewToAdd(){
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
            viewToAdd: true,
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    })
}

function view(){
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
            view: true,
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    })
}
function viewDetail(){
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
            viewDetail: true,
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    })
}