<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>فرم ورود</title>
    <script src="/plugins/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="/plugins/meyer-reset/2.0/reset.min.css">


    <link rel="stylesheet" href="/css/login/style.css">


</head>

<body>

<div class="form">
    <div class="forceColor"></div>
    <div class="topbar">
        <div class="spanColor"></div>
        <form method="post">
        <input type="text" class="input" id="password" name="mobile" placeholder="شماره موبایل"/>
            @csrf
        </form>
    </div>
    <button class="submit" id="submit" >ورود</button>
</div>

{{--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>--}}
<script src="/plugins/jQuery/jQuery-2.2.0.min.js"></script>



<script >


    var form = $('.form');
    var btn = $('#submit');
    var topbar = $('.topbar');
    var input = $('#password');
    var article =$('.article');
    var tries = 0;
    var h = input.height();
    $('.spanColor').height(h+23);
    $('#findpass').on('click',function(){
        $(this).text('1234567890');
    });
    input.on('focus',function(){
        topbar.removeClass('error success');
        input.text('');
    });
    btn.on('click',function(event){
        event.preventDefault();
        if(tries<=2){
            var pass = $('#password').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/login',[{'mobile':pass,'csrf-token':"{{csrf_token()}}"}]).done(function(){
                setTimeout(function(){
                    btn.text('Success!');
                },250);
                topbar.addClass('success');
                form.addClass('goAway');
                article.addClass('active');
                tries=0;
                document.location='/';

            }).fail(function () {
                topbar.addClass('error');
                tries++;
                switch(tries){
                    case 0:
                        btn.text('Login');
                        break;
                    case 1:
                        setTimeout(function(){
                            btn.text('You have 2 tries left');
                        },300);
                        break;
                    case 2:
                        setTimeout(function(){
                            btn.text('Only 1 more');
                        },300);
                        break;
                    case 3:
                        setTimeout(function(){
                            btn.text('Recover password?');
                        },300);
                        input.prop('disabled',true);
                        topbar.removeClass('error');
                        input.addClass('disabled');
                        btn.addClass('recover');
                        break;
                        defaut:
                            btn.text('Login');
                        break;
                }

            });
            }
        else{
            topbar.addClass('disabled');
        }

    });

    $('.form').keypress(function(e){
        if(e.keyCode==13)
            submit.click();
    });
    input.keypress(function(){
        topbar.removeClass('success error');
    });
</script>




</body>

</html>
