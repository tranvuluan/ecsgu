function viewProductAll(){
    let name = $('#id_product').val();
    let image = $('#image').val();
    let price = $('#price').val();
    let 
}
function filterProduct(option){
    switch (option) {
        case 'all':
            
            break;
        case 'new':
            
            break;
        case 'bestseller':
            
            break;
        case 'bestseller':
            
            break;
        case 'sale':
            
            break;
    
        default:
            break;
    }
}


function getFilterProduct(option) {
    $.ajax({
        url: './process/product-index.php',
        method: 'GET',
        data: {
            option: option
        },
        success: function (response) {
            console.log(response);
        }
    })
}