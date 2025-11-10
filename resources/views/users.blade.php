  <x-navbar />
  <div>
      <h1>Users List</h1>

      <form action="/search" method="get">
          <input type="text" placeholder="Search User with Name" name="" value="">
          <button>Search</button>
      </form>

      <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>Is Admin</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- <td>{{ $user->password }}</td> -->
                    <td>{{ $user->role_id == 1 ? 'yes' : 'no'}}</td>
                    <td>
                        <form action="{{'users/'.$user->id}}" method="POST">
                            @csrf 
                            @method('DELETE')                            
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{'users/'.$user->id}}">Edit</a>
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
          <label>
              <input type="checkbox" name="isAdmin">
              Is Admin
          </label>  
          <br>
          <button type="submit">Create New User</button>
      </form>


      <h2>Users Permissions</h2>
      <table border="1">
          <thead>
              <tr>
                  <th>Create contact</th>
                  <th>Read contact</th>
                  <th>Update contact</th>
                  <th>Delete contact</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{ $permissions->contains('name', 'create_contact') ? 'YES' : 'NO' }}</td>
                  <td>{{ $permissions->contains('name', 'read_contact') ? 'YES' : 'NO' }}</td>
                  <td>{{ $permissions->contains('name', 'update_contact') ? 'YES' : 'NO' }}</td>
                  <td>{{ $permissions->contains('name', 'delete_contact') ? 'YES' : 'NO' }}</td>
              </tr>
          </tbody>
      </table>
      <br>

      <h3>Update Users permissions</h3>
      <form action="/permission" method="post">
        @csrf
        @method('PUT')
        <label>
            <input type="checkbox" name="permissions[]" value="create_contact"
            {{ $permissions->contains('name', 'create_contact') ? 'checked' : '' }}>
            Can Create Contacts
        </label>
        <br>
          
        <label>
            <input type="checkbox" name="permissions[]" value="read_contact"
            {{ $permissions->contains('name', 'read_contact') ? 'checked' : '' }}>
            Can Read Contacts
        </label>
        <br>
          
        <label>
            <input type="checkbox" name="permissions[]" value="update_contact"
            {{ $permissions->contains('name', 'update_contact') ? 'checked' : '' }}>
            Can Update Contacts
        </label>
        <br>
          
        <label>
            <input type="checkbox" name="permissions[]" value="delete_contact"
            {{ $permissions->contains('name', 'delete_contact') ? 'checked' : '' }}>
            Can Delete Contacts
        </label>
        <br>

          <button type="submit">Update</button>
    </form>
  </div>