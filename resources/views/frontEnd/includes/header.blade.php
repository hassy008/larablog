 <div id="templatemo_menu_panel">
    	<div id="templatemo_menu_section">
            <ul>
                <li><a href="{{ url('/') }}"  class="current">Home</a></li>
                <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                
                <li><a href="#">Archives</a></li>  
                <li><a href="{{ url('/about-us') }}">About</a></li> 
                <li><a href="{{ url('/contact') }}">Contact</a></li>  
              @guest  
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Sing Up</a></li>
              @else
                <li>
                  <!--this code from app.blade.php-->  
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

              @endguest  
                                   
            </ul> 
		</div>
    </div> <!-- end of menu -->
