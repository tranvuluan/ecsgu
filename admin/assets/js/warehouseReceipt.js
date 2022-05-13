$(document).ready(function() {
    $('#id_warehousereceipt').DataTable();
} );

var warehouseDetailTable = [];
let imageUrl = '';
console.log('run this');

function getWarehouseReceiptDetail(id_warehousereceipt) {
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'GET',
        data: {
            getWarehouseReceiptDetail: true,
            id_warehousereceipt: id_warehousereceipt,
        },
        success: function (response) {
            $('#tbody_warehousereceiptDetail').html(response); //innerHtml    
        }
    });
}

function viewToAdd() {
    warehouseDetailTable = [];
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
            viewToAdd: true,
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' </div>').modal());
        }
    })
}

function view(id) {
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
            id: id,
            view: true,
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' </div>').modal());
        }
    })
}
function viewDetail(id) {
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
            id: id,
            viewDetail: true,
        },
        success: function (data) {
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
        }
    })
}

function add() {
    event.preventDefault();
    let id_product = $('input[name="ProductId"]').val().trim();
    let name_product = $('input[name="ProductName"]').val().trim();
    let id_brand = $('select[name="brand"] option:selected').val();
    let id_categorychild = $('select[name="categorychild"] option:selected').val();
    let price = $('input[name="price"]').val();
    let description = $('textarea[name="description"]').val();

    let id_warehousereceipt = $('input[name="warehouseReceiptId"]').val();
    let totalprice = $('input[name="totalprice"]').val();
    let suplier = $('select[name="suplier"] option:selected').val();
    let id_employee = $('input[name="EmployeeId"]').val();
    let date = $('input[name="date"]').val();


    let checkedValue_S = $('input[name="productCheckbox_S"]')
    let checkedValue_M = $('input[name="productCheckbox_M"]')
    let checkedValue_X = $('input[name="productCheckbox_X"]')
    let checkedValue_XL = $('input[name="productCheckbox_XL"]')

    let configurable_products = [];

    if (checkedValue_S.is(':checked')) {
        let configurable_product = {
            sku: $('input[name="sku_S"]').val(),
            option: $('input[name="option"]').val(),
            stock: $('input[name="stock_S"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val(),
            option: 'S'
        }
        configurable_products.push(configurable_product);
    }
    if (checkedValue_M.is(':checked')) {
        let configurable_product = {
            sku: $('input[name="sku_M"]').val(),
            option: $('input[name="option_M"]').val(),
            stock: $('input[name="stock_M"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val(),
            option: 'M'
        }
        configurable_products.push(configurable_product);
    }


    if (checkedValue_X.is(':checked')) {
        let configurable_product = {
            sku: $('input[name="sku_X"]').val(),
            option: $('input[name="option_X"]').val(),
            stock: $('input[name="stock_X"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val(),
            option: 'X'
        }
        configurable_products.push(configurable_product);
    }

    if (checkedValue_XL.is(':checked')) {
        let configurable_product = {
            sku: $('input[name="sku_XL"]').val(),
            option: $('input[name="option_XL"]').val(),
            stock: $('input[name="stock_XL"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val(),
            option: 'XL'
        }
        configurable_products.push(configurable_product);
    }

    // upoload image into imgur.com

    let checkExist = false;
    warehouseDetailTable.forEach(warehouseDetail => {
        if (warehouseDetail.id_product == id_product) {
            alert("Sản phẩm đã được thêm, hãy thêm sản phẩm khác!");
            checkExist = true;
        }
    });

    if (checkExist)
        return;
    warehouseDetailTable.push({
        id_product: id_product,
        name_product: name_product,
        id_brand: id_brand,
        id_categorychild: id_categorychild,
        price: price,
        description: description,
        id_warehousereceipt: id_warehousereceipt,
        images: imageUrl,
        totalprice: totalprice,
        suplier: suplier,
        id_employee: id_employee,
        date: date,
        configurable_products: configurable_products
    });


    let tbodyHtml = '';
    warehouseDetailTable.forEach(warehouseDetail => {
        let productId = "'" + warehouseDetail.id_product + "'";
        let strHtml = '<tr>' +
            '<td>' + warehouseDetail.id_product + '</td>' +
            '<td>' + warehouseDetail.name_product + '</td>' +
            '<td><span onclick="deleteWarehouseDetailRow(' + productId + ')" class="fa fa-times"></span></td>' +
            '</tr>';
        tbodyHtml += strHtml;
    });

    // add elementHTML list to table
    $('#tbody_warehouseDetailTable').html(tbodyHtml);

    // add elementHTML total price
    let totalPrice = totalPriceOfWarehouse();
    console.log(totalPrice);
    $('#totalPrice').val(totalPrice);


    // reset form
    let d = new Date();
    $('input[name="ProductId"]').val('PR' + Math.round(d.getTime()));
    $('input[name="ProductName"]').val('')
    $('input[name="price"]').val('')
    $('input[name="description"]').val('')
    $('input[name="sku_S"]').val('SKU' + Math.round(d.getTime()) + '_S');
    $('input[name="sku_M"]').val('SKU' + Math.round(d.getTime()) + '_M');
    $('input[name="sku_X"]').val('SKU' + Math.round(d.getTime()) + '_X');
    $('input[name="sku_XL"]').val('SKU' + Math.round(d.getTime()) + '_XL');
    $('input[name="productCheckbox_S"]').prop('checked', false);
    $('input[name="productCheckbox_M"]').prop('checked', false);
    $('input[name="productCheckbox_X"]').prop('checked', false);
    $('input[name="productCheckbox_XL"]').prop('checked', false);
    $('#imageProductInAddWarehouse').attr('src', '');
}


function deleteWarehouseDetailRow(productId) {
    warehouseDetailTable = warehouseDetailTable.filter(warehouseDetail => { return warehouseDetail.id_product != productId });
    let tbodyHtml = '';
    warehouseDetailTable.forEach(warehouseDetail => {
        let productId = "'" + warehouseDetail.id_product + "'";
        let strHtml = '<tr>' +
            '<td>' + productId + '</td>' +
            '<td>' + warehouseDetail.name_product + '</td>' +
            '<td><div onclick="deleteWarehouseDetailRow(' + productId + ')" class="fa fa-times"></div></td>' +
            '</tr>';
        tbodyHtml += strHtml;
    });
    $('#tbody_warehouseDetailTable').html(tbodyHtml);

    // add elementHTML total price
    let totalPrice = totalPriceOfWarehouse();
    $('#totalPrice').val(totalPrice);
}


function addWarehouseReceipt() {
    let id_warehousereceipt = $('input[name="warehouseReceiptId"]').val();
    let totalprice = $('input[name="totalprice"]').val();
    let id_suplier = $('select[name="suplier"] option:selected').val();
    let id_employee = $('input[name="EmployeeId"]').val();
    let date = $('input[name="date"]').val();
    console.log('warehouse detail table ')
    console.log(warehouseDetailTable);
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
            id_warehousereceipt: id_warehousereceipt,
            totalprice: totalprice,
            id_suplier: id_suplier,
            id_employee: id_employee,
            date: date,
            warehouseDetail: warehouseDetailTable,
            add: true,
        },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                alert("Thêm thành công!");
                location.reload();
            }
            else {
                alert("Thêm thất bại!");
                // location.reload();
                
            }
        }
    })

}


