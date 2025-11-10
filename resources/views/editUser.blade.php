<div>
    <h1>Edit User Form</h1>

    <form action="/users/{{$user->id}} " method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$user->name}}">
        <br>
        <br>
        <input type="text" name="email" value="{{$user->email}}">
        <br>
        <br>
        <input type="text" name="password" placeholder="Enter new Password">
        <br>
        <br>
        <label>
            <input type="checkbox" name="isAdmin" value="1" {{ $user->role_id == 1 ? 'checked' : '' }}>
            Is Admin
        </label>
        <br><br> <button>Update User</button>
        <a href="/users">Cancel</a>
    </form>
</div>