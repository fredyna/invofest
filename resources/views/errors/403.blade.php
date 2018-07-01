<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Access Denied</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Informatics Vocational Festival" />
        <meta name="keywords" content="informatics, vocational, festival, seminar, workshop, competition" />
        <meta name="author" content="Invofest 2018" />
        <!-- shorcut icon -->
        <link rel="icon" type="image/png" href="{{ url('img/logo/invofest_logo.png') }}">
        <link href="{{ url('css/app.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('font-awesome/css/font-awesome.min.css') }}" />
        <link href="{{ url('css/page.css') }}" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
    </head>
<body>

        <!-- Error Page -->
            <div class="error">
                <div class="container-floud">
                    <div class="col-xs-12 ground-color text-center">
                        <div class="container-error-404">
                            <div class="clip"><div class="shadow"><span class="digit digitKetiga"></span></div></div>
                            <div class="clip"><div class="shadow"><span class="digit digitKedua"></span></div></div>
                            <div class="clip"><div class="shadow"><span class="digit digitPertama"></span></div></div>
                            <div class="msg">Opss!<span class="triangle"></span></div>
                        </div>
                        <h2 class="h1">You do not have permission!</h2>
                    </div>
                </div>
            </div>
        <!-- Error Page -->
</body>
<script src="{{ url('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ url('js/app.js') }}" type="text/javascript"></script>
<script>
    function randomNum()
       {
           "use strict";
           return Math.floor(Math.random() * 9)+1;
       }


        // 503
        var loop1,loop2,loop3,time=30, i=0, number, selector3 = document.querySelector('.digitKetiga'), selector2 = document.querySelector('.digitKedua'),
        selector1 = document.querySelector('.digitPertama');
        loop3 = setInterval(function()
        {
        "use strict";
        if(i > 40)
        {
            clearInterval(loop3);
            selector3.textContent = 4;
        }else
        {
            selector3.textContent = randomNum();
            i++;
        }
        }, time);
        loop2 = setInterval(function()
        {
        "use strict";
        if(i > 80)
        {
            clearInterval(loop2);
            selector2.textContent = 0;
        }else
        {
            selector2.textContent = randomNum();
            i++;
        }
        }, time);
        loop1 = setInterval(function()
        {
        "use strict";
        if(i > 100)
        {
            clearInterval(loop1);
            selector1.textContent = 3;
        }else
        {
            selector1.textContent = randomNum();
            i++;
        }
    }, time);

</script>

</html>
