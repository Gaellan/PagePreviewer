/**
 * @author Gaëllan
 */

window.addEventListener("DOMContentLoaded", (event) => {
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .then( editor => {
            contentEditor = editor;
        } )
        .catch( error => {
            
        } );
        
       $submit = document.getElementById("previewSubmit");
       
       $submit.addEventListener('click', function(event){
           event.preventDefault();
           title = document.getElementById("title").value;
           
           formData = new FormData();
           formData.append('data', true);
           formData.append('title', title);
           formData.append('content', contentEditor.getData());
           
           const options = {
                method: 'POST',
                body: formData
            };
            
            fetch('https://maridoucet.sites.3wa.io/page-previewer/page-preview', options)
                .then(response => response.text())
                .then(data => {
                    preview = document.getElementById("previewContent");
                    preview.innerHTML = data;
                });
       });
  });