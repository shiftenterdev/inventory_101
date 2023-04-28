<script src="https://cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    CKEDITOR.replace( 'description' );
    let prefix = "{{config('lfm.url_prefix')}}";
    $('#lfm').filemanager('image', {prefix: prefix});
</script>
