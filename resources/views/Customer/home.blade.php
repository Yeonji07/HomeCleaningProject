@extends("Customer.master")
@yield("title","Home Cleaning")
@section("content")
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Home Cleaning</h1>
          <h2>Proyek Bisnis 2</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
      </div>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><img src="/assets/img/on-time.png"/></div>
            <h4 class="title"><a href="">On time services</a></h4>
            <p class="description" style="text-align: justify;">Jasa pelayanan dengan ketepatan waktu yang memuaskan customer.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><img src="/assets/img/household.png"/></div>
            <h4 class="title"><a href="">Clean & Tidy</a></h4>
            <p class="description" style="text-align: justify;">Menjamin kebersihan dan kerapian rumah anda sebening mungkin.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><img src="/assets/img/trust.png"/></div>
            <h4 class="title"><a href="">100% Trusted</a></h4>
            <p class="description" style="text-align: justify;">Jaminan pelayanan jasa dengan kepercayaan 100%.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><img src="/assets/img/staff.png"/></div>
            <h4 class="title"><a href="">Experienced Staff</a></h4>
            <p class="description" style="text-align: justify;">Menyediakan pekerja yang berpengalaman dan mampu memberi kepuasan pada customer.</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" style="text-align: justify;">
            <p>
              Home Cleaning adalah layanan kebersihan profesional yang diperuntukkan untuk apartemen, rumah, perkantoran, serta tempat lainnya yang tersedia di berbagai daerah.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Daerah Jabodetabek</li>
              <li><i class="ri-check-double-line"></i> Daerah Jawa Timur</li>
              <li><i class="ri-check-double-line"></i> Daerah Jawa Tengah</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" style="text-align: justify;">
            <p>
              Kami menyediakan berbagai macam layanan kebersihan dan anda dapat berlangganan jika ingin menggunakan jasa kami secara periodik.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row justify-content-end">

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">65</span>
              <p>Happy Clients</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">85</span>
              <p>Projects</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">12</span>
              <p>Years of experience</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up">15</span>
              <p>Awards</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= About Video Section ======= -->
    <section id="about-video" class="about-video">
      <div class="container" data-aos="fade-up">
        <div class="section-title" style="margin-bottom:-60px;" data-aos="fade-left" data-aos-delay="100">
          <h2>Our Payment Method</h2>
        </div>
      </div>
    </section>
    <!-- End About Video Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">
        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="/assets/img/clients/BCA Transfer.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="/assets/img/clients/PayPal.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="/assets/img/clients/OVO.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="/assets/img/clients/DANA.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="/assets/img/clients/Go-Pay.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <img src="/assets/img/clients/Shopee-Pay.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimoni</h2>
          <p>Bagaimana pengalaman & pendapat mereka yang telah menjadi pelanggan kami? Biarlah pelanggan kami yang berbicara & berbagi cerita dengan anda.</p>
        </div>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Jasa home cleaning sangat bermanfaat untuk bersih-bersih rumah saat lagi nggak ada asisten rumah tangga dan kita lagi capek, membereskan kamar kosan di tahun ajaran baru, atau membersihkan debu debu di rumah setelah ditinggal mudik.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="/assets/img/testimoni1.jpg" class="testimonial-img" alt="">
            <h3>James Bryan</h3>
            <h4>Ketua RT</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
               Petugas kebersihan dari home cleaning membawa peralatan lengkap, rapih, cekatan. Terpenting sopan di rumah customer, sangat memuaskan.


              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="/assets/img/testimoni2.jpg" class="testimonial-img" alt="">
            <h3>Nicholas Andry</h3>
            <h4>Pelawak</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Suka banget sama service nya Home Cleaning tinggal order, terus beres deh semua sofa dan karpet dibersihin sehingga bebas dari tungau dan debu penyebab alergi dan penyakit.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="/assets/img/testimoni3.jpg" class="testimonial-img" alt="">
            <h3>Felia Gabriella</h3>
            <h4>Direktur</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Bersyukur dengan adanya jasa home cleaning membantu bumil bersih bersih saat pindahan rumah, dengan service yang memuaskan semua debu dan bakteri hilang!
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="/assets/img/testimoni4.jpg" class="testimonial-img" alt="">
            <h3>Michael Jonathan</h3>
            <h4>Kurir</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Terima kasih kepada teman-teman dari home cleaning yang telah membantu saya dalam membersihkan debu dan tungau dirumah. Rumah rasanya lebih bersih dan sehat, apalagi dibersihkannya dengan MicroTech – Ray.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="/assets/img/testimoni5.jpg" class="testimonial-img" alt="">
            <h3>Ivan Aubrey</h3>
            <h4>Pengusaha</h4>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Services</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <img src="/assets/img/icons8-home-100.png" style="width: 40px;">
              </div>
              <h4><a href="">Rumah</a></h4>
              <p>Layanan pembersihan rumah profesional yang meliputi mengelap debu, mengepel lantai, merapikan kamar tidur dan membersihkan kamar mandi.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <img src="/assets/img/icons8-office-100.png" style="width: 40px;">
              </div>
              <h4><a href="">Kantor</a></h4>
              <p>Layanan pembersihan kantor profesional yang meliputi mengelap debu, mengepel lantai, merapikan ruang meeting dan membersihkan kamar mandi.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <img src="/assets/img/icons8-building-with-top-view-100.png" style="width: 40px;">
              </div>
              <h4><a href="">Studio</a></h4>
              <p>Layanan pembersihan studio profesional yang meliputi mengelap debu, mengepel lantai, merapikan studio dan membersihkan kamar mandi.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-yellow">
              <div class="icon">
                <img src="/assets/img/icons8-apartment-100.png" style="width: 40px;">
              </div>
              <h4><a href="">Apartemen</a></h4>
              <p>Layanan pembersihan apartemen profesional yang meliputi mengelap debu, mengepel lantai, merapikan kamar tidur dan membersihkan kamar mandi.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-red">
              <div class="icon">
                <img src="/assets/img/icons8-school-building-100.png" style="width: 40px;">
              </div>
              <h4><a href="">Gedung</a></h4>
              <p>Layanan pembersihan gedung profesional yang meliputi mengelap debu, mengepel lantai, dan membersihkan kamar mandi.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-teal">
              <div class="icon">
                <i class="bx bx-arch"></i>
              </div>
              <h4><a href="">Other Services</a></h4>
              <p>Dan masih banyak pelayanan kebersihan lainnya yang dapat dipilih.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
          <h3>Order Our Services Right Now</h3>
          <p> Home Cleaning akan langsung melayani anda ketika anda memesan jasa kami, serta kami akan membersihkan rumah anda dengan memberikan jasa pelayanan yang terbaik agar rumah anda tetap bersih.</p>
          <a class="cta-btn" href="#">Order Now</a>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portofolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portofolio</h2>
          <p>Portofolio tentang kegiatan kami selama menerima jasa pelayanan</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>App Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>Web Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port4.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>App Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>Card Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port2.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>Web Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port7.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>App Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port8.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>Card Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port5.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="/assets/img/portfolio/port6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Photos</h4>
                <p>Card Categories</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/port6.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>

        </div>

      </div> -->
    <!-- </section>End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Subscription Pricing</h2>
          <p>Paket langganan yang dapat anda pilih untuk merawat kebersihan ruangan anda.</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="zoom-im" data-aos-delay="100">
                <div class="box">
                <h3>Paket A</h3>
                <h4><sup>Rp. </sup>300.000</h4>
                <ul>
                    <li>Total Voucher : 8 Voucher</li>
                    <li>Nominal per Voucher : Rp 50.000</li>
                    <li>Masa Berlaku : 1 Bulan</li>
                    <hr>
                    <li>HEMAT<br><br>
                    <p style="font-size: 18pt;">RP 100.000 !</p></li>
                </ul>
                <div class="btn-wrap mt-n4">
                    <a href="/user/checkout/1" class="btn-buy scrollto">Subscribe Now</a>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                <div class="box featured">
                <h3>Paket B</h3>
                <h4><sup>Rp. </sup>550.000</h4>
                <ul>
                    <li>Total Voucher : 14 Voucher</li>
                    <li>Nominal per Voucher : Rp 50.000</li>
                    <li>Masa Berlaku : 3 Bulan</li>
                    <hr>
                    <li>HEMAT<br><br>
                    <p style="font-size: 18pt;">RP 150.000 !</p></li>
                </ul>
                <div class="btn-wrap mt-n4">
                    <a href="/user/checkout/2" class="btn-buy scrollto">Subscribe Now</a>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                <h3>Paket C</h3>
                <h4><sup>Rp. </sup>1.000.000</h4>
                <ul>
                    <li>Total Voucher : 24 Voucher</li>
                    <li>Nominal per Voucher : Rp 50.000</li>
                    <li>Masa Berlaku : 6 Bulan</li>
                    <hr>
                    <li>HEMAT<br><br>
                    <p style="font-size: 18pt;">RP 200.000 !</p></li>
                </ul>
                <div class="btn-wrap mt-n4">
                    <a href="/user/checkout/3" class="btn-buy scrollto">Subscribe Now</a>
                </div>
                </div>
          </div>
        </div>
        <br>

        {{-- Single Voucher --}}
        <div class="section-title mt-5">
            <h2>Single Voucher Pricing</h2>
            <p>Harga voucher satuan sebagai alat pembayaran untuk merawat kebersihan ruangan anda.</p>
        </div>

        <div class="row d-flex justify-content-center mb-4">
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="box">
                <h3>Single Voucher</h3>
                <h4><sup>Rp. </sup>50.000</h4>
                <ul>
                    <li>Total Voucher : 1 Voucher</li>
                    <li>Nominal per Voucher : Rp 50.000</li>
                </ul>
                <div class="btn-wrap mt-n4">
                    <a href="/user/checkout/4" class="btn-buy scrollto">Buy Now</a>
                </div>
                </div>
            </div>
        </div>
        <br>
        {{-- Normal Pricing --}}
        <div class="section-title mt-5">
          <h2>Normal Pricing</h2>
          <p>Harga normal yang dapat anda pilih untuk merawat kebersihan ruangan anda.</p>
        </div>

        <div class="row d-flex justify-content-center">

          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <h3>Pembersihan Rumah</h3>
              <h6>Mulai</h6><h4><sup>Rp. </sup>99.900</h4>
              <ul>
                <li>Total Pembersihan : 1 Kali</li>
                <li>Durasi Pembersihan : 2 Jam</li>
                <hr>
                <li>Membersihkan seluruh bagian rumah</li>
              </ul>
              <form action="/user/appointment" method="POST">
                @csrf
                <input type="hidden" name="datapaket" value="7">
                <button type="submit" class="btn-buy scrollto">Buy Now</button>
              </form>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <h3>Pembersihan Apartment</h3>
              <h6>Mulai</h6><h4><sup>Rp. </sup>150.000</h4>
              <ul>
                <li>Total pembersihan : 1 Kali</li>
                <li>Durasi Pembersihan : 2 Jam</li>
                <hr>
                <li>Membersihkan seluruh ruangan apartment</li>
              </ul>
              <form action="/user/appointment" method="POST">
                @csrf
                <input type="hidden" name="datapaket" value="8">
                <button type="submit" class="btn-buy scrollto">Buy Now</button>
              </form>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-0" data-aos="zoom-im" data-aos-delay="100">
            <div class="box">
              <h3>Pembersihan Studio</h3>
              <h6>Mulai</h6><h4><sup>Rp. </sup>230.000</h4>
              <ul>
                <li>Total pembersihan : 1 Kali</li>
                <li>Durasi Pembersihan : 2 Jam</li>
                <hr>
                <li>Membersihkan seluruh ruangan studio</li>
              </ul>
              <form action="/user/appointment" method="POST">
                @csrf
                <input type="hidden" name="datapaket" value="9">
                <button type="submit" class="btn-buy scrollto">Buy Now</button>
              </form>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 mt-4 mt-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <h3>Pembersihan Kantor</h3>
              <h6>Mulai</h6><h4><sup>Rp. </sup>280.000</h4>
              <ul>
                <li>Total pembersihan : 1 Kali</li>
                <li>Durasi Pembersihan : 2 Jam</li>
                <hr>
                <li>Membersihkan seluruh ruangan kantor</li>
              </ul>
              <form action="/user/appointment" method="POST">
                @csrf
                <input type="hidden" name="datapaket" value="10">
                <button type="submit" class="btn-buy scrollto">Buy Now</button>
              </form>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <h3>Pembersihan Gedung</h3>
              <h6>Mulai</h6><h4><sup>Rp. </sup>550.000</h4>
              <ul>
                <li>Total pembersihan : 1 Kali</li>
                <li>Durasi Pembersihan : 2 Jam</li>
                <hr>
                <li>Membersihkan seluruh ruangan gedung</li>
              </ul>
              <form action="/user/appointment" method="POST">
                @csrf
                <input type="hidden" name="datapaket" value="11">
                <button type="submit" class="btn-buy scrollto">Buy Now</button>
              </form>
            </div>
          </div>

        </div>

        <div class="row">
            <p class="mt-3 ml-3">*Syarat dan Ketentuan berlaku.</p>
        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Memerlukan bantuan mengenai layanan kami? Silahkan cek beberapa pertanyaan umum dibawah untuk menemukan jawaban dari pertanyaan anda.Apabila anda masih tidak menemukan jawaban,hubungi kami melalui email/nomer telepon yang ada pada bagian bawah website kami</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Mulai jam berapa jasa Home Cleaning dapat saya pesan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Setiap hari mulai pukul 08.00 - 20.00 WIB
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Mengapa saya harus memilih untuk menggunakan jasa Home Cleaning? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                  Dengan pengalaman lebih dari 10 tahun, kami sepenuhnya memahami kebutuhan pelanggan kami, dan kami berkomitmen untuk menjadikan rumah atau kantor Anda lingkungan bersih yang menghadirkan kebahagiaan, harmoni, dan keseimbangan untuk membantu Anda sukses.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Bagaimana cara mudah untuk memesan secara online? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  Cukup isi formulir pemesanan di sini dan melakukan pembayaran.Apabila sudah selesai,maka kami akan segera melayani anda pada tanggal dan jam yang telah dipilih saat pengisian formulir pemesanan.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Metode pembayaran apa saja yang di sediakan oleh Home Cleaning untuk melakukan pembayaran? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  Kami menyediakan berbagai macam metode pembayaran seperti OVO,GoPay,ShopeePay,BCA,BNI,Mandiri,dan lainnya.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Apakah saya harus berada di rumah pada saat jadwal pembersihan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  Anda tidak harus berada di rumah pada saat jadwal pembersihan tetapi setidaknya ada orang lain yang berada di rumah untuk mengawasi kami dalam melakukan pembersihan.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Hubungi Kami</h2>

        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5554996577603!2d112.75664031472269!3d-7.291305994737402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbb476048727%3A0x5f5f7cf736ae643e!2sInstitut%20Sains%20dan%20Teknologi%20Terpadu%20Surabaya%20(ISTTS)!5e0!3m2!1sen!2sid!4v1618914299566!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen=""></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Alamat:</h4>
                <p>Jl. Ngagel Jaya Tengah No.73-77, Baratajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60284</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>contact@homecleaning.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>88899</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="/kirim" method="post">
                @csrf
              <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="txtContactName" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="txtContactEmail" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtContactSubject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="txtContactBody" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <!-- <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit" class="btn btn-secondary" name='btnContactSend'>Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
