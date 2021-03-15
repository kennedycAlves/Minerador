<nav class="navbar navbar-expand-lg navbar-dark  bg-primary mb-1" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbaruser" aria-controls="navbaruser" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse  h6 mb-0" id="navbaruser">
      <ul class="navbar-nav mr-auto ">
       
        <li @if($current=="Detalhes") class="nav-item active" @else class="nav-item" @endif>
         
          <a class="nav-link " href="/homeuser/{{ Auth::user()->id }}">Painel de Controle</a>
         
         
        
      </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->email }} <span class="caret"></span>
           </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>

          </div>
        
        </ul> 

        
        
    </div>

    
      </form>
  </nav>