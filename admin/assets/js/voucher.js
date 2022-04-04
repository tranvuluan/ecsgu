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
    let code = $('input[name="update_code"]').val();
    let discount = $('input[name="update_discount"]').val();
    let startdate = $('input[name="update_startdate"]').val();
    let enddate = $('input[name="update_enddate"]').val();

    var data = 
    // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

    $.ajax({
        url: './process/khuyenmai.php',
        type: 'POST',
        data: {
            id: id,
            code: code,
            discount: discount,
            startdate: startdate,
            enddate: enddate,
            update : true
        },
        success: function(response) {
            console.log(response);
            if(response == 0){
                console.log(response);
            }
            else{
                window.location.href = "./khuyenmai.php";
            }
        }
    });
}

function deleteVoucher(id){

    console.log(id);
    $.ajax({
        url: './process/khuyenmai.php',
        type: 'POST',
        data: {
            id: id,
            delete: true
        },
        success: function(response) {
            console.log(response);
            if(response == 0){
                console.log(response);
                alert('Lỗi');
            }
            else{
                alert('Xóa thành công');
                location.reload();
            }
        }
    });
}
