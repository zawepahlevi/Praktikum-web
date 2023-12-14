<?php
$loan_success = false;
$book_not_available = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['borrow'])) {
    $book_title = isset($_POST["book_title"]) ? $_POST["book_title"] : '';

    // Check if the book is available
    $available_books = file('available_books.txt', FILE_IGNORE_NEW_LINES);
    $index = array_search($book_title, $available_books);

    if ($index !== false) {
        // Book is available, remove it from the available_books.txt
        unset($available_books[$index]);
        file_put_contents('available_books.txt', implode("\n", $available_books));

        // Add the borrowed book to borrowed_books.txt
        file_put_contents('borrowed_books.txt', "$book_title\n", FILE_APPEND | LOCK_EX);

        $loan_success = true;
    } else {
        // Book is not available
        $book_not_available = true;
    }
}

// Read the available books list
$available_books_list = file('available_books.txt', FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        /* ... (Style from previous code) ... */

        .borrow-form {
            margin-top: 20px;
        }

        .book-list {
            margin-top: 20px;
            text-align: left;
        }

        .book-list ul {
            list-style-type: none;
            padding: 0;
        }

        .book-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($loan_success): ?>
            <div class="success">
                <p>Peminjaman berhasil! Terima kasih.</p>
            </div>
        <?php elseif ($book_not_available): ?>
            <div class="error">
                <p>Buku tidak tersedia untuk dipinjam saat ini. Silakan coba lagi nanti.</p>
            </div>
        <?php endif; ?>

        <!-- Borrow Form -->
        <form class="borrow-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Borrow Book</h1>
            <a href="login.php"><h4>Logout</h4></a>

            <label for="book_title">Book Title:</label>
            <select id="book_title" name="book_title" required>
                <?php foreach ($available_books_list as $book): ?>
                    <option value="<?php echo htmlspecialchars($book); ?>"><?php echo htmlspecialchars($book); ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="borrow">Borrow</button>
        </form>

        <!-- Available Books List -->
        <div class="book-list">
            <h2>Available Books:</h2>
            <?php if (!empty($available_books_list)): ?>
                <ul>
                    <?php sort($available_books_list);
                    foreach ($available_books_list as $book): ?>
                        <li><?php echo htmlspecialchars(trim($book)); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No books available at the moment.</p>
            <?php endif; ?>
        </div>

        <div>
        <a href="kembali.php"><h4>Kembali</h4></a>
        </div>
    </div>
</body>
</html>
