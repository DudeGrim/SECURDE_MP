@extends('master_layout/master')

@section('pagecontent')
<!-- Page Content -->
<div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Add New Admin</div>
          <div class="panel-body">
          <form method="POST" action="{{ route('addNewAdmin') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
              <h4 class="col-xs-1 col-form-label">First Name: </h4>
              <div class="col-xs-4">
                <input name="_firstname" id="firstname" class="form-control" type="text" placeholder="First Name" maxlength="45" required>
                <span id="firstnamechars">45</span>
              </div>
              <h4 class="col-xs-1 col-form-label">Middle Initial: </h4>
              <div class="col-xs-2">
                <input name="_middleinitial" id="middleinitial" class="form-control" type="text" placeholder="Middle Initial" maxlength="1">
                <span id="middleinitialchars">1</span>
              </div>
              <h4 class="col-xs-1 col-form-label">Surname: </h4>
              <div class="col-xs-3">
                <input name="_lastname" id="lastname" class="form-control" type="text" placeholder="Last Name" maxlength="45">
                <span id="lastnamechars">45</span>
              </div>
            </div>

            <div class="form-group row">
              <h4 class="col-xs-1 col-form-label">Username:</h4>
              <div class="col-xs-4">
                <input name="_username" id="username" class="form-control" type="text" placeholder="Username" maxlength="45">
                <span id="usernamechars">45</span>
              </div>
              <h4 class="col-xs-2 col-form-label">Email Address:</h4>
              <div class="col-xs-5">
                <input name="_emailaddress" id="emailaddress" class="form-control" type="email" placeholder="Email Address" maxlength="80">
                <span id="emailaddresschars">80</span>
              </div>
            </div>
            <div class="form-group row">
              <h4 class="col-xs-1 col-form-label">Password:</h4>
              <div class="col-xs-4">
                <input name="_password" id="password" class="form-control" type="password" placeholder="Temporary Password" maxlength="45"
                pattern=".{8,}"   required title="8 characters minimum">
                <span id="passwordchars">45</span>
              </div>
              <h4 class="col-xs-2 col-form-label">Confirm Password:</h4>
              <div class="col-xs-5">
                <input name="_confirmpassword" id="confirmpassword" class="form-control" type="password" placeholder="Confirm Temporary Password" maxlength="45"
                pattern=".{8,}"   required title="8 characters minimum">
                <span id="confirmpasswordchars">45</span>
              </div>
            </div>
            <div class="form-group row">
            <h4 class="col-xs-2">Admin Role: </h4>
            <div class="col-xs-10" data-toggle="buttons">

              <label class="btn btn-default btn-circle btn-size active">
                <input name="_adminrole" id="adminrole" class="form-control" type="radio" value="4" required>Admin Manager
              </label>
              <label class="btn btn-default btn-circle btn-size active">
                <input name="_adminrole" id="adminrole" class="form-control" type="radio" value="2" required>Product Manager
              </label>
              <label class="btn btn-default btn-circle btn-size active">
                <input name="_adminrole" id="adminrole" class="form-control" type="radio" value="3" required>Accounting Manager
              </label>
            </div>
          </div>
          <div>
            <button class="btn btn-block btn-success" type="submit">Create New Admin</button>
          </div>
        </form>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Admins</div>
          <div class="panel-body table-responsive">
              <table id="productTable" class="table table-hover">
                  <thead>
                    <tr>
                      <th class="col-md-2 text-warning">Admin ID</th>
                      <th class="col-md-2 text-warning">Admin Type</th>
                      <th class="col-md-3 text-warning">Name</th>
                      <th class="col-md-3 text-warning">Email Address</th>
                      <th class="col-md-2 text-warning">Username</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                      <td name="idProduct">{{ $admin->idAccount}}</td>
                      @if($admin->accountType == 2)
                        <td name="category">Product</td>
                      @elseif($admin->accountType == 3)
                        <td name="category">Account</td>
                      @elseif($admin->accountType == 4)
                      <td name="category">Admin</td>
                      @endif
                      <td name="name">{{ $admin->firstName }} {{$admin->middleInitial }} {{$admin->lastName}}</td>
                      <td name="description">{{ $admin->emailAddress}}</td>
                      <td name="price">{{ $admin->username}}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
          </div>
      </div>

    <!-- /.container -->
@endsection

@section('customScripts')
<!-- <script src="{{asset('js/jquery.js')}}"></script> -->
<script>
    $(document).ready(function() {
      var text_max45 = 45;
      var text_max80 = 80;
      var text_max1 = 1;

      $('#passwordchars').html(text_max45);
      $('#password').keyup(function() {
          var text_length = $('#password').val().length;
          var text_remaining = text_max45 - text_length;
          $('#passwordchars').html(text_remaining);
      });

      $('#confirmpasswordchars').html(text_max45);
      $('#confirmpassword').keyup(function() {
          var text_length = $('#confirmpassword').val().length;
          var text_remaining = text_max45 - text_length;
          $('#confirmpasswordchars').html(text_remaining);
      });

      $('#firstnamechars').html(text_max45);
      $('#firstname').keyup(function() {
          var text_length = $('#firstname').val().length;
          var text_remaining = text_max45 - text_length;
          $('#firstnamechars').html(text_remaining);
      });

      $('#middleinitialchars').html(text_max1);
      $('#middleinitial').keyup(function() {
          var text_length = $('#middleinitial').val().length;
          var text_remaining = text_max1 - text_length;
          $('#middleinitialchars').html(text_remaining);
      });

      $('#lastnamechars').html(text_max45);
      $('#lastname').keyup(function() {
          var text_length = $('#lastname').val().length;
          var text_remaining = text_max45 - text_length;
          $('#lastnamechars').html(text_remaining);
      });

      $('#usernamechars').html(text_max45);
      $('#username').keyup(function() {
          var text_length = $('#username').val().length;
          var text_remaining = text_max45 - text_length;
          $('#usernamechars').html(text_remaining);
      });
      $('#emailaddresschars').html(text_max80);
      $('#emailaddress').keyup(function() {
          var text_length = $('#emailaddress').val().length;
          var text_remaining = text_max80 - text_length;
          $('#emailaddresschars').html(text_remaining);
      });
      var password = document.getElementById("password"),
          confirm_password = document.getElementById("confirmpassword");

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }

      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
  });
</script>
@endsection
