<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi PHP</title>
</head>
<body>

<?php
    $nama = $email = $jenis_kelamin = $operasi = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi Nama
        if (empty($_POST["nama"])) {
            $error_nama = " Nama ";
        } else {
            $nama = test_input($_POST["nama"]);
        }

        // Validasi Email
        if (empty($_POST["email"])) {
            $error_email = " Email ";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = " Format email tidak valid";
            }
        }

        // Validasi Jenis Kelamin
        if (empty($_POST["jenis_kelamin"])) {
            $error_jenis_kelamin = " Jenis Kelamin ";
        } else {
            $jenis_kelamin = test_input($_POST["jenis_kelamin"]);
        }

        // Validasi Operasi Aritmatika
        if (empty($_POST["operasi"])) {
            $error_operasi = " Operasi Aritmatika ";
        } else {
            $operasi = test_input($_POST["operasi"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nama: <input type="text" name="nama">
    <span class="error"><?php echo isset($error_nama) ? $error_nama : ''; ?></span>
    <br><br>

    Email: <input type="text" name="email">
    <span class="error"><?php echo isset($error_email) ? $error_email : ''; ?></span>
    <br><br>

    Jenis Kelamin:
    <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
    <span class="error"><?php echo isset($error_jenis_kelamin) ? $error_jenis_kelamin : ''; ?></span>
    <br><br>

    Operasi Aritmatika:
    <select name="operasi">
        <option value="">Pilih Operasi</option>
        <option value="+">Penjumlahan</option>
        <option value="-">Pengurangan</option>
        <option value="*">Perkalian</option>
        <option value="/">Pembagian</option>
    </select>
    <span class="error"><?php echo isset($error_operasi) ? $error_operasi : ''; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error_nama) && empty($error_email) && empty($error_jenis_kelamin) && empty($error_operasi)) {

        // Proses data setelah validasi
        // Misalnya, lakukan sesuatu dengan data yang disubmit
        echo "Data yang disubmit:<br>";
        echo "Nama: $nama<br>";
        echo "Email: $email<br>";
        echo "Jenis Kelamin: $jenis_kelamin<br>";
        echo "Operasi Aritmatika: $operasi<br>";
    }
?>

</body>
</html>
