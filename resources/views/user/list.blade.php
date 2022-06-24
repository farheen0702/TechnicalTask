<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>User Table</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>User Details</h2>
                    </div>
                    </br>
                </div>
            </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered table-striped">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Interest</th>
                <th>Roles</th>
            </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @foreach($user->user_interest as $interest)
                <td>{{ $interest->interest }}</td>
                @endforeach
                <td>
                </td>
            </tr>
        @endforeach
        </table>
        {!! $users->links() !!}
    </body>
</html>