function totalPriceOfWarehouse() {
    let totalPrice = 0;
    warehouseDetailTable.forEach(warehouse => {
        let totalStock = 0;
        warehouse.configurable_products.forEach(item => {
            totalStock += item.stock;
        });
        totalPrice += warehouse.price * totalStock;
    });
    return totalPrice;
}

async function changeAddWarehouseImage() {
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
                $('#imageProductInAddWarehouse').attr('src', objectData.url);
                imageUrl = objectData.url;
            });
    }
}

function addNewBrand() {
    let name = prompt("Nhập tên thương hiệu mới");
    alert(name);

    if (name == null) {
        alert('Vui lòng điền đầy đủ thông tin');
        reutrn;
    }
    let date = new Date();
    let id_brand = 'BR' + Math.round(date.getTime());

    $.ajax({
        url: './process/brand-process.php',
        type: 'POST',
        data: {
            id: id_brand,
            name: name,
            add: true,
        },
        success: function (response) {
            console.log(response);
            if (response == 1) {
                alert('Thêm thành công');
                let htmlOption = `<option value="${id_brand}">${name}</option>`;
                console.log(htmlOption);
                $('select[name="brand"]').append(htmlOption);
            } 
            else {
                alert('Thêm thất bại');
            }
        }
    })
}


function addExistProduct() {
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'GET',
        data: {
            showExistProduct: true,
        },
        success: function (response) {
            $('#modalExistProduct').html($('<div class="modal fade " id="modal_chooseExistProduct" style="z-index:99999;">' + response + ' </div>').modal('show'));
        }
    });
}


function chooseExistProduct(id_product) {
    console.log(id_product);
    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'GET',
        data: {
            chooseExistProduct: true,
            id_product: id_product,
        },
        success: function (response) {
            $('#modal_chooseExistProduct').modal('hide');
            let objectJson = JSON.parse(response);
            $('input[name="ProductId"').val(objectJson.product.id_product);
            $('input[name="ProductName"').val(objectJson.product.name);
            $('input[name="ProductName"').val(objectJson.product.name);
            $('#categorychild').val(objectJson.categorychild.id_categorychild).change();
            $('#brand').val(objectJson.brand.id_brand).change();
            imageUrl = objectJson.product.image;
            $('#imageProductInAddWarehouse').attr('src', imageUrl);
            objectJson.sku.forEach(sku => {
                if (sku.option == 'S') {
                    $('input[name="productCheckbox_S"]').prop('checked', true);
                    $('input[name="sku_S"]').val(sku.sku);
                    $('input[name="stock_S"]').val(sku.stock);
                    $("select[name=inventory_status_S").val(sku.inventory_status).change();
                }
                if (sku.option == 'M') {
                    $('input[name="productCheckbox_M"]').prop('checked', true);
                    $('input[name="sku_M"]').val(sku.sku);
                    $('input[name="stock_M"]').val(sku.stock);
                    $("select[name=inventory_status_M").val(sku.inventory_status).change();
                }
                if (sku.option == 'X') {
                    $('input[name="productCheckbox_X"]').prop('checked', true);
                    $('input[name="sku_X"]').val(sku.sku);
                    $('input[name="stock_X"]').val(sku.stock);
                    $("select[name=inventory_status_X").val(sku.inventory_status).change();
                }
                if (sku.option == 'XL') {
                    $('input[name="productCheckbox_XL"]').prop('checked', true);
                    $('input[name="sku_XL"]').val(sku.sku);
                    $('input[name="stock_XL"]').val(sku.stock);
                    $("select[name=inventory_status_XL").val(sku.inventory_status).change();
                }
            });

            console.log(objectJson);
            // $('')
        },
        error: function (err) {
            console.log(err);
        }
    })
}