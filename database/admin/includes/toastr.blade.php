<script>

    @if( Session::has('info') )
        toastr.info(" {{ Session::get('info') }} ")
    @endif

    @if( Session::has('success') )
        toastr.success(" {{ Session::get('success') }} ")
    @endif

    @if( Session::has('danger') )
        toastr.danger(" {{ Session::get('danger') }} ")
    @endif
</script> 
