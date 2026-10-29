function fn_ValForm() {
    var nama = document.getElementById("nama").value.trim();
    var email = document.getElementById("email").value.trim();
    var umurStr = document.getElementById("umur").value.trim();
    var kode = document.getElementById("kategori").value;

    var errors = [];

    if (nama === "") {
        errors.push("Nama tidak boleh kosong.");
    }

    var pola = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
    if (email === "") {
        errors.push("Email tidak boleh kosong.");
    } else if (!pola.test(email)) {
        errors.push("Format email salah (hanya huruf kecil, contoh: nama@domain.com).");
    }

    var info = "";
    if (umurStr === "") {
        errors.push("Umur tidak boleh kosong.");
    } else if (isNaN(umurStr) || umurStr.indexOf(".") !== -1) {
        errors.push("Umur harus berupa angka.");
    } else {
        var umur = parseInt(umurStr, 10);
        if (umur < 10 || umur > 18) {
            errors.push("Umur harus di antara 10 sampai 18 tahun.");
        } else if (umur <= 14) {
            info = "Kategori Junior";
        } else {
            info = "Kategori Senior";
        }
    }

    if (kode === "") {
        errors.push("Pilihan lomba harus dipilih.");
    }

    if (errors.length > 0) {
        alert("Terdapat kesalahan:\n- " + errors.join("\n- "));
        return false;
    }

    var pilihan = "";
    switch (kode) {
        case "C":
            pilihan = "Cerdas Cermat";
            break;
        case "P":
            pilihan = "Puisi";
            break;
        case "D":
            pilihan = "Design poster";
            break;
    }

    alert("Terima kasih " + nama + " ! Anda terdaftar di lomba " + pilihan + " (" + info + ").");
    return true;
}