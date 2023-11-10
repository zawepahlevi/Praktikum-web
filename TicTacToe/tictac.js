document.addEventListener("DOMContentLoaded", function () {
  const board = document.getElementById("board");
  const cells = document.querySelectorAll(".cell");
  const status = document.getElementById("status");
  const resetButton = document.getElementById("reset");
  const toggleDarkModeButton = document.getElementById("toggleDarkMode");

  let currentPlayer = "X";
  let gameBoard = ["", "", "", "", "", "", "", "", ""];
  let gameActive = true;

  // Function to check the winner
  function checkWinner() {
    const winPatterns = [
      [0, 1, 2],
      [3, 4, 5],
      [6, 7, 8], // Rows
      [0, 3, 6],
      [1, 4, 7],
      [2, 5, 8], // Columns
      [0, 4, 8],
      [2, 4, 6], // Diagonals
    ];

    for (const pattern of winPatterns) {
      const [a, b, c] = pattern;
      if (
        gameBoard[a] &&
        gameBoard[a] === gameBoard[b] &&
        gameBoard[a] === gameBoard[c]
      ) {
        return gameBoard[a];
      }
    }

    if (!gameBoard.includes("")) {
      return "T"; // Tie
    }

    return null;
  }

  // Function to handle cell click
  function handleCellClick(index) {
    if (!gameBoard[index] && gameActive) {
      gameBoard[index] = currentPlayer;
      cells[index].textContent = currentPlayer;

      const winner = checkWinner();

      if (winner) {
        gameActive = false;
        if (winner === "T") {
          status.textContent = "It's a tie!";
        } else {
          status.textContent = `Player ${winner} wins!`;
        }
      } else {
        currentPlayer = currentPlayer === "X" ? "O" : "X";
        status.textContent = `Player ${currentPlayer}'s turn`;
      }
    }
  }

  // Function to handle reset button click
  function handleResetClick() {
    gameBoard = ["", "", "", "", "", "", "", "", ""];
    gameActive = true;
    currentPlayer = "X";
    status.textContent = `Player ${currentPlayer}'s turn`;

    cells.forEach((cell) => {
      cell.textContent = "";
    });
  }

  // Function to toggle dark mode
  function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
  }

  // Event listeners
  cells.forEach((cell, index) => {
    cell.addEventListener("click", () => handleCellClick(index));
  });

  resetButton.addEventListener("click", handleResetClick);
  toggleDarkModeButton.addEventListener("click", toggleDarkMode);
});
