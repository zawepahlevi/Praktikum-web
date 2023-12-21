<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('/css/RStoreStyle.css') }}">
  <title>RStore</title>
</head>

<body>
  <form action="sepatu.php" method="post">
    <header>
      <h1>Selamat Datang di R<span>Store</span></h1>
    </header>

    <nav>
      <a href="#home">Beranda</a>
      <a href="#">Tentang Kami</a>
      <a href="#contact">Kontak</a>
    </nav>

    <main>
      <section id="Conversejs">
        <h2>Converse</h2>
        <img src="https://www.converse.id/media/catalog/product/cache/e81e4f913a1cad058ef66fea8e95c839/0/1/01-CONVERSE-FFSSBCONA-CON166800C-White.jpg" alt="sepatuConverse" />
        <p>
          <b> Converse Run Star Hike Canvas Platform </b> <br>
          Rp. 1.199.000
        </p>
      </section>

      <section id="Vansjs">
        <h2>Vans</h2>
        <img src="https://images.vans.com/is/image/Vans/VN000D3H_Y28_HERO?wid=1600&hei=1984&fmt=jpeg&qlt=90&resMode=sharp2&op_usm=0.9,1.7,8,0" alt="SepatuVans" />
        <p>
          <b> Vans Old Skool </b> <br>
          Rp. 1.200.000
        </p>
      </section>

      <section id="Adidasjs">
        <h2>Adidas</h2>
        <img src="https://www.adidas.co.id/media/catalog/product/B/7/B75807_SL_eCom.jpg" alt="sepatuAdidas" />
        <p>
          <b> Adidas Samba OG </b> <br>
          Rp. 2.200.000
        </p>
      </section>

      <div>
        <h3>
          <a id="menuId" href="">Menu</a>
        </h3>
        <form action="">
          <h4>Gender</h4>
          <br>
          <input type="radio" name="jenisKelamin" value="xl" id="xl">
          <label for="xl">Laki-Laki</label>
          <br>
          <input type="radio" name="jenisKelamin" value="l" id="l">
          <label for="l">Perempuan</label>
          <br>
          <div>
            <ul>
              <h4>Merk Sepatu</h4>
              <li>
                <a id="Adidas.html" href="">Adidas</a>
              </li>
              <li>
                <a id="Converse.html" href="">Converse</a>
              </li>
              <li>
                <a id="Vans.html" href="">Vans</a>
              </li>
            </ul>
          </div>
        </form>
      </div>
      <br>
      <div class="input-email">
        <form action="/berhasil" method="get">
          <h4>Masukan Email:</h4>
          <label for="email">Email Anda</label>
          <input type="email" name="email" id="email" required>
          <br>
          <label for="password">Passwordnya</label>
          <input type="password" name="password" id="password">
          <br>
          <button type="submit">Lanjut</button>
        </form>
        <br>
        <div class="contact" id="contact">
          <a href="https://www.instagram.com/zawepahlevi_/" target="_blank">Contact Me</a>
        </div>
      </div>
      <br>
      <br>
    </main>
    <p id="hasilMenu"></p>
    <!-- <script src="sepatu.js"></script> -->

    <footer>&copy; RStore</footer>
</body>

</html>