// ajax set up
$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})
$(document).ready(function(){
    // ad// add mmoviefunctionality
    $('#addmovie').on('submit',function (element){
        element.preventDefault()
        let form = new FormData(this);
        console.log(form)
        let url = document.querySelector('#addmovie').getAttribute('data-action');
        let type = document.querySelector('#addmovie').getAttribute('method');
        $.ajax({
            url : url,
            method : type,
            data : form,
            processData : false,
            dataType : 'json',
            contentType : false,
            success : function(response){
                console.log(response)
                $('#modelId').modal('hide');
                if (response == 'success') {
                    Swal.fire({
                        showConfirmButton: false,
                        timer: 1500,
                        text : 'Movie added',
                        icon :'success'
                    })
                    setTimeout(function () {
					document.location.reload()
                },2000)
                }
                else{
                    let test =  '' ;
                   Object.keys(response).forEach(e=>{
                    test = response[e][0]
                   }) ;
                    console.log(test)
                    Swal.fire(
                        'Error',
                        test,
                        'warning'
                    )
                }
            }
        
        })
    })
})

// add_movie = (element)=>{
    // l
// }
// add_movie = (element)=>{
    // l
// }

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
