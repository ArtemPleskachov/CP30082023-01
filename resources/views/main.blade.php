<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>
<body>
<div id="app">
    <div class="container">
        <h2>Create User</h2>
        <form id="create-user-form" method="post" onsubmit="return false">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="images" accept=".jpg, .png" class="form-control" required multiple="multiple">
            </div>

            <button type="submit">Create User</button>
        </form>

        <h1>User Management</h1>

        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Images Count</th>
            </tr>
            </thead>
            <tbody id="user-table-body">
            <!-- place for users list -->
            </tbody>
        </table>

    </div>
</div>

<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
