 

 // Click the hidden file input when the button is clicked
    $("#uploadButton").click(function() {
        $("#fileInput").click();
    });

    // Handle file selection and upload
    $("#fileInput").change(function() {
        let file = this.files[0]; // Get the selected file
        let formData = new FormData();
        formData.append("file", file); 
        formData.append("emp",  $('#emp').val() );  

         const data = _data(formData, 'new_emps_excel');  
         
        if (data['error'] == 'false') { 
            location.reload();
            $('#newsalo').trigger('reset');
        } else {
            alert(data['msg'] )
        }
    
    });
    
 
 
$('.ucdata').change(function() {
	   const val = $(this).val();
	   const rel = $(this).attr('rel');
	   let formdata = new FormData();
	   formdata.append('val', val);
	   formdata.append('col', rel);  
	   
	   let resp = _data(formdata, 'update_company');
	   $('.'+rel).html((resp['error']=='false')?"<span class='text-success'>Changes Saved</span>":"<span class='text-danger'>"+resp['msg']+"</span>");
	});
	
$('#newblog').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    form.append('body',  CKEDITOR.instances.ckeditor.getData() );
    const data = _data(form, 'newblog');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ; 
});
   

$('.udata').change(function() {
    const rel = $(this).attr('rel');
    const val = $(this).val();
    let form = new FormData();
    form.append('col', rel);
    form.append('val', val);
    form.append('id', $('.udataid').val() );
    const data = _data(form, 'edituser');
    
    $('.'+rel).addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.'+rel).html(data['msg']) ;
});

  
$('#changepassword').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'changepass');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']) ;
    if (data['error'] == 'false') $('#changepassword').trigger('reset');
});
 
 
  $(".universal-form").on("submit", function (e) {
    e.preventDefault();

    const $form = $(this);
    const endpoint = $form.data("url");
    const feedbackClass = $form.data("feedback"); 
    const datackeditor = $form.data("ckeditor");
    if (!endpoint) {
      console.error("No endpoint defined.");
      return;
    } 
    const $feedback = feedbackClass ? $("." + feedbackClass) : null;
    $feedback.html(`<div class=""></div>`);
    const formData = new FormData(this); 
  
 
    if ( datackeditor   ) {   
        const contentbody = CKEDITOR.instances.ckeditor.getData();
        console.log(contentbody);
        formData.append('body', contentbody );
    }
    
    const response = _data(formData, endpoint );
    
    let msg;
    
    if (response['error'] == 'true') {
        msg = response.msg || "Error!";
        $feedback.html(`<div class="error">${msg}</div>`).fadeIn();
       
    } else {
        msg = response.msg || "Error!";
        $feedback.html(`<div class="success">${msg}</div>`).fadeIn();
        
        if (endpoint == 'content_update') {
            const xreturn = $('.xreturn').val();
            $feedback.append(`<div class="success"><script>window.location.href='${xreturn}'</script></div>`).fadeIn();
        }
    }
    

 
  });
    












 function _data(form_data, url = '', cl = 'submit_btn1' ) {
     
    const list = ['onlyonline', 'new'];
     
    const originalval = $('.'+cl).val();
     
    let data;
    $.ajax({
        url : '/myapp/' + url,
        type : 'post',
        async: false,
        contentType : false,
        processData : false,
        beforeSend: function() {
            $('.'+ cl).val('Loading...'); 
        },
        data : form_data,
        dataType: 'json', 
        success : function(data1) {
            data = data1;     
            $('.'+ cl).val(originalval);
        }
    });

    return data;
} 