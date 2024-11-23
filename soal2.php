<?php
session_start();

if (!isset($_SESSION['nama'])) $_SESSION['nama'] = '';
if (!isset($_SESSION['umur'])) $_SESSION['umur'] = '';
if (!isset($_SESSION['hobi'])) $_SESSION['hobi'] = '';

$step = isset($_GET['step']) ? (int) $_GET['step'] : 1;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($step === 1) {
        $_SESSION['nama'] = $_POST['nama'];
        $step = 2; 
    } elseif ($step === 2) {
        $_SESSION['umur'] = $_POST['umur'];
        $step = 3; 
    } elseif ($step === 3) {
        $_SESSION['hobi'] = $_POST['hobi'];
        $step = 4; 
    }
}

if ($step === 1) {
    echo '<form method="POST" action="?step=1">
            <label>Nama Anda:</label>
            <input type="text" name="nama" required>
            <button type="submit">SUBMIT</button>
          </form>';
} elseif ($step === 2) {
    echo '<form method="POST" action="?step=2">
            <label>Umur Anda:</label>
            <input type="number" name="umur" required>
            <button type="submit">SUBMIT</button>
          </form>';
} elseif ($step === 3) {
    echo '<form method="POST" action="?step=3">
            <label>Hobi Anda:</label>
            <input type="text" name="hobi" required>
            <button type="submit">SUBMIT</button>
          </form>';
} elseif ($step === 4) {
    echo '<p><strong>Nama:</strong> ' . htmlspecialchars($_SESSION['nama']) . '</p>';
    echo '<p><strong>Umur:</strong> ' . htmlspecialchars($_SESSION['umur']) . '</p>';
    echo '<p><strong>Hobi:</strong> ' . htmlspecialchars($_SESSION['hobi']) . '</p>';

    session_destroy();
    echo '<a href="?step=1">Coba Lagi ?</a>';
}
?>