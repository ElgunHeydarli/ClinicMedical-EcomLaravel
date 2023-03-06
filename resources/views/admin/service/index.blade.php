@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Xidmətlər</h1>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="col-lg-12">
               <!-- Example Bordered Table -->
               <div class="example-wrap">
                  <button id="addToTable" data-target="#exampleFormModal" data-toggle="modal" class="btn btn-outline btn-primary">
                     <i class="icon wb-plus" aria-hidden="true"></i>Əlavə Et</button>
                  </button>
                  <div class="example table-responsive">
                     @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                     <table class="table table-bordered" id="datatable-buttons">
                        <thead>
                           <tr align="center">
                              <th>Sıra</th>
                              <th>Başlıq</th>
                              <th>Slug</th>
                              <th>Status</th>
                              <th class="text-nowrap">Əməliyyatlar</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                           <tr align="center">
                              <td>{{$item->sort}}</td>
                              <td>{{$item->title}}</td>
                              <td>{{$item->slug}}</td>
                              <td><input class="status" data-id="{{$item->id}}" type="checkbox" data-on="Aktiv" data-off="Passiv" 
                                 data-onstyle="success" data-offstyle="danger" @if($item->status==1) checked @endif 
                                 data-toggle="toggle">
                              </td>
                              <td>
                                 <a data-target="#editexampleFormModal-{{$item->id}}" data-toggle="modal" class="btn btn-outline-primary edit-click"><i class="fa fa-edit pri"></i></a>
                                 <a data-id="{{$item->id}}" class="btn btn-outline-danger delete-click"><i class="fa fa-trash dan"></i></a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>

                  </div>            
                  <div class="float-right">
                  </div>
               </div>
            </div>
         </div>
         
        
         <!-- End Example Bordered Table -->
      </div>
   </div>
</div>
<!-- End Page -->
<script>
   $(function() {

      $('.status').change(function() {
         id = $(this)[0].getAttribute('data-id');
         status = $(this).prop('checked');
         $.get("{{route('admin.service.status')}}",{id:id,status:status}, function(data, status){
         console.log(data);
         });
      });
   
      $('.delete-click').click(function() {
         id = $(this)[0].getAttribute('data-id');
         $("#deleteForm").attr({action: '/admin/services/'+id});
         $('#deleteExampleFormModal').modal();
      });
   
   })
</script>
<!-- Sil Modal -->
<div class="modal fade modal-danger" id="deleteExampleFormModal" aria-hidden="true" aria-labelledby="exampleModalDanger" role="dialog" tabindex="-1">
   <div class="modal-dialog">
      <form method="POST" id="deleteForm" class="modal-content" enctype="multipart/form-data">
         @csrf
         @method('DELETE')
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title">Kateqoriyanın Silinməsinə Əminsinizmi?</h4>
            </div>
            <div class="modal-body">
               <p></p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Bağla</button>
               <button type="submit" class="btn btn-primary">Sil</button>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- End Modal -->

<!--Redakte Et Modal -->
@foreach ($data as $item)
<div class="modal fade" id="editexampleFormModal-{{ $item->id }}" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
   <div class="modal-dialog modal-simple">
      <form  method="POST" action="{{route('services.update', $item->id)}}" class="modal-content" enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <input type="hidden" name="lang" value="0">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Kateqoriya Redaktə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Kateqoriya Adı</h4>
                  <input type="text" class="form-control" name="title" value="{{ $item->title }}" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Kateqoriya Sırası</h4>
                  <input type="number" class="form-control" name="sort" value="{{ $item->sort }}" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Başlıq (1)</h4>
                  <input type="text" class="form-control" name="content_title_1" value="{{ $item->content_title_1 }}" required/>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Məzmun (1)</h4>
                  <textarea class="form-control" name="content_description_1" rows="5">{{ $item->content_description_1 }}</textarea>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Cari Şəkil (1)</h4>
                  <img width="150" src="{{asset($item->content_image_1)}}" />         
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Şəkil (1)</h4>
                  <input type="file" class="filestyle" name="content_image_1"  data-buttonname="btn-secondary" > 
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Başlıq (2)</h4>
                  <input type="text" class="form-control" name="content_title_2" value="{{ $item->content_title_2 }}" placeholder="Başlıq (2)" required/>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Məzmun (2)</h4>
                  <textarea class="form-control" name="content_description_2" rows="5">{{ $item->content_description_2 }}</textarea>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Cari Şəkil (2)</h4>
                  <img width="150" src="{{asset($item->content_image_2)}}" />         
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Şəkil (2)</h4>
                  <input type="file" class="filestyle" name="content_image_2"  data-buttonname="btn-secondary" > 
               </div>
               <div class="col-md-12 float-right">
                  <button type="submit" class="btn btn-outline-info btn-block">Redaktə Et</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endforeach
<!-- End -->

<!--Elave Et Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
   role="dialog" tabindex="-1">
   <div class="modal-dialog modal-simple">
      <form  method="POST" action="{{ route('services.store')}}" class="modal-content" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="cat_type" value="0">
         <input type="hidden" name="lang" value="0">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Kadeqoriya Əlavə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Kateqoriya Adı</h4>
                  <input type="text" class="form-control" name="title" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Kateqoriya Sırası</h4>
                  <input type="number" class="form-control" name="sort" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Başlıq (1)</h4>
                  <input type="text" class="form-control" name="content_title_1" required/>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Məzmun (1)</h4>
                  <textarea class="form-control" name="content_description_1" rows="5"></textarea>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Şəkil (1)</h4>
                  <input type="file" class="filestyle" name="content_image_1"  data-buttonname="btn-secondary" > 
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Başlıq (2)</h4>
                  <input type="text" class="form-control" name="content_title_2" placeholder="Başlıq (2)" required/>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Məzmun (2)</h4>
                  <textarea class="form-control" name="content_description_2" rows="5"></textarea>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Şəkil (2)</h4>
                  <input type="file" class="filestyle" name="content_image_2"  data-buttonname="btn-secondary" > 
               </div>
               <div class="col-md-12 float-right">
                  <button type="submit" class="btn btn-outline-info btn-block">Əlavə Et</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- End -->

@endsection

@push('script')
<script type="text/javascript" src="/back/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="/back/tinymce.js"></script>
@endpush