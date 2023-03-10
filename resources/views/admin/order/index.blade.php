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
                              <th>Sifariş No</th>
                              <th>Ad Soyad</th>
                              <th>Telefon</th>
                              <th>Tarix</th>
                              <th>Ətraflı Bax</th>
                              <th>Status</th>
                              <th class="text-nowrap">Əməliyyatlar</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                           <tr align="center">
                              <td>#ORDER-{{$item->id}}</td>
                              <td>{{$item->name}} {{$item->surname}}</td>
                              <td>{{$item->tel}}</td>
                              <td>{{$item->created_at}}</td>
                              <td>
                                  <a href="{{ route('orders.show', $item->id)}}" class="btn btn-outline-primary"><i class="icon wb-eye pri"></i></a>
                              </td>
                              <td>
                                 @if($item->status==1) 
                                 <span class="badge badge-pill badge-lg badge-success mt-5">Təhvil Verildi</span>
                                 @elseif($item->status==2)   
                                 <span class="badge badge-pill badge-lg badge-danger mt-5">Rədd Edildi</span> 
                                 @else
                                 <span class="badge badge-pill badge-lg badge-info mt-5">Yeni</span> 
                                 @endif
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
            url:'/admin/orders/'+id+'/edit',
            success:function(data){
               console.log(data);    
               $("#editForm").attr({action: '/admin/orders/'+id});
               $('#status').val(data.status); 
               $('#editexampleFormModal').modal();    
               }
         });
      });
   
      $('.delete-click').click(function() {
         id = $(this)[0].getAttribute('data-id');
         $("#deleteForm").attr({action: '/admin/orders/'+id});
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
               <h4 class="modal-title">Sifarişin Silinməsinə Əminsinizmi?</h4>
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
            <h4 class="modal-title" id="exampleFormModalLabel">Status Redaktə</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xl-12 form-group">
                  <h4 class="example-title">Status</h4>
                  <select name="status" class="form-control" required>
                        <option value="1">Təhvil Verildi</option>
                        <option value="2">Rədd Edildi</option>
                        <option value="0">Yeni</option>
                  </select>
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


@endsection