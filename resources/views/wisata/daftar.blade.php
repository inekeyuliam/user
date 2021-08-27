<!DOCTYPE html>
<html class="wide wow-animation" lang="en"> 
  <head>
    <!-- Site Title-->
    <title>Sistem Rekomendasi Wisata Jawa Timur</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]--> 
  </head>
  <body>
    <!-- Page preloader-->
    <div class="page-loader"> 
      <div class="page-loader-body"> 
        <div class="preloader-wrapper big active"> 
          <div class="spinner-layer spinner-blue"> 
            <div class="circle-clipper left">
              <div class="circle"> </div>
            </div>
            <div class="gap-patch">
              <div class="circle"> </div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
          <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="gap-patch">
              <div class="circle"> </div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
          <div class="spinner-layer spinner-yellow"> 
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="gap-patch">
              <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"> </div>
            </div>
          </div>
          <div class="spinner-layer spinner-green"> 
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="gap-patch">
              <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page-->
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-default">
          <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="2px" data-lg-stick-up-offset="2px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true">
          <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand"><P>SISTEM REKOMENDASI WISATA, HOTEL, PERSEWAAN DI JAWA TIMUR</P></div>
              </div>
              <div class="rd-navbar-aside-center">
                <div class="rd-navbar-nav-wrap">
                  <ul class="rd-navbar-nav">
                    <li><a href="/"> HOME</a> </li>

                    <!-- Example single danger button -->
                    <li class="active"><a href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Tempat Wisata</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/wisata">Daftar Wisata</a>
                        <a class="dropdown-item" href="/rekomendasi/wisata">Rekomendasi Wisata</a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <!-- <a class="dropdown-item" href="#">Separated link</a> -->
                      </div>
                    </li>
                    <li><a href="/hotel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hotel</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/hotel">Daftar Hotel</a>
                        <a class="dropdown-item" href="/rekomendasi/hotel">Rekomendasi Hotel</a>
                      </div>
                    </li>
                    <li><a href="/persewaan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Persewaan</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/persewaan">Daftar Persewaan</a>
                        <a class="dropdown-item" href="/rekomendasi/persewaan">Rekomendasi Persewaan</a>
                      </div>
                    </li>
                    <li><a href="profile"> ABOUT</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="section">
        <div class="swiper-form-wrap">
          <!-- Swiper-->
         
        </div>
      </section>
        <section class="section section-variant-1 bg-default novi-background bg-cover"> 
            <div class="container container-wide">
            <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
                <div class="col-xl-8">
                <div class="parallax-text-wrap">
                    <h3>Daftar Wisata di Jawa Timur</h3>
                </div>
                <hr class="divider divider-decorate">
                </div>
                <div class="col-xl-3 text-xl-right"><a class="button button-secondary button-nina" href="/daftar/wisata">Bandingkan Wisata</a></div>
            </div>
            <div class="row row-50">
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <figure class="event-default-image"><img src="{{asset('images/landing-private-airlines-01-570x370.jpg')}}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">France, Paris</a></h5><span class="heading-5">from $280</span>
                    </div>
                </article>
                </div>
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <figure class="event-default-image"><img src="{{asset('images/landing-private-airlines-02-570x370.jpg')}}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">USA, Boston</a></h5><span class="heading-5">from $480</span>
                    </div>
                </article>
                </div>
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <figure class="event-default-image"><img src="{{asset('images/landing-private-airlines-03-570x370.jpg')}}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">Italy, Venice</a></h5><span class="heading-5">from $350</span>
                    </div>
                </article>
                </div>
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <figure class="event-default-image"><img src="{{asset('images/landing-private-airlines-04-570x370.jpg')}}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">Spain, Benidorm</a></h5><span class="heading-5">from $350</span>
                    </div>
                </article>
                </div>
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <figure class="event-default-image"><img src="{{asset('images/landing-private-airlines-05-570x370.jpg')}}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">Egypt,  Sharm El Sheikh</a></h5><span class="heading-5">from $520</span>
                    </div>
                </article>
                </div>
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <figure class="event-default-image"><img src="{{asset('images/landing-private-airlines-06-570x370.jpg')}}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">UK, London</a></h5><span class="heading-5">from $600</span>
                    </div>
                </article>
                </div>
            </div>
            </div>
        </section>
 
      <footer class="section page-footer page-footer-minimal novi-background bg-cover text-center bg-gray-darker">
        <div class="container container-wide">
          <div class="row row-fix justify-content-sm-center align-items-md-center row-30">
            <div class="col-md-10 col-lg-7 col-xl-4">
              <p class="right">&#169;&nbsp;<span class="copyright-year"></span> All Rights Reserved. Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">TemplateMonster</a></p>
            </div>
            <div class="col-md-10 col-lg-7 col-xl-4 text-xl-right">
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"> </div>
    <!-- Javascript-->
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
  </body>
</html>