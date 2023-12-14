<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST["new_username"];
    $new_password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);

    // Cek apakah pengguna sudah terdaftar
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($saved_username, $saved_password) = explode('|', $user);
        if ($new_username === $saved_username) {
            echo "<p>User already exists. Choose a different username.</p>";
            exit;
        }
    }

    // Simpan informasi pendaftaran ke dalam file (users.txt)
    $user_data = "$new_username|$new_password\n";
    file_put_contents("users.txt", $user_data, FILE_APPEND);

    echo "<p>Registration successful for user: $new_username</p>";
} else {
    echo "<p>Invalid request.</p>";
}
?> -->
