@extends('admin.layouts.master')

@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Məhsullar</h1>
   </div>
   <div class="page-content">
      <div class="panel">
         <div class="panel-body container-fluid">
            <div class="col-lg-12">
               <!-- Example Bordered Table -->
               <div class="example-wrap">
                  <a href="{{ route('content.create') }}" id="addToTable" class="btn btn-outline btn-primary"><i class="icon wb-plus" aria-hidden="true"></i>Əlavə Et</a>
                  <a href="{{ route('admin.product.content.trashed') }}" class="btn btn-warning btn-sm float-right"><i class="fa fa-trash"></i></a>
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
                              <th>Başlıq</th>
                              <th>Kateqoriyalar</th>
                              <th>Qiymət</th>
                              <th>Satış Statusu</th>
                              <th>Status</th>
                              <th class="text-nowrap">Əməliyyatlar</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)
                           <tr align="center">
                              <td>{{$item->sort}}</td>
                              <td>{{$item->title}}</td>
                              <td>
                                 @foreach ($item->getCategory as $cat) {{ $cat->title }} / @endforeach
                              </td>
                              <td>{{$item->price}}</td>
                              <td>
                                 @if($item->sales_status==1)
                                     <span class="badge badge-pill badge-lg badge-success mt-5">Ən Çox Satılan</span>
                                 @elseif($item->sales_status==2)
                                     <span class="badge badge-pill badge-lg badge-info mt-5">Yeni</span>
                                 @else
                                     <span class="badge badge-pill badge-lg badge-dark mt-5">Sadə</span>
                                 @endif

                              </td>
                              <td><input class="status" data-id="{{$item->id}}" type="checkbox" data-on="Aktiv" data-off="Deaktiv"
                                 data-onstyle="success" data-offstyle="danger" @if($item->status==1) checked @endif
                                 data-toggle="toggle">
                              </td>
                              <td>
                                 <a href="{{ route('admin.product.specification', $item->id) }}" class="btn btn-outline-primary edit-click"><i class="fa fa-plus"></i></a>
                                 <a href="{{ route('content.edit', $item->id) }}" class="btn btn-outline-warning edit-click"><i class="fa fa-edit"></i></a>
                                 <a data-id="{{$item->id}}" class="btn btn-outline-danger delete-click"><i class="fa fa-trash dan"></i></a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <div class="float-right">
                  {{ $data->links('pagination::bootstrap-4') }}
                  </div>
               </div>
            </div>
         </div>
         <!-- End Example Bordered Table -->
      </div>
   </div>
</div>

<script>
   $(function() {


      $('.status').change(function() {
         id = $(this)[0].getAttribute('data-id');
         status = $(this).prop('checked');
         $.get("{{route('admin.product.content.status')}}",{id:id,status:status}, function(data, status){
         console.log(data);
         });
      });


      $('.delete-click').click(function() {
         id = $(this)[0].getAttribute('data-id');
         $("#deleteForm").attr({action: '/admin/product/content/'+id});
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
               <h4 class="modal-title">Məhsulun Silinməsinə Əminsinizmi?</h4>
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
@endsection
