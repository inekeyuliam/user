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
      <header class="section page-header breadcrumbs-custom-wrap bg-gradient bg-secondary-2 novi-background bg-cover">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-default">
          <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="2px" data-lg-stick-up-offset="2px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true">
          <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand"><P>SISTEM REKOMENDASI WISATA JAWA TIMUR</P></div>
              </div>
              <div class="rd-navbar-aside-center">
                <div class="rd-navbar-nav-wrap">
                  <ul class="rd-navbar-nav">
                    <!-- Example single danger button -->
                    <li class="active"><a href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Rekomendasi Wisata</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/wisata">Daftar Wisata</a>
                        <a class="dropdown-item" href="/rekomendasi/wisata">Rekomendasi Wisata</a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <!-- <a class="dropdown-item" href="#">Separated link</a> -->
                      </div>
                    </li>
                    <li><a href="/hotel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Rekomendasi Hotel</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/hotel">Daftar Hotel</a>
                        <a class="dropdown-item" href="/rekomendasi/hotel">Rekomendasi Hotel</a>
                      </div>
                    </li>
                    <li><a href="/persewaan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Rekomendasi Persewaan</a>
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
        <!-- Breadcrumbs-->
        <section class="breadcrumbs-custom" style="background: url(&quot;images/backgroundhasil.png&quot;); background-size: cover;">
          <div class="container">
            <h1 class="breadcrumbs-custom-subtitle">Detail Persewaan</h1>
          </div>
        </section>
      </header>
      <section class="section section-lg bg-default">
        <div class="container container-bigger">
        <div class="row row-50 justify-content-md-center align-items-lg-center justify-content-xl-between flex-lg-row-reverse">
            <div class="col-md-10 col-lg-6 col-xl-5">
              <h3>{{ $list->nama_persewaan }}</h3>
              <div class="divider divider-decorate"></div>
             @if($list['rating'] == 4.5 || $list['rating'] > 4.5 )
              <p class="heading-5">  
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                {{$list['rating']}} / 5</p>
              @elseif($list['rating'] == 4.0 || $list['rating'] < 4.5  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5</p>
              @elseif($list['rating'] == 3.0 || $list['rating'] < 4.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5</p> 
              @elseif($list['rating'] == 2.0 || $list['rating'] < 3.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5</p> 
              @elseif($list['rating'] == 1.0 || $list['rating'] < 2.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5</p>              
              @endif
              <!-- <p class="text-spacing-sm">Alamat : {{$list['alamat']}}</p> -->
              <!-- <p class="text-spacing-sm">Waktu Operasional : {{$list['jam_buka']}} -  {{$list['jam_tutup']}} </p> -->
             
              <p class="text-spacing-sm">Keterangan : {{$list['keterangan']}}  </p>
              <a class="button button-default-outline button-nina" id="review">Tulis Review </a>
              </div>
              <div class="col-md-10 col-lg-6">
                  <img src="{{ asset('images/'.$gambar->filename) }}" alt="" width="720" height="459"/>
            </div>
          </div>
        </div>        
        <div class="modal fade" id="loginModal" tabindex="-1" role="">
            <div class="modal-dialog modal-login" role="document">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                          <div class="card-header card-header-primary text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                              <i class="material-icons">clear</i>
                            </button>

                            <h4 class="card-title">Log in</h4>
                            <div class="social-line">
                              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-facebook-square"></i>
                              </a>
                              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-twitter"></i>
                              <div class="ripple-container"></div></a>
                              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-google-plus"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="" action="">
                                <p class="description text-center">Or Be Classical</p>
                                <div class="card-body">

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">face</i></div>
                                          </div>
                                          <input type="text" class="form-control" placeholder="First Name...">
                                        </div>
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">email</i></div>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Email...">
                                        </div>
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                                          </div>
                                          <input type="password" placeholder="Password..." class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <section class="section section-lg bg-default text-center">
        <div class="container container-wide">
          <div class="row row-fix row-50 row-custom-bordered">
            <div class="col-sm-6 col-lg-3">
              <!-- Box minimal-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-map-marker"></div>
                <h6>Alamat</h6>
                <div class="box-simple-text">{{$list['alamat']}}</div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <!-- Box simple-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-phone"></div>
                <h6>Telepon</h6>
                <div class="box-simple-text">
                  <ul class="list-comma list-0">
                    @if($list['no_wa'] == '')
                    <li class="icon mdi mdi-phone"> {{$list['no_telp']}}</li>
                    @else
                    <li class="icon mdi mdi-phone">{{$list['no_telp']}}</li>
                    <li class="icon mdi mdi-whatsapp">{{$list['no_wa']}}</li>
                    @endif
                  </ul>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <!-- Box simple-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-web"></div>
                <h6>Social Media</h6>
                <div class="box-simple-text">
                  <ul class="list-comma list-0">
                  @if($list['link_ig'] == '')
                  <li class="icon mdi mdi-facebook"><a href="{{$list['link_fb']}}"> {{$list['nama_persewaan']}} </a></li>
                  @else
                    <li class="icon mdi mdi-facebook"><a href="{{$list['link_fb']}}"> {{$list['nama_persewaan']}} </a></li>
                    <li class="icon mdi mdi-instagram"><a href="{{$list['link_ig']}}"> {{$list['nama_persewaan']}} </a></li>
                  @endif
                  </ul>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <!-- Box simple-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-calendar-clock"></div>
                <h6>Waktu Operasional</h6>
                <div class="box-simple-text">
                  <ul class="list-0">
                    <li> {{$list['jam_buka']}} -  {{$list['jam_tutup']}}</li>
                    <!-- <li>Sat–Sun: 11:00 am–4:00 pm</li> -->
                  </ul>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-lg bg-default text-center">
        <div class="container container-wide">
          <h3>Review Wisata</h3>
          <div class="divider divider-decorate"></div>
          <div class="row row-50 row-xxl-90 justify-content-sm-center offset-custom-2">
          @foreach($review as $rev)
            <div class="col-md-6 col-lg-3">
              <div class="team-classic team-classic-circle">
              @if($rev->rate == 4.5 || $rev->rate > 4.5 )
              <p class="heading-5">  
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
              </p>
              @elseif($rev->rate == 4.0 || $rev->rate < 4.5  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                </p>
              @elseif($rev->rate == 3.0 || $rev->rate < 4.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </p> 
              @elseif($rev->rate == 2.0 || $rev->rate < 3.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </p> 
              @elseif($rev->rate == 1.0 || $rev->rate < 2.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  </p>              
              @endif
              <h5><a class="team-classic-title" href="#"> {{$rev->nama}}</a></h5>
                <div class="team-classic-caption">
                  <p> {{$rev->review}}</p>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </section>
      <section class="section section-wrap bg-gray-lighter novi-background bg-cover">
        <div class="section-wrap-inner">
          <div class="container container-bigger">
            <div class="row row-fix row-50">
              <div class="col-lg-8 col-xl-7">
                <div class="section-wrap-content section-lg">
                  <h3>Tulis Review</h3>
                  <hr class="divider divider-left divider-secondary">
                  <!-- RD Mailform-->
                  <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{url('review/persewaan/'.$list['id'])}}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
                  <div class="row row-fix row-20">
                      <div class="col-md-6">
                        <div class="form-wrap form-wrap-validation">
                          <label class="form-label-outside" for="form-1-name">Nama</label>
                          <input class="form-input" id="form-1-name" type="text" name="name" data-constraints="@Required"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-wrap form-wrap-validation">
                          <label class="form-label-outside" for="form-1-phone">Rate</label>
                          <input class="form-input" id="form-1-phone" type="text" name="rate" data-constraints="@Numeric @Required"/>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-wrap form-wrap-validation">
                          <label class="form-label-outside" for="form-1-message">Review</label>
                          <textarea class="form-input" id="form-1-message" name="review" data-constraints="@Required"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12 offset-custom-1">
                        <div class="form-button">
                          <button class="button button-secondary button-nina" type="submit">Simpan</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="section-wrap-aside">
            <!-- RD Google Map-->
            <div class="google-map-container google-map-with-icon rd-google-map__model" data-zoom="5" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:60}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:40},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;administrative.province&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:30}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ef8c25&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b6c54c&quot;},{&quot;lightness&quot;:40},{&quot;saturation&quot;:-40}]},{}]">
              <div class="google-map"></div>
              <ul class="google-map-markers">
                <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
              </ul>
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