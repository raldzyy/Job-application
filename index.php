<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/1037437274/vector/halftone-abstract-background-vector-dot-pattern-gradient.jpg?s=2048x2048&w=is&k=20&c=gyrZlREX7BN1Nc9vyIzqYpat0hDjP2Cd6cELLTcUtjk='); /* Image bacground */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .card {
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.85); /* Semi-transparent background */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            color: #343a40;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Job Application Form</h1>
        <form action="index.php" method="POST" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="specialization" class="form-label">Specialization</label>
                <input type="text" class="form-control" name="specialization" required>
            </div>
            <div class="mb-3">
                <label for="year_of_exp" class="form-label">Years of Experience</label>
                <input type="number" class="form-control" name="year_of_exp" required>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Programming Language</label>
                <input type="text" class="form-control" name="language" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    include 'db.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];
    $year_of_exp = $_POST['year_of_exp'];
    $language = $_POST['language'];

    $stmt = $pdo->prepare("INSERT INTO job_applications (firstname, lastname, email, specialization, year_of_exp, language) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstname, $lastname, $email, $specialization, $year_of_exp, $language]);

    echo "Job Application Submitted!";
}

