<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Educational Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Educational Information</h2>
        
        <form id="addEducationForm">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              
            </div>
            <div class="mb-3">
                <label for="program" class="form-label">Program</label>
                <input type="text" class="form-control" id="program" name="program" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- Load the full version of jQuery -->
    <script >
     $(document).ready(function() {
        $('#addEducationForm').on('submit', function(event) {
            event.preventDefault(); 
    
            const formData = $(this).serialize(); 
    
            $.ajax({
                url: '/education', 
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.message); // Show success message from response
                    $('#addEducationForm')[0].reset(); 
                    // Optionally, you can also append the new record to the table here
                },
                error: function(xhr) {
                    if (xhr.status === 422) { 
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = 'Validation Errors:\n';
                        for (const key in errors) {
                            errorMessage += errors[key].join(', ') + '\n';
                        }
                        alert(errorMessage);
                    } else {
                        alert('Error adding education record: ' + xhr.responseJSON.message);
                    }
                }
            });
        });
    });
    </script> <!-- Changed to full version -->
   
</body>
</html>
