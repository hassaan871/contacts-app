<nav>
    <ul class="nav-left">
        <li class="app-name">ContactsClub</li>
        <li>
            <a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">Home</a>
        </li>
        <li>
            <a href="/contacts" class="{{ request()->is('contacts') ? 'active' : '' }}">Contacts</a>
        </li>
        @if(session('user')->role->name === 'Admin')
        <li>
            <a href="/users" class="{{ request()->is('users') ? 'active' : '' }}">Users</a>
        </li>
        @endif
    </ul>

    <ul class="nav-right">
        <li>Welcome, {{ session('user')->name }}</li>
        <li>
            <a href="/logout">Logout</a>
        </li>
    </ul>
</nav>

<style>
    body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 30px;
        background-color: #023E8A;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    li {
        margin: 0 15px;
    }

    .app-name {
        font-weight: bold;
        font-size: 28px;
        color: white;
        margin-right: 30px;
        /* color: darkorange; */
        color: #FFD700; /* Gold highlight */
    }

    a {
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
        color: white;
    }

    a.active {
        color: #FFD700; /* Gold highlight */
        border-bottom: 2px solid #FFD700;
    }

    .nav-right li {
        font-size: 18px;
        color: white;
    }
</style>
