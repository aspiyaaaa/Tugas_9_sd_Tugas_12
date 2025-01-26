<?php
$mysqli = new mysqli('localhost', 'root', '', 'tedc');

// Proses penambahan data mahasiswa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $study_program_id = $_POST['study_program_id'];

    $mysqli->query("INSERT INTO students (nim, nama, study_program_id) VALUES ('$nim', '$nama', '$study_program_id')");

    // Redirect kembali ke halaman utama setelah data ditambahkan
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Tambah Data Mahasiswa</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="study_program_id" class="form-label">Program Studi</label>
                <select name="study_program_id" id="study_program_id" class="form-control" required>
                    <?php
                    $programs = $mysqli->query("SELECT * FROM study_programs");
                    while ($program = $programs->fetch_assoc()) { ?>
                        <option value="<?= $program['id']; ?>"><?= $program['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
