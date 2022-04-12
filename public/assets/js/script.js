// ajax set up
$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

// add categor)y functionality
add_movie = (element)=>{
    let parent = element.parentElement;
    let name = parent.querySelector('.cat_name').value;
    let form = new FormData();
    form.append('name',name);
    let url = parent.parentElement.querySelector('form').getAttribute('action');
    let type = parent.parentElement.querySelector('form').getAttribute('method');
    $.ajax({
        url :url,
        method : type,
        data : form,
        processData : false,
        dataType : 'json',
        contentType : false,
        success : function(response){
            $('#add-category').modal('hide')
            if (response.msg = 'success') {
                $('.cat_name').val('');
                Swal.fire({
                    showConfirmButton: false,
                    timer: 1500,
                    title :'Added',
                    text : 'Category added successfully.',
                    icon :'success'
                })
                console.log(response)
            }
            else{
                Swal.fire(
                    'Error',
                    'Error adding category.',
                    'danger'
                )
            }
        }
    
    })
}

// filter movies functionality
// function filter_cinema(element){
//     let parent = element.parentElement;
//     let id = parent.querySelector('.cinema_filter').value;
//     let form = new FormData();
//     form.append('id',id);
//     let url = parent.parentElement.parentElement.parentElement.querySelector('form').getAttribute('action');
//     let type = parent.parentElement.parentElement.parentElement.querySelector('form').getAttribute('method');
//     $('.rows toggle_shadow > *').remove()
    
//     $.ajax({
//         url :url,
//         method : type,
//         data : form,
//         processData : false,
//         dataType : 'json',
//         contentType : false,
//         success : function(response){
//            // filtering dom
//     var display = document.querySelectorAll(".toggle_display");
//     for (var i = 0; i < display.length; i++) {
//     display[i].setAttribute("onclick", "clickedIcon(this)");
//     }
//     function clickedIcon(newelement){
  

//         var parentTag = newelement.parentElement.parentElement.parentElement.parentElement.parentElement;
//         console.log(parentTag)
//         var child = parentTag.querySelector('.toggle_display')
//         let filter = document.querySelectorAll(".cinema_location");
//         var filter_array = Object.keys(filter).map(k => filter[k].value)
//         console.log(filter_array)
//     //     if(filter_array.includes('1')){
//     //         console.log('xj')
//     //    }

       
//     Object.keys(response.su).forEach(e=> {
//         // console.log(response.su[e].location)
//                if(filter_array.includes(response.su[e].location)){
//                 child.style.display = 'none'

//                }
//             })
//     }

//     clickedIcon(element)
            
            
//         }
    
//     })
// }
