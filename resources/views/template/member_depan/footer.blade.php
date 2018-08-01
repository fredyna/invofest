<footer class="footer footer-default">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="https://fb.com/invofest/" class="wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0s">
                        <i class="fa fa-facebook fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/invofest/" class="wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <i class="fa fa-instagram fa-2x"></i> 
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCdaOcNM5ndtr2NLtmB5XuTg" class="wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1s">
                        <i class="fa fa-youtube fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="#" rel="tooltip" title="invofest@gmail.com" data-placement="bottom" class="wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="1.5s">
                        <i class="fa fa-envelope fa-2x"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright">
            Copyright &copy; 2018 by
            <a href="http://www.invofest.com" target="_blank">INVOFEST</a>
        </div>
    </div>
</footer>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{ url('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ url('js/app.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ url('js/plugins/bootstrap-switch.js') }}"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{ url('js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ url('js/TweenLite.min.js') }}"></script>
<script src="{{ url('js/EasePack.min.js') }}"></script>
@yield('header-gerak-js')
<script src="{{ url('js/plugins/wow.min.js') }}"></script>
<script src="{{ url('js/now-ui-kit.js?v=1.1.0') }}" type="text/javascript"></script>
<script>
new WOW().init();
$(document).ready(function(){
    $(".preloader").fadeOut();

    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function(){
                window.location.hash = hash;
            });
        }
    });
})
</script>
@yield('myscript')