function viewToAdd(){
    $.ajax({
        url: './process/category-process.php',
        type: 'POST',
        data: {
            viewToAdd: true
        },
        
        success: function(data) {
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    });
}
function add(){
    event.preventDefault();
    let id = $('input[name="add_idCate"]').val();
    let name = $('input[name="add_nameCate"]').val();
        // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

    $.ajax({
        url: './process/category-process.php',
        type: 'POST',
        data: {
            id: id,
            name:name,
            add : true
        },
        success: function(response) {
            console.log(response);
            if(response == 0){
                console.log(response);
            }
            else{
                window.location.href = "./danhmucsp.php";
            }
        }
    });
}

function viewToUpdate(id) {
    console.log(id);

    $.ajax({
        url: './process/category-process.php',
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
    let id = $('input[name="update_idCate"]').val();
    let name = $('input[name="update_nameCate"]').val();
    

    var data = 
    // $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());

    $.ajax({
        url: './process/category-process.php',
        type: 'POST',
        data: {
            id: id,
            name: name,
            update : true
        },
        success: function(response) {
            console.log(response);
            if(response == 0){
                console.log(response);
            }
            else{
                window.location.href = "./danhmucsp.php";
            }
        }
    });
}

function deleteCategory(id){

    console.log(id);
    $.ajax({
        url: './process/category-process.php',
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