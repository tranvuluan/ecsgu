let currentIndexFilter = 'all';

getFilterProduct(currentIndexFilter);

function viewProductAll(){
    let name = $('#id_product').val();
    let image = $('#image').val();
    let price = $('#price').val();
    let 
}
function filterProduct(element){
    let listTagA = $('body > div.product-area > div > div:nth-child(1) > div.col-lg-auto.col-md-auto.col-12 > ul li  a');
    for (let i = 0 ; i < listTagA.length; i++) 
        listTagA[i].classList.remove('active');
    element.classList.add('active');
    let option = element.getAttribute('data-option');
    getFilterProduct(option);
}


function getFilterProduct(option) {
    $.ajax({
        url: './process/product.php',
        method: 'GET',
        data: {
            option: option,
            filterProduct: true
        },
        success: function (response) {
            $('#filterProduct').html(response);
        }
    })
}