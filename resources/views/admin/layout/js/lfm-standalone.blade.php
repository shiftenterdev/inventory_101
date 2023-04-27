<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    let prefix = "{{config('lfm.url_prefix')}}";
    $('#thumbnail').filemanager('image', {prefix: prefix});
</script>
