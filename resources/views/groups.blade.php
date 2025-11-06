<x-navbar />
<div>
    <h1>Groups Contacts</h1>
    <h3>Permissions:</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Create</th>
                <th>Read</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ $group->create_permission ? "Allowed" : "Not" }}</td>
                <td>{{ $group->read_permission ? "Allowed" : "Not" }}</td>
                <td>{{ $group->update_permission ? "Allowed" : "Not" }}</td>
                <td>{{ $group->delete_permission ? "Allowed" : "Not" }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Contacts: </h2>
    @if($group->read_permission)
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Contact Name</th>
                <th>Contact Email</th>
                <th>Contact Phone</th>
                @if($group->update_permission)
                <th>Edit</th>
                @endif
                @if($group->delete_permission)
                <th>Delete</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @foreach ($groupContacts as $contact)
            <tr>
                <td>{{ $contact->id}}</td>
                <td>{{ $contact->name}}</td>
                <td>{{ $contact->email}}</td>
                <td>{{ $contact->phone}}</td>
                @if($group->update_permission)
                <td>
                    <a href="{{'contacts/'.$contact->id}}">Edit</a>
                </td>
                @endif
                @if($group->delete_permission)
                <td>
                    <form action="{{'contacts/'.$contact->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div style="color:red;">
        You don't have permission to view the contacts.
    </div>
    @endif

    <h4>Create New Contact</h4>
    @if($group->create_permission)
    <form action="" method="post">
        <input type="text" placeholder="New Contact Name" name="name" required>
        <input type="text" placeholder="New Contact email" name="email" required>
        <input type="text" placeholder="New Contact phone" name="phone" required>
        <button>Create New Contact</button>
    </form>
    @else
    <div style="color:red;">
        You don't have permission to create a new contact.
    </div>

    @endif
</div>