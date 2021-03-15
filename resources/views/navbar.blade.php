<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">
        <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="/">Home</a>
        </li>
        <li @if($current=="clientes") class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/clientes">Clientes</a>
        </li>

        <li @if($current=="Loggout") class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="/clientes/sair">Loggout</a>
          
          
        </li>
      </ul>
     
       
        
    </div>

    
      </form>
  </nav>