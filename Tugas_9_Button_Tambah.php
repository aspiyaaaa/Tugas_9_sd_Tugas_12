<?php
$mysqli = new mysqli('localhost', 'root','','tedc');

$result = $mysqli->query("SELECT students.nim, students.nama, study_programs.name 
                          FROM students INNER JOIN study_programs ON students.study_program_id = study_programs.id 
                          WHERE study_programs.id= 12;");


$mahasiswa = [];

while ($row = $result->fetch_assoc()) {
    array_push($mahasiswa, $row);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class ="container">
    <h1 text-align="center" >From Edit Mahasiswa</h1>
    <form method ="POST">
        <div class ="mb-3">
            <label for="Nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="Nim" name="Nim" value="<?= $data['Nim']?>" disabled>
        </div> 
        <div class ="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $data['Nama']?>">
        </div>
        <div class ="mb-3">
            <label for="Prodi" class="form-label">Prodi</label>
            <select class="form-select" id="Prodi" name="Prodi">
            <?php while ($row = $program_studi->fetch_assoc()) { ?>
                <option value="<?= $row['Id_Prodi'] ?>" <?= $row['Id_Prodi'] == $data['Id_Prodi'] ? 'selected' : '' ?>><?= $row['Prodi']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mt-3">
                <button type="submit" class="btn btn-primary">Sumbit</button>
                <a href="Mahasiwa.php" class="btn btn-warning">Cancel</a>
         </div>
    </form>
    
</body>
</html>