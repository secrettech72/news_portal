


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{  auth()->check() ?auth()->user()->id : null }}" >
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Sanju Awal's News Paper - News &amp; Lifestyle Magazine Template</title>
    

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('newspaper/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('newspaper/style.css') }}">

</head>

<body>
<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
@include('news.common.nav')
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
{{--@include('news.common.breakingnews')--}}
<!-- ##### Hero Area End ##### -->

<!-- ##### Featured Post Area Start ##### -->

@yield('content')

<!-- ##### Featured Post Area End ##### -->
@include('news.common.footer')

<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
@include('news.common.scripts')
@yield('js')
<script>
    $(window).ready(function(){
        $('#search').keyup(function(){
        var query = $(this).val();
        if(query != ''){
            $.ajax({
                method:'POST',
                url:'{{ route('news.search') }}',
                data:{
                    _token:'{{ csrf_token() }}',
                    query:query,
                },
                success:function(response){
                    var data = $.parseJSON(response);
                    if(data.error){
                        alert('something is wrong try again later.');
                    }else{
                        $('.search_list').fadeIn();
                        $('.search_list').html(data.html);
                    }
                    
                }
            });
        }
    });
    });

    $(window).ready(function(){
        $('.search_list').on('click','li',function(){
            $('#search').val($(this).text());
            $('.search_list').fadeOut();
        });
    });
    
</script>
</body>

</html>
