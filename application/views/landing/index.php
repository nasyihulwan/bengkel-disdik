<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

  <title>Welcome To NTRD GARAGE</title>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('dist/css/landing/bootstrap.min.css') ?> ">

  <link rel="stylesheet" type="text/css" href="<?= base_url('dist/css/landing/font-awesome.css') ?>">

  <link rel="stylesheet" href="<?= base_url('dist/css/landing/templatemo-training-studio.css') ?> ">


  <style>
    .image-header {
      filter: brightness(25%)
    }
  </style>

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="<?= site_url('landing') ?>" class="logo">BENGKEL<em> DISDIK</em> </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#features">Tentang</a></li>
              <li class="scroll-to-section"><a href="#our-classes">Layanan</a></li>
              <li class="scroll-to-section"><a href="#contact-us">Kontak</a></li>
              <li class="main-button"><a href="<?= site_url('auth') ?>">LOGIN</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->

  <div class="main-banner" id="top">
    <img src="<?= base_url('dist/img/landing/disdikbdggg.jpg') ?>" alt="" class="image-header">

    <div class=" header-text">
      <div class="caption">
        <h6>SISTEM APLIKASI PENGELOLA KENDARAAN OPERASIONAL</h6>
        <h2>BENGKEL <em>DISDIK</em></h2>
        <div class="main-button scroll-to-section">
          <a href="<?= site_url('service') ?>">Service NOW</a>
          <a href="<?= site_url('order') ?>">Order NOW</a>
        </div>
      </div>
    </div>
  </div>


  <!-- ***** Features Item Start ***** -->
  <section class="section" id="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="section-heading">
            <h2>Tentang <em>Kami</em></h2>
            <img src="<?= base_url('dist/img/landing/ntrd-logo1.png') ?>" alt="ntrd-logo">
            <p>Kami merupakan Bengkel kendaraan yang siap melayani 24 Jam. Kami hadir dan siap datang untuk melayani dan membantu pelanggan yang mengalami permasalahan teknis pada kendaraanya dimana pun anda berada. Kami siap membantu anda memberikan kemudahan untuk SERVICE PERAWATAN & SERVICE PERBAIKAN KENDARAAN di Tempat Anda untuk kendaraan Injection Jepang, Eropa, Korea. Kami melayani area Bandung Raya ( Kota Bandung, Cimahi, Lembang, Padalarang, Soreang, Ciwidey, Cileunyi dan sekitarnya ). Silahkan Konsultasikan terlebih dahulu keluhan dan permasalahan Mobil anda. Di bawah ini adalah beberapa layanan dari NTRD GARAGE, Semua pekerjaan di NTRD GARAGE dikerjakan oleh tenaga ahli yang berpengalaman dan profesional.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Item End ***** -->



  <!-- ***** Our Classes Start ***** -->
  <section class="section" id="our-classes">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Layanan <em>Kami</em></h2>
            <img src="<?= base_url('dist/img/landing/line-dec.png') ?> " alt="">
            <p>Dibawah ini adalah beberapa layanan yang ada di NTRD GARAGE. Semua pekerjaan dikerjakan oleh tenaga ahli yang berpengalaman dan profesional.</p>
          </div>
        </div>
      </div>
      <div class="row" id="tabs">
        <div class="col-lg-4">
          <ul>
            <li><a href='#tabs-1'><img src="<?= base_url('dist/img/landing/kuncipas.png') ?> " alt="">Perawatan Rutin</a></li>
            <li><a href='#tabs-2'><img src="<?= base_url('dist/img/landing/kuncipas.png') ?> " alt="">Service Kecil</a></a></li>
            <li><a href='#tabs-3'><img src="<?= base_url('dist/img/landing/kuncipas.png') ?> " alt="">Service Besar</a></a></li>
            <li><a href='#tabs-4'><img src="<?= base_url('dist/img/landing/kuncipas.png') ?> " alt="">Dan Lainnya</a></a></li>
            <div class="main-rounded-button"><a href="<?= site_url('service') ?>">Service NOW</a></div>
          </ul>
        </div>
        <div class="col-lg-8">
          <section class='tabs-content'>
            <article id='tabs-1'>
              <img src="<?= base_url('dist/img/landing/6p.png') ?> " alt="First Class">
              <h4>Perawatan Rutin</h4>


            </article>
            <article id='tabs-2'>
              <img src="<?= base_url('dist/img/landing/1p.png') ?>" alt="Second Training">
              <h4>Service Kecil</h4>


            </article>
            <article id='tabs-3'>
              <img src="<?= base_url('dist/img/landing/2p.png') ?>" alt="Third Class">
              <h4>Service Besar</h4>


            </article>
            <article id='tabs-4'>
              <img src="<?= base_url('dist/img/landing/3p.png') ?>" alt="Fourth Training">
              <img src="<?= base_url('dist/img/landing/4p.png') ?>" alt="Fourth Training">
              <img src="<?= base_url('dist/img/landing/5p.png') ?>" alt="Fourth Training">
              <h4>Dan Lainnya</h4>


            </article>
          </section>
        </div>
      </div>
    </div>
  </section>




  <!-- ***** Contact Us Area Starts ***** -->
  <section class="section" id="contact-us">
    <div class="section-heading">
      <h2>Kon<em>tak</em></h2>
      <img src="<?= base_url('dist/img/landing/line-dec.png') ?>" alt="">
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg col-md-6 col-xs-12">
          <div id="map">
            <center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60912443619!2d107.5731163132953!3d-6.903273916440719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1657522033470!5m2!1sid!2sid" width="1350" height="1000" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> </center>
          </div>
        </div>
        <!-- <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div> -->
      </div>
    </div>
  </section>
  <!-- ***** Contact Us Area Ends ***** -->

  <!-- ***** Footer Start ***** -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright &copy; 2022 NTRD GARAGE

            - Designed by <a rel="nofollow" href="" class="tm-text-link" target="_parent">NTRD Team</a></p>

          <!-- You shall support us a little via PayPal to info@templatemo.com -->

        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="<?= base_url('dist/js/landing/jquery-2.1.0.min.js') ?> "></script>

  <!-- Bootstrap -->
  <script src="<?= base_url('dist/js/landing/popper.js') ?> "></script>
  <script src="<?= base_url('dist/js/landing/bootstrap.min.js') ?> "></script>

  <!-- Plugins -->
  <script src="<?= base_url('dist/js/landing/scrollreveal.min.js') ?> "></script>
  <script src="<?= base_url('dist/js/landing/waypoints.min.js') ?> "></script>
  <script src="<?= base_url('dist/js/landing/jquery.counterup.min.js') ?>"></script>
  <script src="<?= base_url('dist/js/landing/imgfix.min.js') ?>"></script>
  <script src="<?= base_url('dist/js/landing/mixitup.js') ?>"></script>
  <script src="<?= base_url('dist/js/landing/accordions.js') ?>"></script>

  <!-- Global Init -->
  <script src="<?= base_url('dist/js/landing/custom.js') ?>"></script>

</body>

</html>