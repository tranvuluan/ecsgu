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
           $('<div class="modal fade">' +data+' <div>').modal();
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
           $('<div class="modal fade">' +data+' <div>').modal();
        }
    });
}

function update() {
    event.preventDefault();
    let formdata = $('form').serializeArray();
    $.ajax({
        url: './process/khuyenmai.php',
        type: 'POST',
        data: {
            data: formdata,
            update: true
        },
        success: function(data) {
            console.log('......');
          console.log(data);
        }
    });
}