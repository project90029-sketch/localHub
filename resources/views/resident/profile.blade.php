<script>
const token = localStorage.getItem('auth_token');

if (!token) {
    window.location.href = '/login';
}

fetch('/api/user/profile', {
    headers: {
        'Authorization': 'Bearer ' + token,
        'Accept': 'application/json'
    }
})
.then(res => res.json())
.then(data => {
    document.getElementById('name').value = data.name;
    document.getElementById('email').value = data.email;
})
.catch(() => {
    window.location.href = '/login';
});
</script>



@extends('layouts.resident')

@section('content')
<h2>My Profile</h2>

<form class="form">
    <div class="form-group">
        <label>Name</label>
        <input type="text" id="name">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" id="email">
    </div>

    <div class="form-group">
        <label>Phone</label>
        <input type="text" placeholder="Enter phone number">
    </div>

    <button class="btn-primary">Update Profile</button>
</form>
@endsection
