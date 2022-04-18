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
    let id_product = $('input[name="ProductId"]').val().trim();
    let name_product = $('input[name="ProductName"]').val().trim();
    let id_brand = $('input[name="BrandName"]').val().trim();
    let id_categorychild = $('input[name="CategoryChildName"]').val();
    let price = $('input[name="price"]').val();
    let description = $('input[name="description"]').val();

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
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        configurable_products.push(configurable_product);
    }
    if (checkedValue_M.is(':checked')) {
        let configurable_product = {
            sku: $('input[name="sku_M"]').val(),
            option: $('input[name="option_M"]').val(),
            stock: $('input[name="stock_M"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        configurable_products.push(configurable_product);
    }


    if (checkedValue_X.is(':checked')) {
        let configurable_product = {
            sku: $('input[name="sku_X"]').val(),
            option: $('input[name="option_X"]').val(),
            stock: $('input[name="stock_X"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        configurable_products.push(configurable_product);
    }

    if (checkedValue_XL.is(':checked')) {
        let configurable_product = {
            sku: $('input[name="sku_XL"]').val(),
            option: $('input[name="option_XL"]').val(),
            stock: $('input[name="stock_XL"]').val(),
            inventory_status: $('select[name="inventory_status_M"]').change().val()
        }
        configurable_products.push(configurable_product);
    }

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
    $('input[name="BrandName"]').val('')
    $('input[name="CategoryChildName"]').val('')
    $('input[name="price"]').val('')
    $('input[name="description"]').val('')
    $('input[name="sku_S"]').val('SKU' + Math.round(d.getTime()+10));
    $('input[name="sku_M"]').val('SKU' + Math.round(d.getTime()+20));
    $('input[name="sku_X"]').val('SKU' + Math.round(d.getTime()+30));
    $('input[name="sku_XL"]').val('SKU' + Math.round(d.getTime()+ 40));
    $('input[name="productCheckbox_S"]').prop('checked', false);
    $('input[name="productCheckbox_M"]').prop('checked', false);
    $('input[name="productCheckbox_X"]').prop('checked', false);
    $('input[name="productCheckbox_XL"]').prop('checked', false);
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
    let id_product = $('input[name="ProductId"]').val().trim();
    let name_product = $('input[name="ProductName"]').val().trim();
    let id_brand = $('input[name="BrandName"]').val().trim();
    let id_categorychild = $('input[name="CategoryChildName"]').val();
    let price = $('input[name="price"]').val();
    let description = $('input[name="description"]').val();

    let id_warehousereceipt = $('input[name="warehouseReceiptId"]').val();
    let totalprice = $('input[name="totalprice"]').val();
    let id_suplier = $('select[name="suplier"] option:selected').val();
    let id_employee = $('input[name="EmployeeId"]').val();
    let date = $('input[name="date"]').val();

    //($id_warehousereceipt, $id_supplier, $id_employee, $date, $totalprice){

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
        totalPrice += warehouse.price* totalStock;
    });
    return totalPrice;
}

