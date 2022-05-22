$(document).ready(function () {
     //array of orders
    let orderList = []

    refrestList()

    $('.addBtn').click(function (e) { 
        e.preventDefault();
         /*  reference on clicked item so it can be accessed anytime */
         let itemReference = $(this)
         let quantity = 0
         let status = false
         let id = 0
        let total_price = 0

         //order schema
         let order = {
            name : itemReference.attr('data-name'),
            code : itemReference.attr('data-code'),
            product_id : itemReference.attr('data-id'),
            total_price : itemReference.attr('data-price'),
            quantity : 0
         }

      if (orderList.length > 0) {
         for (let index = 0; index < orderList.length; index++) {
            if(orderList[index].product_id == order.product_id ){
                
                status = true
                id = index
                break
            }
         }
        } 

         //check if exist then add else push

            if(status == true ){ //check if exist
                //if yes, add quantity
                orderList[id].quantity = ++orderList[id].quantity
        
                let price = parseInt( order.total_price)
                let qty = parseInt( orderList[id].quantity)
                 
                let total = price * qty 
                orderList[id].total_price  = total
                refrestList()
            } else {
                console.log('runn');
                ++order.quantity;
                order.total_price = itemReference.attr('data-price')
                orderList.push(order)
                refrestList()
            }

            console.log(orderList);
    });



    function refrestList() {  
        if (orderList.length > 0) {
            $('.checkout').html('');
            $('.checkout').append('<button class="btn btn-danger " id="clearOrders">Clear</button>');
            $('.checkout').append('<button class="btn btn-success mt-1" id="checkoutOrders">Checkout</button>');
        }
    
        $('.checklist').html('');
        for (let index = 0; index < orderList.length; index++) {
            $('.checklist').append(
                '<li class="list-group-item d-flex justify-content-between align-items-start">'+
                '<div class="ms-2 me-auto">' +
                  '<div class="fw-bold">'+ orderList[index].name +'</div>'+
                  '<div class="fw-semibold fst-italic text-muted">#'+  orderList[index].code +'</div>'+
                  '<div class="fw-light">Total Price : ₱'+ orderList[index].total_price +'.00</div>'+
                '</div>'+
                '<span class="badge bg-success rounded-pill">'+ orderList[index].quantity +'</span>'+
              '</li>'
            );
        }
    }

    // $('#checkoutOrders').click(function (e) { 
  
    $('body').on('click', '#checkoutOrders', function (e) { 
        let itemReference = $(this)
        e.preventDefault();

        for (let index = 0; index < orderList.length; index++) {
            console.log(orderList[index]);
            $.ajax({
                url: itemReference.attr('data-route'),
                url: 'orders',
                type: 'POST',
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: orderList[index]
               })
              .done(function(data) {
                  console.log(data);
                  $('.myalert').html('<div class="alert alert-success"><p>Order is Successful</p></div>');

              })
              .fail(function(error) {
                console.log(error);
              })
        }
      
    });


    //  clear
    $('body').on('click', '#clearOrders', function (e) { 
        orderList = []
        $('.checklist').html('');
        $('.checkout').html('');
        $('.myalert').html('');
    });

});  