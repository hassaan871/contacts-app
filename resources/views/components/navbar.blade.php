<nav>
    <ul>
        <li>
            Welcome, {{ session('user')->name }}
        </li>
        <li>
            <a href="/home">Home</a>
        </li>
        <li>
            <a href="/contacts">Contacts</a>
        </li>
        @if(session('user')->role->name === 'Admin')
        <li>
            <a href="/users">Users</a>
        </li>
        @endif
        <li>
            <a href="/logout">
                Logout
            </a>
        </li>
    </ul>
</nav>

<style>
    body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    li a {
        text-decoration: none;
        font-weight: bold;
        font-size: 25px;
        margin: 20px;
        padding: 25px;
        color: #023E8A;
    }
</style>