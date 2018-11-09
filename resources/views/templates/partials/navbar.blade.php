<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('Home') }}"><b>BookTheTicket</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
        @if(Auth::check())
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('Home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{  Auth::user()->username }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <a class="dropdown-item" href="{{ route('BookingHistory')}}">Ticket History</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('Logout') }}">Logout</a>
                 </div>
        </li>
            @if(Auth::user()->is_studio)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('MyStudio') }}">MyStudio</a>
        </li>
        
            @endif
          <li class="nav-item ">
             <a class="nav-link" href="{{ route('AdvanceSearch') }}">Advance Search</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('Register') }}">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('Login') }}">Login</a>
        </li>
        @endif
      
     
    </ul>
      
       @if(Auth::check())
    <form class="form-inline my-2 my-lg-0" method="post" action="{{ route('SearchStudio') }}">
         @csrf
      <input class="form-control mr-sm-2" type="search" name="search_keyword" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      @endif
  </div>
</nav>