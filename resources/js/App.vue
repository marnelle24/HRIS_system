<template>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">

      <div class="sidebar-heading">
        <div class="row">
          <div class="col-md-9"><img src="img/logo.png" class="rounded-circle mt-1" width="75"><h1 style="font-size:2vw">Lanex HRIS</h1></div>
          <div class="col-md-3">
            <button class="btn btn-link" data-toggle="collapse" href="#sidebar-wrapper" role="button" aria-expanded="false" aria-controls="sidebar-wrapper"><<</button>
          </div>
        </div>
      </div>
        <div class="list-group list-group-flush">
            <router-link to="/" class="list-group-item list-group-item-action bg-light">Dashboard</router-link>
            <router-link to="/timesheet" class="list-group-item list-group-item-action bg-light">Time</router-link>
            <router-link to="/users" class="list-group-item list-group-item-action bg-light">Users</router-link>
<!--            <router-link to="/team" class="list-group-item list-group-item-action bg-light">Teams</router-link>-->
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <img src="img/user.png" class="rounded-circle mt-1" width="30" height="30">
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Yami Iglesia</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile Settings</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                            <!--  <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log Out</a> -->
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <router-view></router-view>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>


</template>

<script>
    export default {}
</script>