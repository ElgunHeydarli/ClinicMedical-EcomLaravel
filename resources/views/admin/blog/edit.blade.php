
@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Blog Redaktə Etmə Paneli</h1>
   </div>
   <div class="page-content">
      <!-- Panel Form Elements -->
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="row row-lg">
               <div class="col-md-12 col-lg-12">
                  <!-- Example Rounded Input -->
                  <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
                     @csrf
                     @method('PATCH')
                     <input type="hidden" name="category" value="1">
                     <div class="example-wrap">
                        <h4 class="example-title">Başlıq</h4>
                        <input type="text" class="form-control" name="title" value="{{$blog->title}}" required />
                     </div>
                     <div class="example-wrap">
                         <h4 class="example-title">Məzmun</h4>
                         <textarea class="form-control" name="content" rows="15">{{$blog->content}}</textarea>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Cari Şəkil</h4>
                        <img width="150" src="{{asset($blog->img)}}" />
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Şəkil</h4>
                        <input type="file" class="filestyle" name="img"  data-buttonname="btn-secondary"  />
                    </div>
                      <div class="example-wrap">
                          <h4 class="example-title">Tarix</h4>
                          <input type="text" class="form-control" name="date" value="{{$blog->date}}" required/>
                      </div>
                     <button type="submit" class="btn btn-animate btn-animate-side btn-success float-right" id="uploadBtn">
                     <span><i class="icon wb-edit" aria-hidden="true"></i>Redaktə Et</span>
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
