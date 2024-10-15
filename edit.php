<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM job_applications WHERE id = ?");
    $stmt->execute([$id]);
    $application = $stmt->fetch();
}

if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];
    $year_of_exp = $_POST['year_of_exp'];
    $language = $_POST['language'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE job_applications SET firstname = ?, lastname = ?, email = ?, specialization = ?, year_of_exp = ?, language = ? WHERE id = ?");
    $stmt->execute([$firstname, $lastname, $email, $specialization, $year_of_exp, $language, $id]);

    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Application</h1>
        <form action="edit.php" method="POST" class="card p-4 shadow-sm">
            <input type="hidden" name="id" value="<?php echo $application['id']; ?>">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $application['firstname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $application['lastname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $application['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="specialization" class="form-label">Specialization</label>
                <input type="text" class="form-control" name="specialization" value="<?php echo $application['specialization']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="year_of_exp" class="form-label">Years of Experience</label>
                <input type="number" class="form-control" name="year_of_exp" value="<?php echo $application['year_of_exp']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Programming Language</label>
                <input type="text" class="form-control" name="language" value="<?php echo $application['language']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-success w-100">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
