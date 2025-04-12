<!-- TinyMCE -->
<script src="{{ url('/') }}/admin/plugins/tinymce/tinymce.js"></script>
<script>
    tinymce.init({
        selector: "textarea.tinymce",
        theme: "silver",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime nonbreaking save table directionality',
            'paste'
        ],
        toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',        
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{ url('/') }}/admin/plugins/tinymce';
    ////imagetools
</script>
