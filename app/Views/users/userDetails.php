<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: #ff0000;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <?= session()->getFlashdata('success') ?>
    <?= session()->getFlashdata('error') ?>

    <h1><?= esc($title) ?></h1>

    <!-- Example logout button in user_details.php -->


    <form action="/users/saveDetails" method="post">
        <?= csrf_field() ?>

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="<?= $userDetails['first_name'] ?? old('first_name') ?>" required>
        <br>

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?= $userDetails['last_name'] ?? old('last_name') ?>" required>
        <br>

        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="male" <?= ($userDetails['gender'] ?? old('gender')) === 'male' ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= ($userDetails['gender'] ?? old('gender')) === 'female' ? 'selected' : '' ?>>Female</option>
            <!-- Add other gender options if needed -->
        </select>
        <br>

        <label for="contact_number">Contact Number</label>
        <input type="text" name="contact_number" value="<?= $userDetails['contact_number'] ?? old('contact_number') ?>" required>
        <br>

        <label for="date_of_birth">Date of Birth</label>
        <input type="date" name="date_of_birth" value="<?= $userDetails['date_of_birth'] ?? old('date_of_birth') ?>" required>
        <br>

        <label for="date_of_joining">Date of Joining</label>
        <input type="date" name="date_of_joining" value="<?= $userDetails['date_of_joining'] ?? old('date_of_joining') ?>" required>
        <br>

        <label for="nationality">Nationality</label>
        <input type="text" name="nationality" value="<?= $userDetails['nationality'] ?? old('nationality') ?>" required>
        <br>

        <input type="submit" name="submit" value="Save Details">
    </form> 

    <form action="/users/logout" method="post">
        <?= csrf_field() ?>
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>



