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
    let ProductId = $('input[name="ProductId"]').val();
    let ProductName = $('input[name="ProductName"]').val();
    let BrandName = $('input[name="BrandName"]').val();
    let CategoryChildName = $('input[name="CategoryChildName"]').val();
    let price = $('input[name="price"]').val();
    let description = $('input[name="description"]').val();

    let warehouseReceiptId = $('input[name="warehouseReceiptId"]').val();
    let totalprice = $('input[name="totalprice"]').val();
    let supplierName = $('select[name="supplierName"] option:selected').val();
    let EmployeeId = $('input[name="EmployeeId"]').val();
    let date = $('input[name="date"]').val();


    // Xu ly thong tin chi tiet
    let sku_S = $('input[name="sku_S"]').val();
    let sku_M = $('input[name="sku_M"]').val();
    let sku_X = $('input[name="sku_X"]').val();
    let sku_XL = $('input[name="sku_XL"]').val();

    let option_S = $('input[name="option_S"]').val();
    let option_M = $('input[name="option_M"]').val();
    let option_X = $('input[name="option_X"]').val();
    let option_XL = $('input[name="option_XL"]').val();

    let stock_S = $('input[name="stock_S"]').val();
    let stock_M = $('input[name="stock_M"]').val();
    let stock_X = $('input[name="stock_X"]').val();
    let stock_XL = $('input[name="stock_XL"]').val();

    let checkedValue_S = $('input[name="productCheckbox_S"]')
    let checkedValue_M = $('input[name="productCheckbox_M"]')
    let checkedValue_X = $('input[name="productCheckbox_X"]')
    let checkedValue_XL = $('input[name="productCheckbox_XL"]')
    
    let productDetail = [];

    if (checkedValue_S.is(':checked')) {
        let configurable_product = {
             sku_S : $('input[name="sku_S"]').val(),
                option_S : $('input[name="option_S"]').val(),
                stock_S : $('input[name="stock_S"]').val(),
                checkedValue_S : $('input[name="productCheckbox_S"]').val(),
        }
        productDetail.push(configurable_product);
    }
    if (checkedValue_M.is(':checked')) {
        let configurable_product = {
            sku_M : $('input[name="sku_M"]').val(),
            option_M : $('input[name="option_M"]').val(),
            stock_M : $('input[name="stock_M"]').val(),
            checkedValue_M : $('input[name="productCheckbox_M"]').val(),
       }
       productDetail.push(configurable_product);
    }


    if (checkedValue_X.is(':checked')) {
        let configurable_product = {
            sku_X : $('input[name="sku_X"]').val(),
            option_X : $('input[name="option_X"]').val(),
            stock_X : $('input[name="stock_X"]').val(),
            checkedValue_X : $('input[name="productCheckbox_X"]').val(),
       }
       productDetail.push(configurable_product);
    }

    if (checkedValue_XL.is(':checked')) {
        let configurable_product = {
            sku_XL : $('input[name="sku_XL"]').val(),
            option_XL : $('input[name="option_XL"]').val(),
            stock_XL : $('input[name="stock_XL"]').val(),
            checkedValue_XL : $('input[name="productCheckbox_XL"]').val(),
       }
       productDetail.push(configurable_product);
    }


    $.ajax({
        url: './process/warehouseReceipt.php',
        type: 'POST',
        data: {
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
            productDetail: productDetail,
            add: true,
        },
        success: function (response) {
            console.log(response);
        }
    })

}
