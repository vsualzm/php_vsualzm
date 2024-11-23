<!-- untuk soal ke 3 siapkan databasenya -->
<!-- create dulu tablenya beserta insertkan databnya untuk mecobanya-->
<!-- Untuk mencobanya bisa mencari by nama,alamat dan hob  -->
<!-- untuk hobi bisa mencari lebih dari satu dengan koma -->
<?php
$host = 'localhost';
$dbname = 'test_db';
$user = 'root';
$password = '';

// Connect with database MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Cheking connection if err then die
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Seach variables 
$nama = '';
$alamat = '';
$hobi = '';  
$sql = "";  


if (isset($_POST['search'])) {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : '';  

    // format comma if hobi two or more
    $hobiArray = array_filter(array_map('trim', explode(',', $hobi)));

    // Query Search
    $sql = "SELECT person.nama, person.alamat, GROUP_CONCAT(hobi.hobi) AS hobi
            FROM person
            LEFT JOIN hobi ON person.id = hobi.person_id
            WHERE person.nama LIKE '%$nama%' 
            AND person.alamat LIKE '%$alamat%'";

    if (!empty($hobiArray)) {
        $hobiList = "'" . implode("','", $hobiArray) . "'";
        $sql .= " AND hobi.hobi IN ($hobiList)";
    }

    $sql .= " GROUP BY person.id";
} else {
    $sql = "SELECT person.nama, person.alamat, GROUP_CONCAT(hobi.hobi) AS hobi
            FROM person
            LEFT JOIN hobi ON person.id = hobi.person_id
            GROUP BY person.id";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Person & Hobi</title>
</head>
<body>
    <h1>Daft</h1>
    
    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" />
        
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $alamat; ?>" />
        
        <label for="hobi">Hobi (pisahkan dengan koma):</label>
        <input type="text" name="hobi" value="<?php echo $hobi; ?>" />
        
        <input type="submit" name="search" value="Search" />
    </form>

    <?php
    if (isset($_POST['search'])) {
        echo "<h2>Hasil Pencarian</h2>";
        echo "<table border='1'>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Hobi</th>
                    </tr>
                </thead>
                <tbody>";
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['nama'] . "</td>
                        <td>" . $row['alamat'] . "</td>
                        <td>" . $row['hobi'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data ditemukan</td></tr>";
        }
        
        echo "</tbody></table>";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
