var makananSelect = document.getElementById("makanan");
var jumlahInput = document.getElementById("jumlah");
var voucherInput = document.getElementById("voucher");
var hasil = document.getElementById("hasil");

document.getElementById("submitButton").addEventListener("click", function () {
  var makanan = makananSelect.value;
  var jumlah = jumlahInput.value;
  var totalHarga = jumlah * makanan;
  var totalVoucher = voucherInput.value;
  var diskon = 0;

  if (totalVoucher === "ASPRAKLEONGANTENG") {
    diskon = totalHarga * 0.2; // Example discount amount
  }

  totalHarga -= diskon;

  hasil.innerHTML = `
    <table>
      <tr>
        <td>Makanan</td>
        <td>${makanan}</td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td>${jumlah}</td>
      </tr>
      <tr>
        <td>Voucher</td>
        <td>${totalVoucher}</td>
      </tr>
      <tr>
      <td>Total Harga</td>
      <td>${totalHarga}</td>
      </tr>
    </table>
  `;
});
