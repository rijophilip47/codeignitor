<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

        input {
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
    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>

    <h1><?= esc($title) ?></h1>

    <form action="/users" method="post">
        <?= csrf_field() ?>

        <label for="email_id">Email ID</label>
        <input type="email" name="email_id" value="<?= set_value('email_id') ?>" required>
        <br>

        <label for="user_name">User Name</label>
        <input type="text" name="user_name" value="<?= set_value('user_name') ?>" required>
        <br>

        <label for="mobile_number">Mobile Number</label>
        <input type="text" name="mobile_number" value="<?= set_value('mobile_number') ?>" required>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" required>
        <br>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" required>
        <br>

        <input type="submit" name="submit" value="Register">
    </form> 
</body>
</html>



