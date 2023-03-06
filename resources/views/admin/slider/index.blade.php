@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Slider</h1>
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
                     <table class="table table-bordered">
                        <thead>
                           <tr align="center">
                              <th>Sıra</th>
                              <th>Şəkil</th>
                              <th>Status</th>
                              <th class="text-nowrap">Əməliyyatlar</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                           <tr align="center">
                              <td>{{$item->sort}}</td>
                              <td><img src="{{ $item->image}}" alt="{{ $item->name_surname}}" width="75"></td>
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
                      {{ $data->links('pagination::bootstrap-4')}}
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
            url:'/admin/slider/'+id+'/edit',
            success:function(data){
               console.log(data);
               $("#editForm").attr({action: '/admin/slider/'+id});
               $('#sort').val(data.sort);
               $('#title').val(data.title);
               $('#sub_title').val(data.sub_title);
               $('#text').val(data.text);
               $('#editexampleFormModal').modal();
               }
         });
      });

      $('.status').change(function() {
         id = $(this)[0].getAttribute('data-id');
         status = $(this).prop('checked');
         $.get("{{route('admin.slider.status')}}",{id:id,status:status}, function(data, status){
         console.log(data);
         });
      });

      $('.delete-click').click(function() {
         id = $(this)[0].getAttribute('data-id');
         $("#deleteForm").attr({action: '/admin/slider/'+id});
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
               <h4 class="modal-title">Slider-in Silinməsinə Əminsinizmi?</h4>
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
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Redaktə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
                <div class="col-xl-12 form-group">
                    <h4 class="example-title">Başlıq</h4>
                    <input type="text" class="form-control" name="title" id="title" required />
                </div>
                <div class="col-xl-12 form-group">
                    <h4 class="example-title">Alt Başlıq</h4>
                    <input type="text" class="form-control" name="sub_title" id="sub_title" data-buttonname="btn-secondary" required />
                </div>
                <div class="col-xl-12 form-group">
                    <h4 class="example-title">Mətn</h4>
                    <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Şəkil</h4>
                  <input type="file" class="filestyle" name="image"  data-buttonname="btn-secondary" />
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

<!--Elave Et Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
   role="dialog" tabindex="-1">
   <div class="modal-dialog modal-simple">
      <form  method="POST" action="{{ route('slider.store')}}" class="modal-content" enctype="multipart/form-data">
         @csrf
         @method('POST')
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleFormModalLabel">Əlavə Etmə Paneli</h4>
         </div>
         <div class="modal-body">
            <div class="row">
                <div class="col-xl-12 form-group">
                    <h4 class="example-title">Başlıq</h4>
                    <input type="text" class="form-control" name="title" required />
                </div>
                <div class="col-xl-12 form-group">
                    <h4 class="example-title">Alt Başlıq</h4>
                    <input type="text" class="form-control" name="sub_title" data-buttonname="btn-secondary" required />
                </div>
                <div class="col-xl-12 form-group">
                    <h4 class="example-title">Mətn</h4>
                    <textarea name="text" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Şəkil</h4>
                  <input type="file" class="filestyle" name="image" data-buttonname="btn-secondary" required />
              </div>
              <div class="col-xl-12 form-group">
                  <h4 class="example-title">Sıra</h4>
                  <input type="number" class="form-control" name="sort" placeholder="Sıra Əlavə Et" required="required" />
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
