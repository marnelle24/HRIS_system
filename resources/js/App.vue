<template>
    <div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link pl-0" data-widget="pushmenu" href="#" @click="arrow =!arrow">
                    <i v-if="arrow" class="fas fa-arrow-left"></i>
                    <i v-else class="fas fa-arrow-right"></i>
                </a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="img/user.png" class="img-circle" width="30" height="30"> Yami Iglesia
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="fas fa-cog mr-2"></i> Profile Settings</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Lanix HRIS </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview menu-open" v-for="nav in navs" :key="nav.id">
                        <router-link :to="{path:nav.path}" active-class="active"
          exact class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>{{nav.component}}</p></router-link>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-4">
        <router-view></router-view>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021-2022 <a href="#">Lanex HRIS System</a></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
    </footer>
    </div>

</template>

<script>
    export default {
        data() {
            return { 
                navs: [],
                arrow: true
            }
        },
        created() {
            this.nav();
        },
        methods:{
            nav(){
                this.axios.get(axios.defaults.baseURL+'/nav-list/list')
                .then(response => {
                    this.navs = response.data;
                });
            }
        }
    }
</script>