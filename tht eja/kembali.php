<?php
$return_success = false;
$book_not_borrowed = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['return'])) {
    $returned_book_title = isset($_POST["returned_book_title"]) ? $_POST["returned_book_title"] : '';

    // Check if the book is borrowed
    $borrowed_books = file('borrowed_books.txt', FILE_IGNORE_NEW_LINES);
    $index = array_search($returned_book_title, $borrowed_books);

    if ($index !== false) {
        // Book is borrowed, remove it from the borrowed_books.txt
        unset($borrowed_books[$index]);
        file_put_contents('borrowed_books.txt', implode("\n", $borrowed_books));

        // Add the returned book back to available_books.txt
        file_put_contents('available_books.txt', "$returned_book_title\n", FILE_APPEND | LOCK_EX);
        var_dump($returned_book_title);
        $return_success = true;
    } else {
        // Book is not borrowed
        $book_not_borrowed = true;
    }
}

// Read the borrowed books list
$borrowed_books_list = file('borrowed_books.txt', FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan - Pengembalian Buku</title>
    <style>
        /* ... (Style from previous code) ... */

        .return-form {
            margin-top: 20px;
        }

        .borrowed-books-list {
            margin-top: 20px;
            text-align: left;
        }

        .borrowed-books-list ul {
            list-style-type: none;
            padding: 0;
        }

        .borrowed-books-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($return_success): ?>
            <div class="success">
                <p>Pengembalian buku berhasil! Terima kasih.</p>
            </div>
        <?php elseif ($book_not_borrowed): ?>
            <div class="error">
                <p>Buku tidak terdaftar sebagai buku yang dipinjam. Silakan periksa kembali.</p>
            </div>
        <?php endif; ?>

        <!-- Return Form -->
        <form class="return-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Return Book</h1>

            <label for="returned_book_title">Book Title:</label>
            <select id="returned_book_title" name="returned_book_title" required>
                <?php foreach ($borrowed_books_list as $book): ?>
                    <option value="<?php echo $book; ?>"><?php echo $book; ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="return">Return</button>
        </form>

        <!-- Borrowed Books List -->
        <div class="borrowed-books-list">
            <h2>Borrowed Books:</h2>
            <?php if (!empty($borrowed_books_list)): ?>
                <ul>
                    <?php foreach ($borrowed_books_list as $book): ?>
                        <li><?php echo $book; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No books currently borrowed.</p>
            <?php endif; ?>
        </div>

        <div>
        <a href="pinjam.php"><h4>Peminjaman</h4></a>
        </div>
    </div>
</body>
</html>
