<?php
$registration_success = false;
$login_error = false;

function isUserDataFileExists() {
    $file = 'member_data.txt';
    return file_exists($file) && filesize($file) > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $nama_member = isset($_POST["nama_member"]) ? $_POST["nama_member"] : '';
        $email_member = isset($_POST["email_member"]) ? $_POST["email_member"] : '';
        $password_member = isset($_POST["password_member"]) ? $_POST["password_member"] : '';

        $file = 'member_data.txt';
        $data = "$nama_member, $email_member, $password_member\n";
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

        $registration_success = true;
    } elseif (isset($_POST['login'])) {
        $email_login = isset($_POST["email_login"]) ? $_POST["email_login"] : '';
        $password_login = isset($_POST["password_login"]) ? $_POST["password_login"] : '';

        $users = file('member_data.txt', FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            $userInfo = explode(', ', $user);
            if (count($userInfo) >= 3) {
                list($nama_member, $email_member, $password_member) = $userInfo;
                if ($email_member === $email_login && $password_member === $password_login) {
                    header("Location: pinjam.php");
                    exit();
                }
            }
        }
        $login_error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.35);
            text-align: center;
        }

        .form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success {
            color: #4caf50;
        }

        .error {
            color: #ff4d4d;
        }

        .message {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($registration_success): ?>
            <p class="success">Registrasi berhasil! Anda sekarang dapat melakukan login.</p>
        <?php elseif ($login_error): ?>
            <p class="error">Email atau password salah. Silakan coba lagi.</p>
        <?php else: ?>
            <?php if (!isUserDataFileExists()): ?>
                <p class="message">Tidak ada data pengguna yang terdaftar. Silakan daftar untuk membuat akun baru.</p>
            <?php endif; ?>
        <?php endif; ?>

        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Register</h1>
            <label for="nama_member">Name:</label>
            <input type="text" id="nama_member" name="nama_member" required>

            <label for="email_member">Email:</label>
            <input type="email" id="email_member" name="email_member" required>

            <label for="password_member">Password:</label>
            <input type="password" id="password_member" name="password_member" required>

            <button type="submit" name="register">Register</button>
        </form>

        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Login</h1>
            <label for="email_login">Email:</label>
            <input type="email" id="email_login" name="email_login" required>

            <label for="password_login">Password:</label>
            <input type="password" id="password_login" name="password_login" required>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
