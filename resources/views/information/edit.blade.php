<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Educational Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Educational Information</h2>
        
        <form id="editEducationForm" action="{{ route('education.update', $education->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This tells Laravel to treat this request as a PUT request -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $education->first_name }}" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $education->last_name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $education->email }}" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="program" class="form-label">Program</label>
                <input type="text" class="form-control" id="program" name="program" value="{{ $education->program }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
</body>
</html>
