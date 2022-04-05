<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AMSKKU</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('js/app.js') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('dist/img/LogoKKU-thai.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-orange navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/Student/home" class="nav-link">หน้าหลัก</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- User Name -->
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link" href="/Student/showDataUser">
            {{ Auth::user()->name }}
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-success elevation-4">
      <!-- Brand Logo -->
      <a href="/Student/home" class="brand-link">
        <img src="{{ asset('dist/img/LogoKKU-thai.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AMS KKU</span>
      </a>


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-1 mb-3 d-flex">
          <h5 class="brand-text font-weight-light ">นักศึกษา</h5>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header"></li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById
                                        ('logout-form').submit();">
                <i class="nav-icon far">
                  <ion-icon name="log-out-outline"></ion-icon>
                </i>
                <p>
                  ออกจากระบบ
                </p>
              </a>

              <form id="logout-form" action="{{
                        route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>

            <li class="nav-item">
              <a href="/Student/showDataUser" class="nav-link">
                <i class="nav-icon far">
                  <ion-icon name="person-circle-outline"></ion-icon>
                </i>
                <p>
                  ข้อมูลนักศึกษา
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/Student/showDataActivityJoin/{{ Auth::user()->id_users }}" class="nav-link">
                <i class="nav-icon far">
                  <ion-icon name="flag-outline"></ion-icon>
                </i>
                <p>
                  ดูกิจกรรมที่เข้าร่วม
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/Student/showDataActivityAll" class="nav-link">
                <i class="nav-icon far">
                  <ion-icon name="newspaper-outline"></ion-icon>
                  </ion-icon>
                </i>
                <p>
                  ดูกิจกรรมทั้งหมด
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/Student/changePassword" class="nav-link">
                <i class="nav-icon far">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                </i>
                <p>
                  เปลี่ยนรหัสผ่าน
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h1 class="m-0">ระบบบริหารจัดการกิจกรรมสำหรับหอพักส่วนกลาง</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li> -->
                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      @yield('content')
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>ระบบบริหารจัดการกิจกรรมสำหรับหอพักส่วนกลางของมหาวิทยาลัยขอนแก่น</strong>

      <div class="float-right d-none d-sm-inline-block">
        <!-- <b>Version</b> 3.1.0 -->
      </div>
    </footer>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
  <!-- Ionicons -->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>


  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- jQuery UI -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  <script src="{{ asset('fullcalendar/core/locales/th.js') }}"></script>

  <script>
    $(function() {

      var SITEURL = "{{ url('/') }}";
      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function() {

          // create an Event Object (https://fullcalendar.io/docs/event-object)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
          })

        })
      }

      ini_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;

      var containerEl = document.getElementById('external-events');
      var checkbox = document.getElementById('drop-remove');
      var calendarEl = document.getElementById('calendar');

      // initialize the external events
      // -----------------------------------------------------------------

      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
          };
        }
      });

      var calendar = new Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //--------alert date------
        dateClick: function(info) {
          alert('Date: ' + info.dateStr);
          alert('Resource ID: ' + info.resource.id);
        },
        //-----------------------------------
        //---------------Random default events---------
        // events: [
        //   {
        //     title          : 'All Day Event',
        //     start          : new Date(y, m, 1),
        //     backgroundColor: '#f56954', //red
        //     borderColor    : '#f56954', //red
        //     allDay         : true
        //   },
        //   {
        //     title          : 'Long Event',
        //     start          : new Date(y, m, d - 5),
        //     end            : new Date(y, m, d - 2),
        //     backgroundColor: '#f39c12', //yellow
        //     borderColor    : '#f39c12' //yellow
        //   },
        //   {
        //     title          : 'Meeting',
        //     start          : new Date(y, m, d, 10, 30),
        //     allDay         : false,
        //     backgroundColor: '#0073b7', //Blue
        //     borderColor    : '#0073b7' //Blue
        //   },
        //   {
        //     title          : 'Lunch',
        //     start          : new Date(y, m, d, 12, 0),
        //     end            : new Date(y, m, d, 14, 0),
        //     allDay         : false,
        //     backgroundColor: '#00c0ef', //Info (aqua)
        //     borderColor    : '#00c0ef' //Info (aqua)
        //   },
        //   {
        //     title          : 'Birthday Party',
        //     start          : new Date(y, m, d + 1, 19, 0),
        //     end            : new Date(y, m, d + 1, 22, 30),
        //     allDay         : false,
        //     backgroundColor: '#00a65a', //Success (green)
        //     borderColor    : '#00a65a' //Success (green)
        //   },
        //   {
        //     title          : 'Click for Google',
        //     start          : new Date(y, m, 28),
        //     end            : new Date(y, m, 29),
        //     url            : 'https://www.google.com/',
        //     backgroundColor: '#3c8dbc', //Primary (light-blue)
        //     borderColor    : '#3c8dbc' //Primary (light-blue)
        //   }
        // ],
        //----------------------------------------------------------
        editable: false,
        locale: 'th',
        selectable: true,
        events: SITEURL + "/Home",
        displayEventTime: false,
        eventRender: function(event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = true;
          } else {
            event.allDay = false;
          }
        },
        selectHelper: true,




      });



      calendar.render();
      // $('#calendar').fullCalendar()

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      // Color chooser button
      $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color': currColor
        })
      })
      $('#add-new-event').click(function(e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        // Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color': currColor,
          'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
      })
    })
  </script>


</body>

</html>