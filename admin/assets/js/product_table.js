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

function upload(){
    event.preventDefault();
    let id_product = $('input[name="ProductId"]').val();
    let price = $('input[name="Price"]').val();

    let checkBox = document.getElementById("CheckVoucher");

    if(checkBox.checked == true){
        let salepercent = $('input[name="Discount"]').val();
        let startdate = $('input[name="StartDate"]').val();
        let enddate = $('input[name="EndDate"]').val();


        $.ajax({
            url: './process/product_table.php',
            type: 'POST',
            data: {
                id_product: id_product,
                price: price,
                salepercent:salepercent,
                startdate:startdate,
                enddate:enddate,
                upload: true,
            },
            success: function(response){
                if(response == 0){
                    console.log(response);
                }
                else{
                    window.location.reload();
                }
            }
        });
    }else{
        let salepercent = "";
        let startdate = "";
        let enddate = "";

        $.ajax({
            url: './process/product_table.php',
            type: 'POST',
            data: {
                id_product: id_product,
                price: price,
                salepercent:salepercent,
                startdate:startdate,
                enddate:enddate,
                upload: true,
            },
            success: function(response){
                if(response == 0){
                    console.log(response);
                }
                else{
                    window.location.reload();
                }
            }
        });
    }
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
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
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

    let checkBox = document.getElementById("CheckVoucher");


    if(checkBox.checked == true){
        let salepercent = $('input[name="Discount"]').val();
        let startdate = $('input[name="StartDate"]').val();
        let enddate = $('input[name="EndDate"]').val();

        $.ajax({
            url: './process/product_table.php',
            type: 'POST',
            data: {
                id_product: id_product,
                name: name,
                id_categorychild:id_categorychild,
                price: price,
                id_brand:id_brand,
                image:image,
                status:status,
                salepercent:salepercent,
                startdate:startdate,
                enddate:enddate,
                update: true,
            },
            success: function(response){

                if(response == 0){
                    console.log(response);
                }
                else{
                    window.location.reload();
                }
            }
        });
    }
    else{
        let salepercent = "";
        let startdate = "";
        let enddate = "";

        $.ajax({
            url: './process/product_table.php',
            type: 'POST',
            data: {
                id_product: id_product,
                name: name,
                id_categorychild:id_categorychild,
                price: price,
                id_brand:id_brand,
                image:image,
                status:status,
                salepercent:salepercent,
                startdate:startdate,
                enddate:enddate,
                update: true,
            },
            success: function(response){
                if(response == 0){
                    console.log(response);
                }
                else{
                    window.location.reload();
                }
            }
        });
    }
}

function checkVoucher(){
    let checkBox = document.getElementById("CheckVoucher");
    let formVoucher = document.getElementById("voucher");

    if(checkBox.checked == true){
        formVoucher.style.display = "block";
    }
    else{
        formVoucher.style.display = "none";
    }
}