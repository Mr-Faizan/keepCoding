<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
<ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
      <img src="/assets/dist/img/Faizan1.jpg" class="user-image img-circle elevation-2 alt="User Image">

    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
        <img src="/assets/dist/img/Faizan1.jpg" class="img-circle elevation-2" alt="User Image">

        <p>
          {{ auth()->user()->name }}
          <small>Member since {{ date('M, d Y', strtotime(auth()->user()->created_at)) }}</small>
        </p>
      </li>
      <li class="user-footer">
      <div class="row">
        <div class="col-sm-5 ">
          <a href="/user-profile" class="btn btn-default btn-flat">Profile</a>
        </div>
        <div class="col-sm-7 ">
          <form action="{{ route('logout') }}" method="post" accept-charset="utf-8">
            @csrf
            <button class="btn btn-default btn-flat" type="submit" style="float:right"> Sign out</button>
          </form>

        </div>
      </div>
      </li>
    </ul>
    </li>
</ul>
  </nav>
