var warehouseDetailTable = [];

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
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
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
            $('#switchModal').html($('<div class="modal fade">' + data + ' <div>').modal());
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
    let ProductId = $('input[name="ProductId"]').val().trim();
    let ProductName = $('input[name="ProductName"]').val().trim();
    let BrandName = $('input[name="BrandName"]').val().trim();
    let CategoryChildName = $('input[name="CategoryChildName"]').val();
    let price = $('input[name="price"]').val();
    let description = $('input[name="description"]').val();

    let warehouseReceiptId = $('input[name="warehouseReceiptId"]').val();
    let totalprice = $('input[name="totalprice"]').val();
    let supplierName = $('select[name="supplierName"] option:selected').val();
    let EmployeeId = $('input[name="EmployeeId"]').val();
    let date = $('input[name="date"]').val();


    let checkedValue_S = $('input[name="productCheckbox_S"]')
    let checkedValue_M = $('input[name="productCheckbox_M"]')
    let checkedValue_X = $('input[name="productCheckbox_X"]')
    let checkedValue_XL = $('input[name="productCheckbox_XL"]')

    let productDetail = [];

    if (checkedValue_S.is(':checked')) {
        let configurable_product = {
            sku_S: $('input[name="sku_S"]').val(),
            option_S: $('input[name="option_S"]').val(),
            stock_S: $('input[name="stock_S"]').val(),
            checkedValue_S: $('input[name="productCheckbox_S"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        productDetail.push(configurable_product);
    }
    if (checkedValue_M.is(':checked')) {
        let configurable_product = {
            sku_M: $('input[name="sku_M"]').val(),
            option_M: $('input[name="option_M"]').val(),
            stock_M: $('input[name="stock_M"]').val(),
            checkedValue_M: $('input[name="productCheckbox_M"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        productDetail.push(configurable_product);
    }


    if (checkedValue_X.is(':checked')) {
        let configurable_product = {
            sku_X: $('input[name="sku_X"]').val(),
            option_X: $('input[name="option_X"]').val(),
            stock_X: $('input[name="stock_X"]').val(),
            checkedValue_X: $('input[name="productCheckbox_X"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        productDetail.push(configurable_product);
    }

    if (checkedValue_XL.is(':checked')) {
        let configurable_product = {
            sku_XL: $('input[name="sku_XL"]').val(),
            option_XL: $('input[name="option_XL"]').val(),
            stock_XL: $('input[name="stock_XL"]').val(),
            checkedValue_XL: $('input[name="productCheckbox_XL"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        productDetail.push(configurable_product);
    }

    let checkExist = false;
    warehouseDetailTable.forEach(warehouseDetail => {
        if (warehouseDetail.ProductId == ProductId) {
            alert("Sản phẩm đã được thêm, hãy thêm sản phẩm khác!");
            checkExist = true;
        }
    });

    if (checkExist)
        return;
    warehouseDetailTable.push({
        ProductId: ProductId,
        ProductName: ProductName,
        BrandName: BrandName,
        CategoryChildName: CategoryChildName,
        price: price,
        description: description,
        warehouseReceiptId: warehouseReceiptId,
        totalprice: totalprice,
        supplierName: supplierName,
        EmployeeId: EmployeeId,
        date: date,
        productDetail: productDetail
    });


    let tbodyHtml = '';
    warehouseDetailTable.forEach(warehouseDetail => {
        let productId = "'" + warehouseDetail.ProductId + "'";
        let strHtml = '<tr>' +
            '<td>' + warehouseDetail.ProductId + '</td>' +
            '<td>' + warehouseDetail.ProductName + '</td>' +
            '<td><span onclick="deleteWarehouseDetailRow('+ productId +')" class="fa fa-times"></span></td>' +
            '</tr>';
            tbodyHtml += strHtml;
    });
    $('#tbody_warehouseDetailTable').html(tbodyHtml);


    // reset form
     $('input[name="ProductId"]').val('PR' + Math.round(d.getTime()));
    $('input[name="ProductName"]').val('')
    $('input[name="BrandName"]').val('')
    $('input[name="CategoryChildName"]').val('')
    $('input[name="price"]').val('')
    $('input[name="description"]').val('')
    $('input[name="warehouseReceiptId"]').val('')
    $('input[name="totalprice"]').val('')
    $('select[name="supplierName"] option:selected').val('')
    $('input[name="EmployeeId"]').val('')
    $('input[name="date"]').val('')
    $('input[name="sku_S"]').val('')
    $('input[name="sku_M"]').val('')
    $('input[name="sku_X"]').val('')
    $('input[name="sku_XL"]').val('')
    $('input[name="productCheckbox_S"]').prop('checked', false);
    $('input[name="productCheckbox_M"]').prop('checked', false);
    $('input[name="productCheckbox_X"]').prop('checked', false);
    $('input[name="productCheckbox_XL"]').prop('checked', false);




}


function deleteWarehouseDetailRow(productId) {
    warehouseDetailTable =  warehouseDetailTable.filter(warehouseDetail => { return warehouseDetail.ProductId != productId });
    let tbodyHtml = '';
    warehouseDetailTable.forEach(warehouseDetail => {
        let productId = "'" + warehouseDetail.ProductId + "'";
        let strHtml = '<tr>' +
            '<td>' + productId + '</td>' +
            '<td>' + warehouseDetail.ProductName + '</td>' +
            '<td><div onclick="deleteWarehouseDetailRow('+productId+')" class="fa fa-times"></div></td>' +
            '</tr>';
            tbodyHtml += strHtml;
    });
    $('#tbody_warehouseDetailTable').html(tbodyHtml);
}

// $.ajax({
//     url: './process/warehouseReceipt.php',
//     type: 'POST',
//     data: {
//         ProductId: ProductId,
//         ProductName: ProductName,
//         BrandName: BrandName,
//         CategoryChildName: CategoryChildName,
//         price: price,
//         description: description,
//         warehouseReceiptId: warehouseReceiptId,
//         totalprice: totalprice,
//         supplierName: supplierName,
//         EmployeeId: EmployeeId,
//         date: date,
//         productDetail: productDetail,
//         add: true,
//     },
//     success: function (response) {
//         console.log(response);
//     }
// })