<h2>Pendaftaran Membership</h2>
<form action="?menu=M" method="POST">
    <p>Nama : <br /><input type="text" name="nama" /></p>
    <p>NPM : <br /><input type="text" name="npm" /></p>
    <p>Paket Membership : <br />
        <select name="paket">
            <option value="">-- Pilih Paket --</option>
            <option value="1 bulan">1 bulan</option>
            <option value="3 bulan">3 bulan</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $npm = trim($_POST['npm'] ?? '');
    $paket = $_POST['paket'] ?? '';
    $errors = array();

    if ($nama === '' || $npm === '' || $paket === '') {
        $errors[] = "Harap lengkapi semua data.";
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
            $errors[] = "Nama hanya boleh mengandung huruf dan spasi.";
        }
        if (!preg_match("/^[0-9]+$/", $npm)) {
            $errors[] = "NPM hanya boleh mengandung angka.";
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($err) . " !!</p>";
        }
    } else {
        if ($paket === '1 bulan') {
            $keuntungan = "Potongan 50% untuk pembelian produk tertentu.";
        } elseif ($paket === '3 bulan') {
            $keuntungan = "Gratis cemilan hewan peliharaan untuk 3 bulan pertama.";
        } else {
            $keuntungan = "-";
        }

        echo "<h2>Informasi Pendaftaran</h2>";
        echo "<p><strong>Nama: </strong>" . htmlspecialchars($nama) . "</p>";
        echo "<p><strong>NPM: </strong>" . htmlspecialchars($npm) . "</p>";
        echo "<p><strong>Paket Membership: </strong>" . htmlspecialchars($paket) . "</p>";
        echo "<p><strong>Keuntungan: </strong>" . htmlspecialchars($keuntungan) . "</p>";
        echo "<p>Selamat! Anda telah berhasil mendaftar sebagai member dengan benefit: " . htmlspecialchars($keuntungan) . "</p>";
    }
} else {
    echo "<p>Silahkan lengkapi formulir di atas.</p>";
}
?>