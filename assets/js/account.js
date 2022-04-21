function viewAccountToUpdate($id){
    console.log($id);
    $.ajax({
        url: './account-process.php',
        type: 'POST',
        data: {
            id: $id,
            viewToUpdate: true
        },
        // success: function(data) {
        //     // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        // }
    });
}
function update(){
    event.preventDefault();
    let id_cus = $('input[name="id_cus"]').val();
    let id_acc = $('input[name="id_acc"]').val();
    let id_cus = $('input[name="id_cus"]').val();
    let id_cus = $('input[name="id_cus"]').val();
    let id_cus = $('input[name="id_cus"]').val();
}