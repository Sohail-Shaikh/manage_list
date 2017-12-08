function preview_image(event) 
{
   var reader = new FileReader();
   reader.onload = function()
   {
    var output = document.getElementById('output_image');
    output.src = reader.result;
   }
   reader.readAsDataURL(event.target.files[0]);
}

function submitForm(){
  
 var validator = $("#my_form_id").validate({
   errorClass: "my-error-class",
   validClass: "my-valid-class",
  rules: 
  {                
      FirstName: {
   required: true,
   },
      LastName: {
    required: true,
   },
      user_no: {
    required: true,
  },
      user_city: {
    required: true,
  },
      user_dob: {
    required:true,
  },
    user_mobile_no: {
    required: true,
  },
      user_email:
    {
    required: true,
    email: true,
   },
      'user_lang[]': {
    required: true,
   },
      user_img:{
    required: true,
   },
},                                
     messages: {
     FirstName: " Please enter first name",
     LastName: " Please enter last name",
     user_no: " Please enter user no",
     user_city: " please enter city",
     user_dob: " Please enter Date of Birth",
     user_mobile_no: " Please enter mobile no",
     user_email: {
      required: "Enter your Email",
      email: "Please enter a valid email address.",
     },
     'user_lang[]':" <br>Please select aleast one language<br>",
     user_img: " Please select the image",
     },
    // submitHandler: function(form) 
    // {
    //   // var form_data = new FormData($('form')[0]);
    //   var datas=
    //   var arr = jQuery.makeArray( $('form')[0] );
      
    //   alert(arr);
    //   // console.log(form_data);

       
    // //   for (var datas of formdata.entries()) { 
    // //    console.log(datas);
    // // }
    //     // var arrs=JSON.stringify(arr);
    //   //  $.ajax({ 
    //   //    data: {action: 'insert_ajax_request',arr },
    //   //    type: 'post',
    //   //    url: MyAjax.ajaxurl,
    //   //    // stringyfy before passing
    //   //    success: function(response) {
    //   //         alert(response); //should print out the name since you sent it along

    //   //     }
    //   // });
                
    //  }
 });
}

// $('#my_form_id').submit(function(e){
//     var datas = $("#my_form_id").serialize(this);
//     // alert(datas);
//     $.ajax({ 
//          data: {action: 'insert_ajax_request', datas:datas},
//          type: 'post',
//          url: MyAjax.ajaxurl,
//          success: function(response) {
//               alert(response); //should print out the name since you sent it along

//         }
//     });

// });

// $(document).ready(function() {
//   $('#my_form_id').submit(function(event) {
//     event.preventDefault();
//     //enter code here
//     var formdata = new FormData(this);

   
// for (var [key, value] of formdata.entries()) { 
//   console.log(key, value);
// }
//   });
// });

// $('#my_form_id').bind('submit', function() {
//     var form_data = new FormData($('form')[0]);
//     jQuery.ajax({
//                 type:"post",
//                 url:ajax_url,
//                 data: {action: 'my_action', form_data: 'form_data'},
//                 success: function(msg) {
//                     if (msg.type == "success") {

//                         alert(msg);
//                     }
//                     else {

//                         handleFormError();
//                     }
//                 }
//             });

//             return false;
// }); 

function updateForm(){
  
 var validator = $("#my_form_id").validate({
   errorClass: "my-error-class",
   validClass: "my-valid-class",
  rules: 
  {                
      FirstName: {
   required: true,
   },
      LastName: {
    required: true,
   },
      user_no: {
    required: true,
  },
      user_city: {
    required: true,
  },
      user_dob: {
    required:true,
  },
    user_mobile_no: {
    required: true,
  },
      user_email:
    {
    required: true,
    email: true,
   },
      'user_lang[]': {
    required: true,
   },
},                                
     messages: {
     FirstName: " Please enter first name",
     LastName: " Please enter last name",
     user_no: " Please enter user no",
     user_city: " please enter city",
     user_dob: " Please enter Date of Birth",
     user_mob: " Please enter mobile no",
     user_email: {
      required: "Enter your Email",
      email: "Please enter a valid email address.",
     },
     'user_lang[]':" <br>Please select aleast one language<br>",
     },
 });
}


