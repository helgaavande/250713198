var targetNode;

function init() {
    targetNode = document.getElementById("hasil").firstChild;
}

function hitungKurs(id) {
    var inputEl = document.getElementById(id);
    var rupiah = inputEl.value;
    var hasilUsd = parseFloat(rupiah) / 18246;
    targetNode.data = hasilUsd.toFixed(2);

    // i. Membuat elemen list baru
    var itemBaru = document.createElement("li");

    // ii. Membuat node teks catatan riwayat
    var teksRiwayat = document.createTextNode("Rp" + rupiah + " = US$" + hasilUsd.toFixed(2));
    itemBaru.appendChild(teksRiwayat);

    // iii. Sisipkan ke list dengan id "riwayat"
    document.getElementById("riwayat").appendChild(itemBaru);
}