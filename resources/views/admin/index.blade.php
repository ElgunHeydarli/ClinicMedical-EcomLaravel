@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title font-size-26 font-weight-100">Statistik Məlumatlar</h1>
   </div>
   <div class="page-content container-fluid">
      <div class="row">
         <!-- First Row -->
         <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
               <div class="card-block bg-white p-20">
                  <a href="#" type="button" class="btn btn-floating btn-sm btn-danger">
                  <i class="icon wb-menu" style="margin-top:8px"></i>
                  </a>
                  <span class="ml-15 font-weight-400">Sifarişlər</span>
                  <div class="content-text text-center mb-0">
                     <i class="text-success icon wb-triangle-up font-size-20">
                     </i>
                     <span class="font-size-40 font-weight-100">{{$count_1}}</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
               <div class="card-block bg-white p-20">
                  <a href="#" type="button" class="btn btn-floating btn-sm btn-success">
                  <i class="icon wb-menu" style="margin-top:8px"></i>
                  </a>
                  <span class="ml-15 font-weight-400">Məhsullar</span>
                  <div class="content-text text-center mb-0">
                     <i class="text-success icon wb-triangle-up font-size-20">
                     </i>
                     <span class="font-size-40 font-weight-100">{{$count_2}}</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
               <div class="card-block bg-white p-20">
                  <a href="#" type="button" class="btn btn-floating btn-sm btn-primary">
                  <i class="icon wb-menu" style="margin-top:8px"></i>
                  </a>
                  <span class="ml-15 font-weight-400">Kateqoriyalar</span>
                  <div class="content-text text-center mb-0">
                     <i class="text-success icon wb-triangle-up font-size-20">
                     </i>
                     <span class="font-size-40 font-weight-100">{{$count_3}}</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 info-panel">
            <div class="card card-shadow">
               <div class="card-block bg-white p-20">
                  <a href="#" type="button" class="btn btn-floating btn-sm btn-warning">
                  <i class="icon wb-menu" style="margin-top:8px"></i>
                  </a>
                  <span class="ml-15 font-weight-400">Xəbərlər</span>
                  <div class="content-text text-center mb-0">
                     <i class="text-danger icon wb-triangle-up font-size-20">
                     </i>
                     <span class="font-size-40 font-weight-100">{{$count_4}}</span>
                  </div>
               </div>
            </div>
         </div>
      
         <!-- End First Row -->
      </div>
   </div>
</div>
@endsection