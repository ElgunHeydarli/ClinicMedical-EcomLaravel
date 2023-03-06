@extends('admin.layouts.master')
@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Xüsusiyyət Əlavə Etmə Paneli</h1>
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
                  <form method="POST" action="{{ url('/admin/product/specification/'.$id) }}" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="lang" value="0">
                      <div class="col-xs-12">
                          <div class="col-md-12" >
                              <h3> Xüsusiyyətlər</h3>
                              <div id="field">
                                  <div id="field0">
                                      <div class="form-group">
                                          <label class="col-md-4 control-label" for="action_id">Xüsusiyyət Başlığı</label>
                                          <div class="col-md-8">
                                              <input id="action_id" name="spec_name[]" type="text" placeholder="" class="form-control input-md" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-4 control-label" for="action_name">Xüsusiyyət</label>
                                          <div class="col-md-8">
                                              <input id="action_name" name="spec_title[]" type="text" placeholder="" class="form-control input-md" required>
                                          </div>
                                      </div>
                                   </div>
                              </div>
                              <!-- Button -->
                              <div class="form-group">
                                  <div class="col-md-4">
                                      <button id="add-more" name="add-more" class="btn btn-primary">Add More</button>
                                  </div>
                              </div>
                          </div>
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
@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
   $(function() {
      $('.js-example-basic-multiple').select2();
    });
</script>
<script type="text/javascript" src="/back/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="/back/tinymce.js"></script>
@endpush
