<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <a href="{{ url('/admin') }}" class="navbar-brand">Dashboard</a>
    @auth
        <div class="ms-auto">
            <a href="{{ url('/admin') }}" class="btn btn-outline-secondary me-2">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Salir</button>
            </form>
        </div>
    @endauth
</nav>
