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

function activeSellProduct(){
    event.preventDefault();
    let id_product = $('input[name="ProductId"]').val();
    let price = $('input[name="Price"]').val();

    $.ajax({
        url: './process/product_table.php',
        type: 'POST',
        data: {
            id_product: id_product,
            sell_price: price,
            activeSellProduct: true,
        },
        success: function(response){
            if(response == 0){
                console.log(response);
                alert('Lỗi');
            }
            else{
                alert('Đăng bán thành công');
                window.location.reload();
            }
        }
    });
}

function viewToUpdate(id){
    $.ajax({
        url: './process/product_table.php',
        type: 'POST',
        data: {
            id: id,
            viewToUpdate: true,
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' </div>').modal());
        }
    });
}

function update(){
    event.preventDefault();
    let id_product = $('input[name="ProductId"]').val();
    let name = $('input[name="ProductName"]').val();
    let id_categorychild = $('select[name="id_categorychild"] option:selected').val();
    let price = $('input[name="price"]').val();
    let id_brand = $('select[name="id_brand"] option:selected').val();
    let image = 'abc';
    let status = $('input[name="status"]:checked').val();

    $.ajax({
        url: './process/product_table.php',
        type: 'POST',
        data: {
            id_product: id_product,
            name: name,
            id_categorychild: id_categorychild,
            price: price,
            id_brand: id_brand,
            image: image,
            status: status,
            update: true,
        },
        success: function(response){
            console.log(response);
            // if(response == 0){
            //     console.log(response);
            // }
            // else{
            //     window.location.reload();
            // }
        }
    });
}