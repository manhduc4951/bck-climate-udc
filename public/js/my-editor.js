$(function() {
    console.log('WFTTTT');
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        height : "450",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,

        style_formats: [
            {
                title: 'Image Left',
                selector: 'img',
                styles: {
                    'float': 'left',
                    'margin': '0 10px 0 10px'
                }
            },
            {
                title: 'Image Right',
                selector: 'img',
                styles: {
                    'float': 'right',
                    'margin': '0 0 10px 10px'
                }
            }
        ],

        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            //var abs_path = "<?php echo url('/') ?>";
            //console.log(abs_path);
            //var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            var cmsURL = abs_path + '/laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);

});