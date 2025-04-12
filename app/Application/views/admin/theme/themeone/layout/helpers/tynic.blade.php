<!-- TinyMCE -->
<script src="{{ url('/') }}/admin/plugins/tinymce/tinymce.js"></script>
<script>
	function elFinderBrowser (callback, value, meta) {
    tinymce.activeEditor.windowManager.openUrl({
        title: 'File Manager',
        url: '{{ route('elfinder.tinymce5')}}',// use an absolute path!
        /**
         * On message will be triggered by the child window
         *
         * @param dialogApi
         * @param details
         * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
         */
        onMessage: function (dialogApi, details) {
            if (details.mceAction === 'fileSelected') {
                const file = details.data.file;

                // Make file info
                const info = file.name;

                // Provide file and text for the link dialog
                if (meta.filetype === 'file') {
                    callback(file.url, {text: info, title: info});
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype === 'image') {
                    callback(file.url, {alt: info});
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype === 'media') {
                    callback(file.url);
                }

                dialogApi.close();
            }
        }
    });
}
    tinymce.init({
        selector: "textarea.tinymce",
        theme: "silver",
        height: 300,
        language: 'en',
        file_browser_callback : elFinderBrowser,
				file_picker_callback : elFinderBrowser,
        plugins: [
            'autolink lists link image charmap preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table directionality',
            'emoticons template paste textpattern image link '
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'preview media | forecolor backcolor emoticons',
        image_advtab: true,
				valid_elements : '*[*]',
    });
    tinymce.suffix = ".min";

    tinyMCE.baseURL = '{{ url('/') }}/admin/plugins/tinymce';
    ////imagetools
</script>
