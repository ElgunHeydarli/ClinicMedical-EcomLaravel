@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Sayıtların Hazırlanması - SEO</h1>
   </div>
   <div class="page-content">
      <!-- Panel Form Elements -->
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-md-12 col-lg-12">
         
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
                  <!-- Example Rounded Input -->
                  <form method="POST" action="{{route('admin.setting.update')}}" enctype="multipart/form-data">
                     @csrf
                     <div class="example-wrap">
                        <h4 class="example-title">Title</h4>
                        <input type="text" class="form-control round" id="site_title" name="site_title" value="{{ $setting->site_title }}">
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Description</h4>
                        <input type="text" class="form-control round" id="site_description" name="site_description" value="{{ $setting->site_description }} ">
                     </div>
                     <button type="submit" class="btn btn-animate btn-animate-side btn-success float-right">
                     <span><i class="icon wb-edit" aria-hidden="true"></i>Yenilə</span>
                     </button>
                  </form>
                  <!-- End Example Rounded Input -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Page -->
@endsection