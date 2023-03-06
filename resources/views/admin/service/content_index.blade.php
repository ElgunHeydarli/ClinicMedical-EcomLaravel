@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Paket Məzmunları</h1>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="col-lg-12">
               <!-- Example Bordered Table -->
               <div class="example-wrap">
                  <button id="addToTable" data-target="#exampleFormModal" data-toggle="modal" class="btn btn-outline btn-primary">
                  <i class="icon wb-plus" aria-hidden="true"></i>Əlavə Et</button>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
                  <div class="example table-responsive">
                     <table class="table table-bordered" id="datatable-buttons">
                        <thead>
                           <tr align="center">
                              <th>Sıra</th>
                              <th>Başlıq</th>
                              <th>Kateqoriya</th>
                              <th>Müddət</th>
                              <th>Qiymət</th>
                              <th>Xüsusiyyətlər</th>
                              <th>Status</th>
                              <th class="text-nowrap">Əməliyyatlar</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($contents as $cont)
                           <tr align="center">
                              <td>{{$cont->sort}}</td>
                              <td>{{$cont->title}}</td>
                              <td>{{$cont->getCategory->title}}</td>
                              <td>{{$cont->day}} gün</td>
                              <td>{{$cont->price}} AZN</td>
                              <td>
                                 <a href="{{route('p-feature.show', $cont->id)}}" class="btn btn-outline-primary"><i class="icon wb-eye pri"></i></a>
                              </td>
                              <td>
                                 <input class="status" data-id="{{$cont->id}}" type="checkbox" data-on="Aktiv" data-off="Passiv" 
                                 data-onstyle="success" data-offstyle="danger" @if($cont->status==1) checked @endif 
                                 data-toggle="toggle">
                              </td>
                              <td>
                                 <a data-id="{{$cont->id}}" class="btn btn-outline-success feature-add-click"><i class="icon wb-plus succ"></i></a>
                                 <a data-id="{{$cont->id}}" class="btn btn-outline-primary edit-click"><i class="icon wb-edit pri"></i></a>
                                 <a data-id="{{$cont->id}}" class="btn btn-outline-danger delete-click"><i class="fa fa-trash dan"></i></a>
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
         $.get("{{route('admin.p-content.status')}}",{id:id,status:status}, function(data, status){
         console.log(data);
         });
      });
      
      $('.edit-click').click(function(){
         id = $(this)[0].getAttribute('data-id');
         $.ajax({
            type:'GET',
            url:'/admin/packages/p-content/'+id+'/edit',
            success:function(data){
               console.log(data);    
               $("#editForm").attr({action: '/admin/packages/p-content/'+id});
               $('#lang').val(data.lang);   
               $('#cat_id').val(data.cat_id);  
               $('#title').val(data.title); 
               $('#day').val(data.day);     
               $('#price').val(data.price); 
               $('#discount').val(data.discount);               
               $('#sort').val(data.sort); 
               $('#editexampleFormModal').modal();    
               }
         });
      });
      
      $('.status').change(function() {
         id = $(this)[0].getAttribute('data-id');
         status = $(this).prop('checked');
         $.get("{{route('admin.p-content.status')}}",{id:id,status:status}, function(data, status){
         console.log(data);
         });
      });

      $('.feature-add-click').click(function() {
         id = $(this)[0].getAttribute('data-id');
         $("#pack_id").val(id);
         $('#featureAddExampleFormModal').modal();
      });


   
      $('.delete-click').click(function() {
         id = $(this)[0].getAttribute('data-id');
         $("#deleteForm").attr({action: '/admin/packages/p-content/'+id});
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
               <h4 class="modal-title">Paketin Silinməsinə Əminsinizmi?</h4>
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
<div class="modal fade" id="editexampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
   <div class="modal-dialog modal-simple">
      <form  method="POST" id="editForm" class="modal-content" enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <input type="hidden" name="lang" value="0">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Paket Redaktə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Başlıq</h4>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Başlıq Əlavə Et" required />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Kateqoriyalar</h4>
                  <select name="cat_id" class="form-control" id="cat_id" required>
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                     @endforeach 
                  </select>
               </div> 
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Hazırlanma Müddəti</h4>
                  <input type="text" class="form-control" name="day" id="day" placeholder="Sayt Hazırlanması M<üddəti Əlavə Et" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Qiymət</h4>
                  <input type="text" class="form-control" name="price" id="price" placeholder="Qitmət Əlavə Et" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Erndirmli Qiymət</h4>
                  <input type="text" class="form-control" name="discount" id="discount" placeholder="Endirimli Qitmət Əlavə Et"/>
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Sıra</h4>
                  <input type="number" class="form-control" name="sort" id="sort" placeholder="Sıra Əlavə Et" required="required" />
               </div>
               <div class="col-md-12 float-right">
                  <button type="submit" class="btn btn-outline-info btn-block">Redaktə Et</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- End -->

<!--Feature Add Modal -->
<div class="modal fade" id="featureAddExampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
   <div class="modal-dialog modal-simple">
      <form  method="POST" action="{{route('p-feature.index')}}" class="modal-content" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="lang" value="0">
         <input type="hidden" name="package_id" id="pack_id">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Xüsusiyyət Əlavə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="content"  placeholder="Xüsusiyyət Əlavə Et" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <input type="number" class="form-control" name="sort"  placeholder="Sıra Əlavə Et" required="required" />
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

<!--Elave Et Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
   role="dialog" tabindex="-1">
   <div class="modal-dialog modal-simple">
      <form  method="POST" action="{{ route('p-content.store')}}" class="modal-content" enctype="multipart/form-data">
         @csrf
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Paket Əlavə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Başlıq Əlavə Et" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <select name="cat_id" class="form-control" required>
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                     @endforeach 
                  </select>
               </div> 
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="day" id="day" value="{{ old('day') }}" placeholder="Sayt Hazırlanması M<üddəti Əlavə Et" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Qitmət Əlavə Et" required="required" />
               </div>
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="discount" id="discount" value="{{ old('discount') }}" placeholder="Endirimli Qitmət Əlavə Et" />
               </div>
               <div class="col-xl-12 form-group">
                  <input type="number" class="form-control" name="sort" id="sort" value="{{ old('sort') }}" placeholder="Sıra Əlavə Et" required="required" />
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