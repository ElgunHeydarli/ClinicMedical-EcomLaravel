@extends('admin.layouts.master')

@section('content')

<!-- Page -->
<div class="page">
    <div class="page-content container-fluid">
       <div class="row">
          <div class="col-lg-3">
             <!-- Page Widget -->
             <div class="card card-shadow text-center" >
                <div class="card-block">
                   <a class="avatar avatar-lg" href="javascript:void(0)" style="width:130px !important">
                   <img src="{{asset('back/')}}/global/portraits/5.jpg" alt="..." style="height:130px !important;">
                   </a>
                   <h4 class="tedris-user">JedAi.az</h4>
                   <p class="tedris-job">Admin</p>
                   <hr />
                </div>
             </div>
             <!-- End Page Widget -->
          </div>
          <div class="col-lg-9">
            <!-- Panel -->
            <div class="panel">
               
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
              <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">

                <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                  <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#activities"
                      aria-controls="activities" role="tab">Profil </a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#profile" aria-controls="profile"
                      role="tab">Şifrə</a></li>
                </ul>
  
                <div class="tab-content">

                  <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                     <ul class="list-group">
                        <li class="list-group-item">
                         <form method="POST" action="{{route('user-profile-information.update')}}">
                         @csrf
                         @method('PUT')
                         <div class="tab-content">
                           <div class="tab-pane active animation-slide-left" id="melumatlar" role="tabpanel">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="panel">
                                       <header class="panel-heading">
                                          <div class="panel-actions"></div>
                                       </header>
  
                                       <div class="panel-body">
                                          <table class="table table-hover  table-striped w-full">
                                             <tr>
                                                <th>Ad Soyad</th>
                                                <td><input type="text" id="name" name="name" class="form-control round" value="{{ $user->name }}"></td>
                                             </tr>

                                             <tr>
                                                <th>Email</th>
                                                <td><input type="email" id="email" name="email" class="form-control round" value="{{ $user->email }}"></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-info float-right" >REDAKTƏ ET</button>
                          </form>
                        </li>
                     </ul>
                  </div>
  
                  <div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
                     <ul class="list-group">
                        <li class="list-group-item">
                         <form method="POST" action="{{route('user-password.update')}}">
                         @csrf
                         @method('PUT')
                         <div class="tab-content">
                           <div class="tab-pane active animation-slide-left" id="melumatlar" role="tabpanel">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="panel">
                                       <header class="panel-heading">
                                          <div class="panel-actions"></div>
                                       </header>
  
                                       <div class="panel-body">
                                          <table class="table table-hover  table-striped w-full">
                                             <tr>
                                                <th>Şifrə</th>
                                                <td><input type="password" id="current_password" name="current_password" class="form-control round"></td>
                                             </tr>
                                             <tr>
                                                <th>Yeni Şifrə</th>
                                                <td><input type="password" id="password" name="password" class="form-control round" ></td>
                                             </tr>
                                             <tr>
                                                <th>Yeni Şifrənin Təkrarı</th>
                                                <td><input type="password" id="password_confirmation"  name="password_confirmation" class="form-control round" ></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-info float-right" >REDAKTƏ ET</button>
                          </form>
                        </li>
                     </ul>
                  </div>


                </div>
              </div>
            </div>
            <!-- End Panel -->
          </div>
       </div>
    </div>
 </div>
 <!-- End Panel -->
    
@endsection