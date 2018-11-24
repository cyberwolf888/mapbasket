<nav id="navigation" class="style-1">
    <ul id="responsive">

        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('home.lapangan') }}">Lapangan</a></li>
        <li><a href="{{ route('home.club') }}">Club</a></li>
        @can('admin-access')
        <li><a href="{{ route('master.dashboard') }}">Admin</a></li>
        @endcan
        @can('operator-access')
        <li><a href="{{ route('operator.dashboard') }}">My Account</a></li>
        @endcan
        
    </ul>
</nav>