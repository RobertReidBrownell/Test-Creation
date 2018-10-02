<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>Exam Builder</title>
            <link rel="icon" type="image/x-icon" href="favicon.ico" />
            <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
    <style type="text/css" media="print">
        @page
        {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */

        }
        .main-menu , .print-exam {
            display: none;
        }
        .question{
            padding: .8em;
            display: inline-table;
        }

    </style>


    <meta class="foundation-mq"></head>
    <body>

        <!-- Start Top Bar -->
    <div class="top-bar main-menu">
      <div class="row">
        <div class="top-bar-left">
              <ul class="dropdown menu" data-dropdown-menu="tckp8q-dropdown-menu" role="menubar">
                  <li role="menuitem"><a href="{{ route('home') }}">Home</a></li>
                  <li role="menuitem"><a href="{{ route('exams') }}">Exams</a></li>

                  @if(Auth::guest())
                      <li role="menuitem"><a href="{{ route('login') }}">Login</a></li>
                      <li role="menuitem"><a href="{{ route('register') }}">Register</a></li>

                  @else
                      <li role="menuitem"><a href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form></li>
                  @endif
              </ul>
          </div>

      </div>
    </div>
    <!-- End Top Bar -->

    <br>

    
    
@yield('content')
    

    <div class="row column">
      <hr>
      <ul class="menu">
        <li class="float-right"><a href="https://www.reidbrownell.com">Exam Builder  &copy; 2018</a></li>
      </ul>
    </div>



        <script src="{{ asset('js/vendor/jquery.js') }}"></script>
        <script src="{{ asset('js/vendor/what-input.js') }}"></script>
        <script src="{{ asset('js/vendor/foundation.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            $(document).foundation();
        </script>


    </body>
</html>