@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Müştəri Rəyləri</h1>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="col-lg-12">
               <!-- Example Bordered Table -->
               <div class="example-wrap">
                <button id="addToTable" data-target="#exampleFormModal" data-toggle="modal" class="btn btn-outline btn-primary">
                     <i class="icon wb-plus" aria-hidden="true"></i>Əlavə Et</button>
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
                              <th>Ad Soyad</th>
                              <th>Vəzifə</th>
                              <th>Status</th>
                              <th class="text-nowrap">Əməliyyatlar</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                           <tr align="center">
                              <td>{{$item->sort}}</td>
                              <td>{{$item->name_surname}}</td>
                              <td>{{$item->position}}</td>
                              <td><input class="status" data-id="{{$item->id}}" type="checkbox" data-on="Aktiv" data-off="Passiv"
                                 data-onstyle="success" data-offstyle="danger" @if($item->status==1) checked @endif
                                 data-toggle="toggle">
                              </td>
                              <td>
                                 <a data-id="{{$item->id}}" class="btn btn-outline-primary edit-click"><i class="fa fa-edit pri"></i></a>
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

      $('.edit-click').click(function(){
         id = $(this)[0].getAttribute('data-id');
         $.ajax({
            type:'GET',
            url:'/admin/comment/'+id+'/edit',
            success:function(data){
               $("#editForm").attr({action: '/admin/comment/'+id});
               $('#lang').val(data.lang);
               $('#name_surname').val(data.name_surname);
               $('#position').val(data.position);
               $('#comment').val(data.comment);
               $('#sort').val(data.sort);
               $('#editexampleFormModal').modal();
               }
         });
      });

      $('.status').change(function() {
         id = $(this)[0].getAttribute('data-id');
         status = $(this).prop('checked');
         $.get("{{route('admin.comment.status')}}",{id:id,status:status}, function(data, status){
         console.log(data);
         });
      });

      $('.delete-click').click(function() {
         id = $(this)[0].getAttribute('data-id');
         $("#deleteForm").attr({action: '/admin/comment/'+id});
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
               <h4 class="modal-title">Müştəri Rəryinin Silinməsinə Əminsinizmi?</h4>
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
         <input type="hidden" name="type" value="1">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Redaktə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="name_surname" id="name_surname" placeholder="Ad Soyad" required />
               </div>
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="position" id="position" placeholder="Vəzifə" required />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Müştəri Rəyi</h4>
                  <textarea class="form-control" name="comment"  id="comment" rows="5"></textarea>
               </div>
               <div class="col-xl-12 form-group">
                  <input type="number" class="form-control" name="sort" id="sort" placeholder="Sıra" required />
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

<!--Elave Et Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
   role="dialog" tabindex="-1">
   <div class="modal-dialog modal-simple">
      <form  method="POST" action="{{ route('comment.store')}}" class="modal-content" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="lang" value="0">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Əlavə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="name_surname" id="name_surname" value="{{ old('name_surname') }}" placeholder="Ad Soyad" required />
               </div>
               <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="position" id="position" value="{{ old('position') }}" placeholder="Vəzifə" required />
               </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Müştəri Rəyi</h4>
                  <textarea class="form-control" name="comment" rows="5"></textarea>
               </div>
               <div class="col-xl-12 form-group">
                  <input type="number" class="form-control" name="sort" value="{{ old('sort') }}" placeholder="Sıra" required />
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



