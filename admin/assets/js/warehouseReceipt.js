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

    let checkedValue_S = $('.productCheckbox_S:checked').val();
    let checkedValue_M = $('.productCheckbox_M:checked').val();
    let checkedValue_X = $('.productCheckbox_X:checked').val();
    let checkedValue_XL = $('.productCheckbox_XL:checked').val();

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
            sku_S: sku_S,
            sku_M: sku_M,
            sku_X: sku_X,
            sku_XL: sku_XL,
            option_S: option_S,
            option_M: option_M,
            option_X: option_X,
            option_XL: option_XL,
            stock_S: stock_S,
            stock_M: stock_M,
            stock_X: stock_X,
            stock_XL: stock_XL,
            checkedValue_S: checkedValue_S,
            checkedValue_M: checkedValue_M,
            checkedValue_X: checkedValue_X,
            checkedValue_XL: checkedValue_XL,
            add: true,
        },
        success: function (response) {
            console.log(response);
        }
    })

}
