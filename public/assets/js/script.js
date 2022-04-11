// ajax set up
$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

// filter movies functionality
filter_cinema = (element)=>{
    let parent = element.parentElement;
    let id = parent.querySelector('.cinema_filter').value;
    console.log(parent.parentElement.parentElement)
    let form = new FormData();
    form.append('id',id);
    let url = parent.parentElement.parentElement.parentElement.querySelector('form').getAttribute('action');
    let type = parent.parentElement.parentElement.parentElement.querySelector('form').getAttribute('method');
    $.ajax({
        url :url,
        method : type,
        data : form,
        processData : false,
        dataType : 'json',
        contentType : false,
        success : function(response){
            console.log(response)
            if (response.msg = 'success') {
                Swal.fire(
                    'Added',
                    'Product added to cart.',
                    'success'
                ).then(function(){
                    $('.checkout-btn').removeClass('d-none')
                    $('.add-to-cart-btn').attr('disabled',false)
                    $('.add-to-cart-btn').removeClass('btn-secondary')
                    $('.add-to-cart-btn').addClass('btn-warning')
                    $('#product-image').css('height','390px')
                })
                $('.total_items').html(Number(cart) + 1);
            }
            else{
                Swal.fire(
                    'Error',
                    'Error adding product to cart.',
                    'danger'
                )
                    $('.add-to-cart-btn').attr('disabled',false)
                    $('.add-to-cart-btn').removeClass('btn-secondary')
                    $('.add-to-cart-btn').addClass('btn-warning')
            }
        }
    
    })
}
