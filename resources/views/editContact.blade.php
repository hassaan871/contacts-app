<div>
    <h1>Update Contact</h1>

    <form action="/contacts/{{$contact->id}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$contact->name}}">
        <br>
        <br>
        <input type="text" name="email" value="{{$contact->email}}">
        <br>
        <br>
        <input type="text" name="phone" value="{{$contact->phone}}">
        <br>
        <br>
        <button>Update Contact</button>
        <a href="/contacts">Cancel</a>
    </form>
</div>
