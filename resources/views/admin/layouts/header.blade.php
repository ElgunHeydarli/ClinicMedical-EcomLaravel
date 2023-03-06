<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{App::currentLocale()}}">
 <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta name="description" content="bootstrap admin template">
      <meta name="author" content="">
      <title>Smartvision | Admin Panel</title>
      <link rel="apple-touch-icon" href="{{asset('back/base/assets/images/apple-touch-icon.png')}}">
      <link rel="shortcut icon" href="{{asset('back/base/assets/images/favicon.ico')}}">
      <!-- Stylesheets -->
      <link rel="stylesheet" href="{{asset('back/global/css/bootstrap.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/css/bootstrap-extend.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/base/assets/css/site.min599c.css?v4.0.2')}}">

      <!-- Plugins For This Page -->
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-bs4/dataTables.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2')}}">

      <!-- Page -->
      <link rel="stylesheet" href="{{asset('back/base/assets/examples/css/dashboard/v1.min599c.css?v4.0.2')}}">
      <!-- Fonts -->
      <link rel="stylesheet" href="{{asset('back/global/fonts/web-icons/web-icons.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2')}}">
      <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
      <link rel="stylesheet" href="{{asset('back/global/fonts/font-awesome/font-awesome.min599c.css?v4.0.2')}}">
      <link rel="stylesheet" href="{{asset('back/global/fonts/weather-icons/weather-icons.min599c.css?v4.0.2')}}">
      <!-- Page -->
      <link rel="stylesheet" href="{{asset('back/base/assets/examples/css/pages/profile.min599c.css?v4.0.2')}}">
      <!-- Plugins For This Page -->
      <!-- DataTables -->
      <link href="{{asset('back/global/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('back/global/vendor/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
      <!-- Responsive datatable examples -->
      <link href="{{asset('back/global/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="{{asset('back/global/css/bootstrap-toggle.min.css')}}">
      <!-- Page -->
      <link rel="stylesheet" href="{{asset('back/base/assets/examples/css/tables/datatable.min599c.css?v4.0.2')}}">
      <!-- Page -->
      <link rel="stylesheet" href="{{asset('back/base/assets/examples/css/uikit/badges.min.css?v4.0.2')}}">
      <!-- Scripts -->
      @stack('style')

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/8013c9a5df.js"></script>
      <script src="{{asset('back/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2')}}"></script>
      <script type="text/javascript" src="{{asset('back/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
      <script>
         Breakpoints();
      </script>
      @toastr_css
   </head>
   <body class="animsition dashboard">
      <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-expand-md"
         role="navigation">
         <div class="navbar-header">
            <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
               data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
               data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
               <img class="navbar-brand-logo" src="{{asset('back/base/')}}/assets/images/logo.png" title="Remark">
               <span class="navbar-brand-text hidden-xs-down"> Smartvision</span>
            </div>
         </div>
         <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
               <!-- Navbar Toolbar -->
               <ul class="nav navbar-toolbar">
                  <li class="nav-item hidden-float" id="toggleMenubar">
                     <a class="nav-link" data-toggle="menubar" href="#" role="button">
                     <i class="icon hamburger hamburger-arrow-left">
                     <span class="sr-only">Toggle menubar</span>
                     <span class="hamburger-bar"></span>
                     </i>
                     </a>
                  </li>
               </ul>
               <!-- End Navbar Toolbar -->
               <!-- Navbar Toolbar Right -->
               <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                 <li class="nav-item dropdown">
                     <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                        data-animation="scale-up" role="button">
                     <span class="avatar avatar-online">
                     <img src="{{asset('back/base/')}}/../global/portraits/5.jpg" alt="...">
                     <i></i>
                     </span>
                     </a>
                     <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('admin.profil')}}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                        <a class="dropdown-item" href="{{route('admin.setting.general')}}" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" role="menuitem"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        <i class="icon wb-power" aria-hidden="true"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                        </form>
                     </div>
                  </li>


               </ul>
               <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->
         </div>
      </nav>
