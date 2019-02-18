<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('order')}}"><strong>Purchase a forecast</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('today')}}">Today's forecast </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact us</a>
                </li>
                @if(Auth::user())
                    @if(Auth::user()->is_admin == true)
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Admin Content Manager
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('admin.upload')}}">Upload the diagrams</a>
                                    <a class="dropdown-item" href="/admin/diagrams/showtime">Current demo diagrams</a>
                                    <a class="dropdown-item" href="/admin/users/showtime">Users</a>
                                    <a class="dropdown-item" href="/admin/orders/showtime">All orders</a>
                                    <a class="dropdown-item" href="/admin/transactions/showtime">Transacted orders</a>
                                    <a class="dropdown-item" href="/admin/chats/showtime">Messages to admin</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Error-exception log (n/a) </a>
                                </div>
                            </div>
                        </li>
                    @endif
                @endif


            </ul>
            <!-- Split dropleft button -->
            <div class="btn-group">
                <div class="btn-group dropdown" role="group">
                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropleft</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                            <a class="dropdown-item" href="{{route('home')}}">User profile</a>
                            <a class="dropdown-item" href="{{route('my-orders')}}">My orders</a>
                            <div class="dropdown-divider"></div>
                            <form method="post" action="{{route('logout')}}">
                                {{csrf_field()}}
                                <input type="submit" class="dropdown-item" value="logout">
                            </form>
                        @else
                            <a class="dropdown-item" href="{{route('login')}}">Sign in</a>
                            <a class="dropdown-item" href="{{route('register')}}">Sign up</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        @endif
                    </div>
                </div>
                <button type="button" class="btn btn-success">
                    User Account
                </button>
            </div>
        </div>
    </nav>
</div>