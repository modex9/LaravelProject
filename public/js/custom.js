$(document).ready(function () {
    
    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    
    $("#delete-button").attr("disabled", "");
    
    //Check all checkboxes if "Select all" is checked
    $('#select-all').click(function() {
        $(".product-checkbox").each(function () {
            if($('#select-all').prop('checked')) {
                $(this).prop('checked', true);
                $("#delete-button").removeAttr('disabled');
            }
            else {
                $(this).prop('checked', false);
                $("#delete-button").attr("disabled", "");
            } 
        });
    });
    
    //Uncheck "Select all" if at least one product checkbox is unchecked
    $('.product-checkbox').click(function () {
        let atLeastOneChecked = false;
        $('.product-checkbox').each(function () {
            if(!$(this).prop('checked')) { 
                $("#select-all").prop('checked', false);
            }
            else {
                atLeastOneChecked = true;
                $("#delete-button").removeAttr('disabled');
            }
        });
        if(!atLeastOneChecked) $("#delete-button").attr("disabled", "");
    }); 
    
//    $('.product-checkbox').each(()={
//        if($(this).prop('checked')) {
//            
//        }
//    });
    
    $("#delete-button").click(function(e) {
        e.preventDefault();
        var selectedProducts = [];
        var selectedProductsIds = [];
        $(".product-checkbox").each(function() {
            if($(this).prop('checked')) {
                selectedProducts.push($(this).closest('tr'));
                selectedProductsIds.push(parseInt($(this).attr(('id')).substr(('product_select').length)));
            }
        });
        
        $.ajax({
            method: 'post',
            url: 'products/deleteseveral',
            data: {'selectedProductsIds' : selectedProductsIds},
            success:function(response) {
                selectedProducts.forEach((item) => {
                   item.remove(); 
                });
            }
        });

    });
    
    $("#delete-form").on("submit", (e) => {
       e.preventDefault(); 
    });
    
    $("[id^='product-enablement']").on('click', (e) => {
        e.preventDefault();
        var linkId = e.currentTarget.id;
        var productId = parseInt(linkId.substring(('product-enablement').length));
        
        $.ajax({
            method: 'post',
            url: 'products/changestatus',
            data: { 'id' : productId},
            success:function(response) {
                let product = $('#product' + productId);
                if($('#product' + productId).hasClass('enabled')) {
                    $(`#product-enablement${productId} img`).attr('src', 'img/cancel.svg');
                    product.removeClass().addClass('disabled');
                }
                else {
                    $(`#product-enablement${productId} img`).attr('src', 'img/checked.svg');
                    product.removeClass().addClass('enabled');
                }
            }
        });
    });
});