@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Ümumi Ayarları</h1>
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
                        <h4 class="example-title">Cari Logo</h4>
                        <img width="150" src="{{asset($setting->logo)}}" />         
                     </div>
                     <div class="example-wrap">
                          <h4 class="example-title">Logo</h4>
                          <input type="file" class="filestyle" name="logo"  data-buttonname="btn-secondary" > 
                    </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Cari Favicon</h4>
                        <img width="150" src="{{asset($setting->favicon)}}" />   
                     </div>
                     <div class="example-wrap">
                          <h4 class="example-title">Favicon</h4>
                          <input type="file" class="filestyle" name="favicon"  data-buttonname="btn-secondary" > 
                    </div>
                    <div class="example-wrap">
                        <h4 class="example-title">Cari Robots.txt</h4>
                           <a @if(!empty($setting->robots_txt)) href="{{asset($setting->robots_txt)}}" download @endif> 
                           <button type="button" class="btn btn-dark"><i class="icon wb-download" aria-hidden="true"></i> Download</button> 
                           </a>
                     </div>
                     <div class="example-wrap">
                          <h4 class="example-title">Robots.txt</h4>
                          <input type="file" class="filestyle" name="robot_txt"  data-buttonname="btn-secondary" > 
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