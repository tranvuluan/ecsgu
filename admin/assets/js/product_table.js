$(document).ready(function() {
    $('#id_product').DataTable();
} );

let imageUrl = '';

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
// Xu ly dang ban 
function activeSellProduct(){
    event.preventDefault();
    let id_product = $('input[name="ProductId"]').val();
    let price = $('input[name="Price"]').val();
    let id_categorychild = $('select[name="id_categorychild"] option:selected').val();
    let id_brand = $('select[name="id_brand"] option:selected').val();

    $.ajax({
        url: './process/product_table.php',
        type: 'POST',
        data: {
            id_product: id_product,
            sell_price: price,
            id_categorychild: id_categorychild,
            id_brand: id_brand,
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
    imageUrl = $('#imageProduct').attr('src');
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
                id_categorychild: id_categorychild,
                price: price,
                id_brand: id_brand,
                image: imageUrl,
                status: status,
                salepercent: salepercent,
                startdate: startdate,
                enddate: enddate,
                update: true,
            },
            success: function(response){
                if(response == 0){
                    alert('Lỗi');
                    console.log(response);
                }
                else{
                    alert('Cập nhật thành công');
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
                name: name,
                id_categorychild: id_categorychild,
                price: price,
                id_brand: id_brand,
                image: imageUrl,
                status: status,
                salepercent: salepercent,
                startdate: startdate,
                enddate: enddate,
                update: true,
            },
            success: function(response){
                if(response == 0){
                    alert('Lỗi');
                    console.log(response);
                }
                else{
                    alert('Cập nhật thành công');
                    window.location.reload();
                }
            }
        });
    }
}

async function changeProductImage() {
    $('#loadingImage').removeClass('d-none');
    const signResponse = await fetch('http://14.225.192.186:5555/api/upload/getSignature');
    const signData = await signResponse.json();

    const url = "https://api.cloudinary.com/v1_1/" + signData.cloudname + "/image/upload";



    const files = document.querySelector("[type=file]").files;
    const formData = new FormData();

    console.log(files);
    // Append parameters to the form data. The parameters that are signed using 
    // the signing function (signuploadform) need to match these.

    for (let i = 0; i < files.length; i++) {
        let file = files[i];
        formData.append("file", file);
        formData.append("api_key", signData.apikey);
        formData.append("timestamp", signData.timestamp);
        formData.append("signature", signData.signature);
        formData.append("eager", "c_pad,h_300,w_400|c_crop,h_200,w_260");
        formData.append("folder", "signed_upload_demo_form");

        fetch(url, {
            method: "POST",
            body: formData
        })
            .then((response) => {
                return response.text();
            })
            .then((data) => {
                const objectData = JSON.parse(data);
                console.log(objectData);
                $('#loadingImage').addClass('d-none');
                $('#imageProduct').attr('src', objectData.url);
                imageUrl = objectData.url;
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