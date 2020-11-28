<header class="flex justify-between items-center py-5">
    <div>Logo</div>
    <nav>
            <a href="#" class="mr-5 hover:text-green-500">Nos Missions</a>
        @guest
            <a class="mr-5 hover:text-green-500" href="{{ route('login') }}">Se connecter</a>
            <a class="mr-5 hover:text-green-500" href="{{ route('register') }}">S'enregistrer</a>
        @else
            <a class="mr-5 hover:text-green-500" href="{{ route('home') }}">Tableau de bord</a>
            <a class="mr-5 hover:text-green-500" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();
            ">Se Déconnecter</a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none">
                @csrf
            </form>

        @endguest
    </nav>
</header>