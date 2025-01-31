<?php
$mysqli = new mysqli('localhost', 'root', '', 'tedc');

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Query untuk mendapatkan data mahasiswa
$query = "SELECT students.nim, students.nama, study_programs.name AS program_name
          FROM students 
          INNER JOIN study_programs ON students.study_program_id = study_programs.id 
          WHERE study_programs.id = 12;";

$result = $mysqli->query($query);

// Simpan hasil dalam array
$mahasiswa = [];
while ($row = $result->fetch_assoc()) {
    $mahasiswa[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center my-4">Data Mahasiswa KA 2021</h1>
    <div class="container">
        <!-- Button to Add and Edit Data -->
        <div class="mb-3 text-end">
            <a href="tambah_mahasiswa.php" class="btn btn-primary">Tambah Data</a>
        </div>

        <!-- Table for Student Data -->
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($mahasiswa) > 0): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($mahasiswa as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nim']); ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['program_name']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data mahasiswa</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
