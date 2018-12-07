<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}">scrabit</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/dashboard') }}">sb</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="{{ url('/dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Manage</li>
            <li class="dropdown">
                <a href="{{ action('CrawlerController@index') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-spider"></i> <span>Crawlers</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ action('CrawlerController@create') }}">Create Crawler</a></li>
                    <li><a class="nav-link" href="{{ action('CrawlerController@index') }}">Crawlers List</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>