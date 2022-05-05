let filter = {
    price: null,
    category: [],
    size: []
}


let priceBar = $('#slider-range > div');

priceBar.on('dragend', function () {
    console.log('change this');
    filterPrice();
});

// function filter() {

// }

function filterPrice() {
    let reg = /\d+/;
    let price = $('#slider-range > span:nth-child(3)')[0];
    let styleString = price.attr('style');
    filter.price = style.match(reg);
    console.log(filter);
}

function filterCategory(id_category) {
    filter.category.push(id_category);
    // filter();
}