jQuery(document).ready(function($){

  var mediaUploader;

  $('#upload-button').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#image').val(attachment.url);
       $('#output_image').attr('src',attachment.url).css('width=25');
    });
    // Open the uploader dialog
    mediaUploader.open();
  });

});


// function search() 
// {
//   var query_value = $('#searchKey').val();
//   if(query_value !== '')
//   {
//   $.ajax({
//   type: "POST",
//   url: "ajaxCallProcess.php",
//   data: { searching: query_value },
//   cache: false,
//   dataType: 'html',
//   success: function(data)
//     {
//      $("#search_output").html(data).show();
//        //alert(data);
//        console.log(data);    
//      }
//   });
//   }
// return false;
// }



//    function onclickFunction(aId){
//      alert(aId);
//     $.ajax({
//         type: "POST",
//         url: "http://localhost/wordpress/wp-content/mu-plugins/manage_list/ajaxCall.php",
//         data: {aId},
//         success: function (data){
//             alert(data);
//         },
//         error: function (xhr, ajaxOptions, thrownError){
//           alert("error");
//         }
//     });
//     return false;
// }


//   $('#my_form_id').click('submit', function() {
 
//     // We'll pass this variable to the PHP function example_ajax_request
//     var form_data = new FormData($('form')[0]);
     
//     // This does the ajax request
//     $.ajax({
//         url:ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
//         data: {
//             'action': 'example_ajax_request',
//             'form_data':form_data
//         },
//         processData: false,
//         contentType: false,
//         success:function(data) {
//             // This outputs the result of the ajax request
//             // console.log(data);
//             alert(data);
//         },
//         error: function(errorThrown){
//             console.log(errorThrown);
//         }
//     });  
              
// });




// jQuery(document).ready(function($) {
 
//     // We'll pass this variable to the PHP function example_ajax_request
//     var fruit = 'Banana';
     
//     // This does the ajax request
//     $.ajax({
//         url: ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
//         data: {
//             'action': 'example_ajax_request',
//             'fruit' : fruit
//         },
//         success:function(data) {
//             // This outputs the result of the ajax request
//             // console.log(data);
//             alert(data);
//         },
//         error: function(errorThrown){
//             console.log(errorThrown);
//         }
//     });  
              
// });


// For Delete

// $(".delbutton").click(function(){
//     //Save the link in a variable called element
//     var element = $(this);

//     //Find the id of the link that was clicked
//     var del_id = element.attr('id');

//     //Built a url to send
//     var info = {"id" : del_id };
//       if(confirm("Are you sure you want to delete this Record?")) {
//         $.ajax({
//           type: "POST",
//           url: ajaxurl,
//           data: {
//             'action': 'example_ajax_request',info
//         },
//           success: function(data){
//             alert(data); 
//           }
//         });
//         // $(this).parents(".ffui-media-item").animate({ backgroundColor: "#fbc7c7" }, "fast")
//         //   .animate({ opacity: "hide" }, "slow");
//       }
//     return false;
//   });

jQuery(document).ready(function($) {
 
    // We'll pass this variable to the PHP function example_ajax_request
    $(".delbutton").click(function(){
    //Save the link in a variable called element
    var element = $(this);

    //Find the id of the link that was clicked
    var del_id = element.attr('id');
    var $ele = $(this).parent().parent();
    //Built a url to send
    var info = {"id" : del_id };
      if(confirm("Are you sure you want to delete this Record?")) {
        $.ajax({
          type: "POST",
          url: ajaxurl,
          data: {
            'action': 'delete_ajax_request',info
        },
          success: function(html){
            // alert(data);
             $ele.fadeOut().remove();
          }
        });
        // $(this).parents(".ffui-media-item").animate({ backgroundColor: "#fbc7c7" }, "fast")
        //   .animate({ opacity: "hide" }, "slow");
      }
    return false;
  });
              
});