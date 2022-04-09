function viewToAdd(){
    $.ajax({
        url: './process/supplier.php',
        type: 'POST',
        data: {
            viewToAdd : true,
        },
        success: function(data){
            $('#switchModal').html($('<div class="modal fade">' +data+' <div>').modal());
        }
    })
}

function add(){
    event.preventDefault();
    let supplierId = $('input[name="supplierId"]').val();
    let supplierName = $('input[name="supplierName"]').val();
    let address = $('input[name="address"]').val();


    $.ajax({
        url: './process/supplier.php',
        type: 'POST',
        data: {
            supplierId: supplierId,
            supplierName: supplierName,
            address: address,
            add : true,
        },
        success: function(response){
            if(response == 0){
                alert('Add success');
                window.location.reload();
            }
            else{
                alert('Add fail');
            }
        }
    })

}