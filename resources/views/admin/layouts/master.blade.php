<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Lestari</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          {{-- <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button> --}}
        </li>
       
        <!-- User Menu-->
        @php
            $id = Session::get('id_admin');
            $username = \App\Admin::find($id);
        @endphp
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{route('editadmin-admin', $id)}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{route('admin-logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">{{$username->nama_admin}}</p>
          <p class="app-sidebar__user-designation">Admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home-admin')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{route('penghuni-admin')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Penghuni</span></a></li>
        <li><a class="app-menu__item" href="{{route('admin-admin')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Admin</span></a></li>
        <li><a class="app-menu__item" href="{{route('sewa-admin')}}"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Sewa</span></a></li>
        <li><a class="app-menu__item" href="{{route('pembayaran-admin')}}"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Pembayaran</span></a></li>
        <li><a class="app-menu__item" href="{{route('pengeluaran-admin')}}"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Pengeluaran</span></a></li>
        <li><a class="app-menu__item" href="{{route('pemesanan-admin')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Pemesanan</span></a></li>
        <li><a class="app-menu__item" href="{{route('keluhan-admin')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Keluhan</span></a></li>
        <li><a class="app-menu__item" href="{{route('kamar-admin')}}"><i class="app-menu__icon fa fa-bed"></i><span class="app-menu__label">Kamar</span></a></li>
        <li><a class="app-menu__item" href="{{route('fasilitas-admin')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Fasilitas</span></a></li>
        <li><a class="app-menu__item" href="{{route('cabang-admin')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Cabang</span></a></li>
        
      </ul>
    </aside>
    
    <main class="app-content">
        @yield('content')
      
      
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    {{-- <script src="{{url('js/plugins/pace.min.js')}}"></script> --}}
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{url('js/plugins/chart.js')}}"></script>

    @stack('cs-script')

    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>