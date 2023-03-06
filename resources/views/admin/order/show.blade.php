@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">#ORDER-{{$data->id}}</h1>
   </div>
   <div class="page-content">
      <!-- Panel Form Elements -->
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-md-12 col-lg-12">


                 <table class="table table-hover  table-striped w-full">
                    <tr>
                       <th>Ad Soyad</th>
                       <td>{{ $data->name }} {{ $data->surname }}</td>
                    </tr>
                    <tr>
                       <th>Email</th>
                       <td>{{ $data->email }}</td>
                    </tr>
                    <tr>
                       <th>Əlaqə Nömrəsi</th>
                       <td>{{ $data->tel }}</td>
                    </tr>
                    <tr>
                       <th>Şəhər</th>
                       <td>{{ $data->city }}</td>
                    </tr>
                    <tr>
                       <th>Ünvan</th>
                       <td>{{ $data->address }}</td>
                    </tr>
                    <tr>
                       <th>Ünvan(Əlavə Qeyd)</th>
                       <td>{{ $data->address_2 }}</td>
                    </tr>
                    <tr>
                       <th>Qeyd</th>
                       <td>{{ $data->note }}</td>
                    </tr>
                    <tr>
                       <th>Ödəniş Metodu</th>
                       <td>{{ $data->payment_method }}</td>
                    </tr>
                 </table>           
                  <!-- End Exampleed Input -->
               </div>
               <table class="table table-bordered">
                <thead>
                   <tr align="center">
                      <th>Məhsulun Adı</th>
                      <th>Qiyməti</th>
                      <th>Məhsula Ətraflı Bax</th>
                   </tr>
                </thead>
                <tbody>
                   <tr align="center">
                      <td>{{$data->getProduct->title}}</td>
                      <td>{{$data->getProduct->price}}</td>
                      <td> 
                          <a href="{{ route('product.single', $data->getProduct->slug)}}" target="_blank" class="btn btn-outline-primary"><i class="icon wb-eye pri"></i></a>
                        </td>
                   </tr>
                   
                </tbody>
             </table>
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

