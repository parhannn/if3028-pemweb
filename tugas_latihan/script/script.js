const BOBOT_TUGAS = 0.3;
const BOBOT_UTS = 0.3;
const BOBOT_UAS = 0.4;

function showAlert(message) {
  document.getElementById("alertMessage").textContent = message;

  document.getElementById("customAlert").style.display = "flex";
}

function closeAlert() {
  document.getElementById("customAlert").style.display = "none";
}

function hitungNilai() {
  const nim = document.getElementById("nim").value;
  const nama = document.getElementById("nama").value;
  let tugas = parseFloat(document.getElementById("tugas").value);
  let uts = parseFloat(document.getElementById("uts").value);
  let uas = parseFloat(document.getElementById("uas").value);

  if (
    !nim ||
    !nama ||
    isNaN(tugas) ||
    isNaN(uts) ||
    isNaN(uas) ||
    tugas < 0 ||
    tugas > 100 ||
    uts < 0 ||
    uts > 100 ||
    uas < 0 ||
    uas > 100
  ) {
    showAlert("Data yang dimasukkan tidak valid!");
    return;
  }

  const nilaiAkhir = tugas * BOBOT_TUGAS + uts * BOBOT_UTS + uas * BOBOT_UAS;
  let grade = "";
  if (nilaiAkhir >= 90) grade = "A";
  else if (nilaiAkhir >= 80) grade = "B";
  else if (nilaiAkhir >= 70) grade = "C";
  else if (nilaiAkhir >= 60) grade = "D";
  else grade = "E";

  const dataMahasiswa = {
    nim,
    nama,
    tugas,
    uts,
    uas,
    nilaiAkhir: nilaiAkhir.toFixed(2),
    grade,
  };

  let daftarMahasiswa =
    JSON.parse(localStorage.getItem("daftarMahasiswa")) || [];
  daftarMahasiswa.push(dataMahasiswa);
  localStorage.setItem("daftarMahasiswa", JSON.stringify(daftarMahasiswa));

  showAlert("Data berhasil disimpan!");
  document.getElementById(
    "result"
  ).innerHTML = `<p>Nilai Akhir: ${nilaiAkhir.toFixed(
    2
  )}<br>Grade: ${grade}</p>`;
}

function loadData() {
  const daftarMahasiswa =
    JSON.parse(localStorage.getItem("daftarMahasiswa")) || [];
  const tableBody = document.getElementById("table-body");
  tableBody.innerHTML = "";

  if (daftarMahasiswa.length === 0) {
    tableBody.innerHTML = "<tr><td colspan='7'>Tidak ada data</td></tr>";
    return;
  }

  daftarMahasiswa.forEach((mhs) => {
    const row = `<tr>
            <td>${mhs.nim}</td>
            <td>${mhs.nama}</td>
            <td>${mhs.tugas}</td>
            <td>${mhs.uts}</td>
            <td>${mhs.uas}</td>
            <td>${mhs.nilaiAkhir}</td>
            <td>${mhs.grade}</td>
        </tr>`;
    tableBody.innerHTML += row;
  });
}

function cariData() {
  const nimCari = document.getElementById("cari-nim").value;
  const daftarMahasiswa =
    JSON.parse(localStorage.getItem("daftarMahasiswa")) || [];
  const hasil = daftarMahasiswa.find((mhs) => mhs.nim === nimCari);

  const resultDiv = document.getElementById("result-cari");
  if (hasil) {
    resultDiv.innerHTML = `<p>NIM: ${hasil.nim}<br>Nama: ${hasil.nama}<br>Nilai Akhir: ${hasil.nilaiAkhir}<br>Grade: ${hasil.grade}</p>`;
  } else {
    resultDiv.innerHTML = `<p>Data tidak ditemukan!</p>`;
  }
}

function exportPDF(){
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  doc.autoTable({
    html: '#tableValue',
    startY: 10,
    theme: 'plain',
  });

  doc.save('Data Nilai Mahasiswa.pdf');
}
