<h2>Belanja</h2>
<p>Daftar Kategori:</p>
<form action="?menu=B" method="POST">
    <p>Makanan dan Minuman : <br />
        <select name="makanan">
            <option value="">-- Pilih --</option>
            <option value="daging kaleng">daging kaleng</option>
            <option value="susu">susu</option>
        </select>
    </p>
    <p>Aksesoris : <br />
        <select name="aksesoris">
            <option value="">-- Pilih --</option>
            <option value="kalung">kalung</option>
            <option value="pakaian">pakaian</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
function dapatDiskon($totalBayar)
{
    if ($totalBayar >= 100000) {
        return 0.10;
    }
    return 0;
}

function totalHarga($diskon, $totalBayar)
{
    return $totalBayar - ($totalBayar * $diskon);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $makanan = $_POST['makanan'] ?? '';
    $aksesoris = $_POST['aksesoris'] ?? '';
    $errors = array();

    if ($makanan === '' || $aksesoris === '') {
        $errors[] = "Silahkan pilih produk yang ingin dibeli.";
    }

    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($err) . " !!</p>";
        }
    } else {
        $hargaMakanan = 0;
        if ($makanan === 'daging kaleng') {
            $hargaMakanan = 10000;
        } elseif ($makanan === 'susu') {
            $hargaMakanan = 15000;
        }

        $hargaAksesoris = 0;
        if ($aksesoris === 'kalung') {
            $hargaAksesoris = 50000;
        } elseif ($aksesoris === 'pakaian') {
            $hargaAksesoris = 100000;
        }

        $totalBayar = $hargaMakanan + $hargaAksesoris;
        $diskon = dapatDiskon($totalBayar);
        $total = totalHarga($diskon, $totalBayar);

        echo "<h2>Informasi Belanja</h2>";
        echo "<p><strong>Makanan dan Minuman: </strong>" . htmlspecialchars($makanan) . " (Rp" . $hargaMakanan . ")</p>";
        echo "<p><strong>Aksesoris: </strong>" . htmlspecialchars($aksesoris) . " (Rp" . $hargaAksesoris . ")</p>";
        echo "<p><strong>Total Harga: </strong>Rp" . htmlspecialchars($total) . "</p>";
        echo "<p><strong>Diskon: </strong>" . htmlspecialchars($diskon * 100) . "%</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon " . (htmlspecialchars($diskon * 100)) . "%.</p>";
        }
    }
} else {
    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";
}
?>