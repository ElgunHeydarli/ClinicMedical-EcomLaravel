
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">

  <title>Login | Admin Template</title>

  <link rel="apple-touch-icon" href="{{asset('back/base/pages/')}}/../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="{{asset('back/base/pages/')}}/../assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/css/bootstrap.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/css/bootstrap-extend.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../assets/css/site.min599c.css?v4.0.2">

  
  <!-- Plugins -->
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/vendor/animsition/animsition.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/vendor/switchery/switchery.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/vendor/intro-js/introjs.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">

  <!-- Page -->
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../assets/examples/css/pages/login.min599c.css?v4.0.2">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
  <link rel="stylesheet" href="{{asset('back/base/pages/')}}/../../global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
  <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">


  <!-- Scripts -->
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="animsition page-login layout-full page-dark">

  <!-- Page -->
  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <div class="brand">
        <img class="brand-img" src="{{asset('back/base/pages/')}}/../assets/images/logo.png" alt="...">
        <h2 class="brand-text">Xoş GƏLMİSİNİZ</h2>
      </div>
      

      @yield('content')

  


      <footer class="page-copyright page-copyright-inverse">
        <p>© 2020. Bütün Hüquqlar Qorunur.</p>
      </footer>
    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/popper-js/umd/popper.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/animsition/animsition.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2"></script>

  <!-- Plugins -->
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/switchery/switchery.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/intro-js/intro.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/screenfull/screenfull599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2"></script>

  <!-- Plugins For This Page -->
  <script src="{{asset('back/base/pages/')}}/../../global/vendor/jquery-placeholder/jquery.placeholder599c.js?v4.0.2"></script>

  <!-- Scripts -->
  <script src="{{asset('back/base/pages/')}}/../../global/js/Component.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/js/Plugin.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/js/Base.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/js/Config.min599c.js?v4.0.2"></script>

  <script src="{{asset('back/base/pages/')}}/../assets/js/Section/Menubar.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../assets/js/Section/GridMenu.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../assets/js/Section/Sidebar.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../assets/js/Section/PageAside.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../assets/js/Plugin/menu.min599c.js?v4.0.2"></script>

  <!-- Config -->
  <script src="{{asset('back/base/pages/')}}/../../global/js/config/colors.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../assets/js/config/tour.min599c.js?v4.0.2"></script>
  <script>
    Config.set('assets', '../assets');
  </script>

  <!-- Page -->
  <script src="{{asset('back/base/pages/')}}/../assets/js/Site.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/js/Plugin/slidepanel.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/js/Plugin/switchery.min599c.js?v4.0.2"></script>
  <script src="{{asset('back/base/pages/')}}/../../global/js/Plugin/jquery-placeholder.min599c.js?v4.0.2"></script>
  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>

</body>


</html>