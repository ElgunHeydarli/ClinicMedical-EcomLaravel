@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Əlaqə Məlumatları</h1>
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
                           <th>Ünvan</th>
                           <td><input type="text" class="form-control round" name="address" value="{{$setting->address}}" required></td>
                        </tr>
                        <tr>
                           <th>Əlaqe Nömrəsi</th>
                           <td><input type="tel" class="form-control round" name="tel" value="{{$setting->tel}}" required></td>
                        </tr>
                        {{--
                        <tr>
                           <th>Əlaqe Nömrəsi-2</th>
                           <td><input type="tel" class="form-control round" name="tel2" value="{{$setting->tel2}}" required></td>
                        </tr>
                        --}}
                        <tr>
                           <th>E-mail</th>
                           <td><input type="email" class="form-control round" name="email" value="{{$setting->email}}" required></td>
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