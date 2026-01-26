<header>
    <div class="header-container"> 
        
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/warhammerLogo.png') }}" 
                alt="Warhammer logo"
                class="logo" >
            </a>

            <nav style="display: flex; gap: 20px; align-items: center;">
                @auth
                    <a href="{{ url('/create') }}"><h3>Opret Event</h3></a>
                    <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                            <h3>Logout</h3>
                        </button>
                    </form>
                @else
                    <a href="{{ url('/login') }}"><h3>Login</h3></a>
                @endauth
            </nav>
        
    </div>
<a href="{{ url('/') }}"><img src="{{ asset('img/Warhammer.jpg') }}" alt="Warhammer 40,000 battlefield scene with armored space marines in combat across a war-torn landscape" class="header-img"></a>
</header>
