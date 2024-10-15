<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM job_applications ORDER BY timestamp DESC");
$applications = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .table {
            margin-top: 20px;
        }

        thead.table-dark th {
            background-color: #343a40;
            color: #ffffff;
        }

        tbody tr:hover {
            background-color: #f1f3f5;
            transition: background-color 0.3s ease;
        }

        td, th {
            text-align: center;
            vertical-align: middle;
        }

        .btn-warning {
            color: white;
            background-color: #ffcc00;
        }

        .btn-danger {
            color: white;
            background-color: #e74c3c;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Job Applications</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Specialization</th>
                    <th>Years of Experience</th>
                    <th>Language</th>
                    <th>Timestamp</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $app): ?>
                <tr>
                    <td><?php echo $app['id']; ?></td>
                    <td><?php echo $app['firstname']; ?></td>
                    <td><?php echo $app['lastname']; ?></td>
                    <td><?php echo $app['email']; ?></td>
                    <td><?php echo $app['specialization']; ?></td>
                    <td><?php echo $app['year_of_exp']; ?></td>
                    <td><?php echo $app['language']; ?></td>
                    <td><?php echo $app['timestamp']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $app['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $app['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
