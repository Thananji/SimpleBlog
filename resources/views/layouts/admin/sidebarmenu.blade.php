 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
         <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>        
        <li class="active treeview">
          <a href="/stories">
            <i class="fa fa-dashboard"></i> <span>Stories</span>  
          </a>
        </li>
        <li class="active treeview">
          <a href="/promotions">
            <i class="fa fa-pie-chart"></i> <span>Promotions</span>  
          </a>
        </li>
        <li class="active treeview">
            <a href="/slides">
              <i class="fa fa-th"></i> <span>Slides</span>  
            </a>
          </li>
        <li class="active treeview">
          <a href="/categories">
            <i class="fa fa-table"></i> <span>Categories</span>  
          </a>
        </li>

            <li>
          <a class="top-menu-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
            </form>
            </li>
        
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>   




