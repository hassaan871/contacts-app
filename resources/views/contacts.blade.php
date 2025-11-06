<x-navbar />
<div>
    <h1>Contacts List</h1>
    @if(session('info'))
        <div style="border: 3px solid yellow;">
            {{ session('info') }}
        </div>
    @endif

    <form action="/search" method="get">
        <input type="text" placeholder="Search Contact with Name" name="search" value="{{@$search}}">
        <button>Search</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Contact Name</th>
                <th>Contact Email</th>
                <th>Contact Phone</th>
                <th>Edit contact</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id}}</td>
                <td>{{ $contact->name}}</td>
                <td>{{ $contact->email}}</td>
                <td>{{ $contact->phone}}</td>
                <td>
                    <form action="{{'contacts/'.$contact->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{'contacts/'.$contact->id}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <br>
    @if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif

    <h4>Create New Contact</h4>
    <form action="contacts" method="post">
        @csrf
        <input type="text" placeholder="New Contact Name" name="name" required>
        <input type="text" placeholder="New Contact Email" name="email" required>
        <input type="text" placeholder="New Contact Phone" name="phone" required>
        <button type="submit">Create New Contact</button>
    </form>
  
    <a href="/logout">
        <button>Logout</button>
    </a>
</div>