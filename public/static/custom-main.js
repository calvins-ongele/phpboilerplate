async function copy(item) {
  try {
    await navigator.clipboard.writeText(item);
    console.log(`"${item}" copied to cliboard.`);
    showToast(`"${item}" copied to cliboard.` );
  } catch (error) {
    fallbackCopyTextToClipboard(item);
  }
} 

function fallbackCopyTextToClipboard(text) {
  const textArea = document.createElement("textarea");
  textArea.value = text;
  document.body.appendChild(textArea);
  textArea.select();
  try {
    document.execCommand("copy");
    console.log("Fallback: Copying text command was successful");
  } catch (err) {
    console.error("Fallback: Oops, unable to copy", err);
  }
  document.body.removeChild(textArea);
}

function showToast(text, bg = 'bg-danger') {
 
  const toastLiveExample = document.getElementById("liveToast");
  toastLiveExample.querySelector('.toast-body').innerHTML = text;
  toastLiveExample.classList.add(bg);

  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
  toastBootstrap.show();
 
}

function setCookie(cname, value, days = 30) {
      const date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      const expires = "expires=" + date.toUTCString();
      document.cookie = `${encodeURIComponent(cname)}=${encodeURIComponent(value)};${expires};path=/;SameSite=Lax;secure`;
}


$(document).ready(function () {
     
     
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
        formData.append('body', CKEDITOR.instances.contentArea.getData() );
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
  
  
  $('.editBtn').click(function(e) {
      e.preventDefault();
      
      const contid = $(this).attr('rel');
      $('body').append(`<script>location.href='/settings/?cont_id=${contid}&return=${location.href}'</script>`);
  });
  
 
  
  
});

 
 
 
update_analytics();
function update_analytics() {
    const payload = {
    timestamp: Date.now(), // or new Date().toISOString()
    referrer: document.referrer || null,
    user_agent: navigator.userAgent,
    screen_resolution: `${window.screen.width}x${window.screen.height}`,
    page_url: window.location.href,
  };

  fetch('/myapp/update_analytics', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload)
  }).catch(() => {});
} 
    
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
            // error: function (e) {
            //     console.log(e);
            //   // alert("An error occurred. Check your internet connection")
            // }
        });

        return data;
    } 
 
