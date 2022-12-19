let index=0;
let selectedID=0;
let selectedOrder = null;
setInterval(carouselChange, 11000);

function focusSearch(){
    $('.search-title').css('display','none');
    $('.searchbar').addClass('searchbarFocus');
}

function carouselChange(){
    $('.counter'+(index%3)).removeClass('carousel-selected');
    $('.counter'+((index+1)%3)).addClass('carousel-selected');
    index++;
}

function togglePopup(order_id){
    selectedID = order_id;
    let visibile = $('.warning-container').css('visibility')=='visible';
    if(visibile){
        $('.warning-container').css('visibility','hidden');
        $('.warning-container').css('display','none');
    }else{
        $('.warning-container').css('visibility','visible');
        $('.warning-container').css('display','flex');
    }
}

function toggleEditForm(order){
    selectedOrder = order;
    let visibile = $('.edit-form').css('visibility')=='visible';
    if(visibile){
        $('.edit-form').css('visibility','hidden');
        $('.edit-form').css('display','none');
        $('.edit-product-list').html('');
    }else{
        $('.edit-form').css('visibility','visible');
        $('.edit-form').css('display','flex');
        $('.box-title').text('Order #'+order['id']);
        $('.edit-total').val(order['total']);
        selectedOrder.products.forEach(product => {
            $('.edit-product-list').append($('<div class="single-line"><div id=product'+ product['id'] +'>' + product['quantity'] + ' ' + product['name'] +'</div>'+ 
            '<div class="align-right"><strong><a onClick="addQuantity(' + product['id'] +')">+</a> <a onClick="removeQuantity(' + product['id'] + ')">-</a></strong></div>' + '</div>'));
        });
    }
    $("#order").val(JSON.stringify(selectedOrder));
}

function addQuantity($product_id){
    selectedOrder['products'].map(product => {;
        if(product['id']==$product_id){
            product['quantity'] +=1;
            $('#product'+product['id']).html(product['quantity'] + ' ' + product['name']);
            selectedOrder['total']+=product['price'];
            $('.edit-total').val(selectedOrder['total']);
        }
        return product;
    });
    $("#order").val(JSON.stringify(selectedOrder));
}

function updateTotal(){
    selectedOrder['total'] = $("#total").val();
    console.log(selectedOrder['total']);
    console.log('hum');
    $("#order").val(JSON.stringify(selectedOrder));
}

function removeQuantity($product_id){
    selectedOrder['products'].map(product => {
        if(product['id']==$product_id && product['quantity']>=1){
            product['quantity'] -=1;
            $('#product'+product['id']).html(product['quantity'] + ' ' + product['name']);
            selectedOrder['total']-=product['price'];
            $('.edit-total').val(selectedOrder['total']);
        }
        return product;
    });
    $("#order").val(JSON.stringify(selectedOrder));
}

function deleteOrder(){
    location = '/delete_order/'+selectedID+'';
}

function setOrder(order){
    selectedOrder=order;
    console.log('here');
}