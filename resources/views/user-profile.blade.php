@extends('layouts.app')
@section('styles')
<style>
   .profile-user-img:hover {
   cursor: pointer !important;
   }
</style>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1> User Profile</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
               <li class="breadcrumb-item active">Profile</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
               <div class="card-body box-profile">
                  <div class="text-center">
                     <div class="circle upload-button">
                        <img class="profile-user-img img-fluid img-circle"
                           src="/assets/dist/img/Faizan1.jpg"
                           alt="User profile picture"
                           >
                     </div>
                  </div>
                  <input class="file-upload" style="display : none" type="file" accept="image/*"/>
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
                  <p class="text-muted text-center">Software Engineer</p>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- About Me Box -->
         </div>
         <!-- /.col -->
         <div class="col-md-9">
            <div class="card  card-primary card-outline">
               <div class="card-header p-2">
                  <h4>User Profile</h4>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <form class="form-horizontal">
                     <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="inputName" placeholder="Name" value='{{$user->name}}'>
                        </div>
                     </div>

                      <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" placeholder="Email" value='{{$user->email}}'>
                          </div>
                      </div>

                     <div class="form-group row">
                        <label for="inputOldPassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                           <input required type="OldPassword" class="form-control" id="inputOldPassword" placeholder="Old Password">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputNewPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                           <input required type="password" class="form-control" id="inputNewPassword" placeholder="New Password">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                           <input required  type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password">
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10 text-right">
                           <button type="submit" class="btn btn-success">Update</button>
                        </div>
                     </div>
                  </form>
                  <!-- /.tab-pane -->
                  <!-- /.tab-content -->
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('scripts')
<script>
   $(document). ready(function() {
     var readURL = function(input) {
       if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
           $('.profile-user-img').attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
       }
     }

   $(".file-upload").on('change', function(){
     readURL(this);
   });

   $(".upload-button").on('click', function() {
     $(".file-upload").click();
   });
   });
</script>
@endsection
