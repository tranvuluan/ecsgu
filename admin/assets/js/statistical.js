function ProductHot() {
    event.preventDefault();
    $.ajax({
        url: "./process/statistical.php",
        method: "POST",
        data: {
            getProductHot: true
        },
        success: function(data) {
            $('#StatisticalTable').html(data);
        }
    });
}

function ProductNearlySoldOut() {
    event.preventDefault();
    $.ajax({
        url: "./process/statistical.php",
        method: "POST",
        data: {
            getProductNearlySoldOut: true
        },
        success: function(data) {
            $('#StatisticalTable').html(data);
        }
    });
}

function ProductSoldOut() {
    event.preventDefault();

    $.ajax({
        url: "./process/statistical.php",
        method: "POST",
        data: {
            getProductSoldOut: true
        },
        success: function(data) {
            $('#StatisticalTable').html(data);
        }
    });
}