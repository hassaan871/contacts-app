  <h1>Users List</h1>

    <form action="/search" method="get">
        <input type="text" placeholder="Search User with Name" name="" value="">
        <button>Search</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Create Permission</th>
                <th>Read Permission</th>
                <th>Update Permission</th>
                <th>Delete Permission</th>
                <th>Edit user</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->id}}</td>
                <td>{{ $member->user_name }}</td>
                <td>{{ $member->user_email }}</td>
                <td>{{ $member->create_permission }}</td>
                <td>{{ $member->read_permission }}</td>
                <td>{{ $member->update_permission }}</td>
                <td>{{ $member->delete_permission }}</td>
                <td>
                        <button type="submit">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    
    <br>
    <br>

    <h3>Create new User</h3>
    <form action="users" method="post">
        @csrf
        <input type="text" placeholder="New user name" name="name" required>
        <input type="text" placeholder="New user Email" name="email" required>
        <input type="text" placeholder="New user password" name="password" required>

        <br>
        <h4>Permissions:</h4>
        <label for="">
            <input type="checkbox" name="create">Create
        </label>
        <label for="">
            <input type="checkbox" name="read">Read
        </label>
        <label for="">
            <input type="checkbox" name="update">Update
        </label>
        <label for="">
            <input type="checkbox" name="delete">Delete
        </label>
        <br>
        <button type="submit">Create New User</button>
    </form>
