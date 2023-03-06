@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Sosial Şəbəkəələr</h1>
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
                     <table class="table table-hover  table-striped w-full">
                        <tr>
                           <th>Facebook</th>
                           <td><input type="url" class="form-control round" name="facebook" value="{{$setting->facebook}}" required></td>
                        </tr>
                        <tr>
                           <th>Instagram</th>
                           <td><input type="url" class="form-control round" name="instagram" value="{{$setting->instagram}}" required></td>
                        </tr>
                        <tr>
                           <th>Youtube</th>
                           <td><input type="url" class="form-control round" name="linkedin" value="{{$setting->linkedin}}" required></td>
                        </tr>
                     </table>
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