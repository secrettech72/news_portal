
@if (Request::session()->has('session'))
    <div class="alert alert-success session_messages">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
        {!! Request::session()->get('session') !!}
        <br>
    </div>
@endif
<script>
    setTimeout(function(){
        $('.session_messages').slideUp('slow');
    }, 5000);
</script>