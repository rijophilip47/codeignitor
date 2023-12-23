<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        table {
            background-color: #fff;
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #555;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#userDetailsTable').DataTable();
        } );
    </script>
</head>
<body>
    <h1><?= esc($title) ?></h1>
    <?php if ($userDetailsList): ?>
        <table id="userDetailsTable" class="display">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Date Of Birth</th>
                    <th>Date Of Joining</th>
                    <th>Nationality</th>
                    <!-- Add more columns if needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userDetailsList as $userDetails): ?>
                    <tr>
                        <td><?= esc($userDetails['employee_id']) ?></td>
                        <td><?= esc($userDetails['user_id']) ?></td>
                        <td><?= esc($userDetails['first_name']) ?></td>
                        <td><?= esc($userDetails['last_name']) ?></td>
                        <td><?= esc($userDetails['gender']) ?></td>
                        <td><?= esc($userDetails['contact_number']) ?></td>
                        <td><?= esc($userDetails['date_of_birth']) ?></td>
                        <td><?= esc($userDetails['date_of_joining']) ?></td>
                        <td><?= esc($userDetails['nationality']) ?></td>
                        <!-- Add more columns if needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No user details found.</p>
    <?php endif; ?>
</body>
</html>


