@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Biz Kimik</h1>
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
                     <input type="hidden" name="nizam" value="umumi" />
                     <div class="example-wrap">
                        <h4 class="example-title">Title</h4>
                        <input type="text" class="form-control round" name="about_title" value="{{$setting->about_title}}">
                     </div>
                     <div class="example-wrap">
                         <h4 class="example-title">Məzmun</h4>
                         <textarea class="form-control" name="about_description" rows="15">{{$setting->about_description}}</textarea>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Cari Şəkil</h4>
                        <img width="150" src="{{asset($setting->about_img)}}" />         
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Şəkil</h4>
                        <input type="file" class="filestyle" name="about_img"  data-buttonname="btn-secondary" > 
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

@push('script')
<script type="text/javascript" src="/back/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="/back/tinymce.js"></script>
@endpush