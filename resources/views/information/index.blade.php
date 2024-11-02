<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container mt-5">
        
       
        <a href="{{ route('education.create') }}" class="btn btn-primary">Add New Education Record</a>

        <h2>Educational Information</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Program</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educations as $education)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th> <!-- Loop index -->
                        <td>{{ $education->first_name }}</td>
                        <td>{{ $education->last_name }}</td>
                        <td>{{ $education->email }}</td>
                        <td>{{ $education->program }}</td>
                        <td>
                            <a href="{{ route('education.edit', $education->id) }}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="deleteEducation({{ $education->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // function editEducation(id) {
        //     alert('Edit education with ID: ' + id);
        // }

       
        function deleteEducation(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        $.ajax({
            url: '/education/' + id, // Ensure the URL matches your route definition
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Include the CSRF token
            },
            success: function(response) {
                alert('Record deleted successfully!');
                location.reload(); // Reload the page or remove the record from the UI
            },
            error: function(xhr) {
                alert('Error deleting record: ' + xhr.responseJSON.message);
            }
        });
    }
}


      
    </script>
</body>
</html>
