@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Faydalı Məlumat Əlavə Etmə Paneli</h1>
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
                  <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="category" value="1">
                     <div class="example-wrap">
                        <h4 class="example-title">Başlıq</h4>
                        <input type="text" class="form-control" name="title" required/>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Məzmun</h4>
                        <textarea class="form-control" name="content" rows="10"></textarea>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Şəkil</h4>
                        <input type="file" class="filestyle" name="img"  data-buttonname="btn-secondary" required />
                    </div>
                      <div class="example-wrap">
                          <h4 class="example-title">Tarix</h4>
                          <input type="text" class="form-control" name="date" required/>
                      </div>
                     <button type="submit" class="btn btn-animate btn-animate-side btn-success float-right" id="uploadBtn">
                     <span><i class="icon wb-edit" aria-hidden="true"></i>Əlavə Et</span>
                     </button>

                  </form>
                  <!-- End Exampleed Input -->
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

