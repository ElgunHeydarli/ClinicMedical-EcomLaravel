@extends('admin.layouts.master')
@section('content')
<!-- Page -->
<div class="page">
   <div class="page-header">
      <h1 class="page-title">Məhsul Əlavə Etmə Paneli</h1>
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
                  <form method="POST" action="{{ route('content.store') }}" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="lang" value="0">
                     <div class="example-wrap">
                        <h4 class="example-title">Başlıq</h4>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" required/>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Kateqoriyalar</h4>
                        <select name="categories[]" class="form-control js-example-basic-multiple">
                            @foreach (\App\Models\ProductCategory::where(['parent_id'=>null])->get() as $category)
                                @php $sub_cats = \App\Models\ProductCategory::where(['parent_id'=>$category->id])->get() @endphp
                                @if(count($sub_cats)>0)
                                    <optgroup label="{{$category->title}}">
                                        @foreach($sub_cats as $sub_cat)
                                            <option value="{{ $sub_cat->id }}"
                                                    @if ($category->id==$sub_cat->id)
                                                    selected
                                                @endif>
                                                {{ $sub_cat->title }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @else
                                    <option value="{{ $category->id }}"
                                            @if ($category->id==$sub_cat->id)
                                            selected
                                        @endif>
                                        {{ $category->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                     </div>
                     {{--
                     <div class="example-wrap">
                        <h4 class="example-title">Qiymət</h4>
                        <input type="number" class="form-control" name="price" min="1" value="{{ old('price') }}" required/>
                     </div>
                     --}}
                     <div class="example-wrap">
                        <h4 class="example-title">Sıra</h4>
                        <input type="number" class="form-control" name="sort" value="{{ old('sort') }}" required/>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Məzmun</h4>
                        <textarea class="form-control" name="description" rows="10"></textarea>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Şəkil</h4>
                        <input type="file" class="filestyle" name="images[]"  data-buttonname="btn-secondary" required multiple/>
                     </div>
                     <div class="example-wrap">
                        <h4 class="example-title">Satış Statusu</h4>
                        <div class="radio-custom radio-primary">
                           <input type="radio" id="sade" name="sales_status"  value="0"/>
                           <label for="sade">Sadə</label>
                        </div>
                        <div class="radio-custom radio-primary">
                           <input type="radio" id="yeni" name="sales_status" value="2"/>
                           <label for="yeni">Yeni</label>
                        </div>
                        <div class="radio-custom radio-primary">
                           <input type="radio" id="encoxsatilan" name="sales_status"   value="1"/>
                           <label for="encoxsatilan">Ən Çox Satılan</label>
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
