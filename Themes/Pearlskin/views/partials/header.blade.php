<header class="header
            @if(Request::route()->getName() === 'homepage')
        {{--header-fixed-top--}}
        {{--header-transparent--}}
    @endif">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('/'.locale()) }}"><span>PEARL</span>SKIN</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                {!! Menu::render('main', 'navbar-language-switcher') !!}
            </div>
        </nav>
    </div>
</header>
{{--<script>--}}
    {{--$(window).scroll(function () {--}}
        {{--var scroll = $(window).scrollTop();--}}
        {{--//>=, not <=--}}
        {{--if (scroll >= 500) {--}}
            {{--//clearHeader, not clearheader - caps H--}}
            {{--$(".header-fixed-top").removeClass("header-transparent");--}}
        {{--} else {--}}
            {{--$(".header-fixed-top").addClass("header-transparent");--}}
        {{--}--}}
    {{--}); //missing );--}}
{{--</script>--}}
