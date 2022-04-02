function getDetail(id) {
    console.log(id);

    $.ajax({
        url: './process/khuyenmai.php',
        type: 'POST',
        data: {
            id: id,
            view: true
        },
        
        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
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
        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}

function update() {
    event.preventDefault();
    let id = $('input[name="update_voucherId"]').val();
    // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
    console.log(id);
    // $.ajax({
    //     url: './process/khuyenmai.php',
    //     type: 'POST',
    //     data: {
    //         data: formdata,
    //         update: true
    //     },
    //     success: function(data) {
    //       console.log(formdata);
    //     }
    // });
}