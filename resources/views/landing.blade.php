<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sixtysix Journey</title>
    <link rel="shortcut icon" href="{{ asset('img/logodark.png') }}" type="image/x-icon">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css\bootstrap.min.css') }}">
    {{-- AOS --}}
    <link href="{{ asset('css\aos.css') }}" rel="stylesheet">
    {{-- Swiper --}}
    <link rel="stylesheet" href="{{ asset('css\swiper-bundle.min.css') }}" />
    {{-- BS ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .pages-link {
            color: #cacaca;
            transition: 0.3s
        }

        .pages-link:hover {
            color: #fff
        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top transparant" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('img/logo.png') }}" class="nav-logo"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="nav-link">Login</a>

                                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="nav-link">Register</a>

                            </li>
                            @endif
                        @endauth
                </div>
                @endif
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <main>
        {{-- Carousel --}}
        <section>
            <div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img\landing\hero1.jpg') }}" alt="" class="bd-placeholder-img">
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1 class="text-white carousel-header">Experience the Majestic Beauty of Mount Bromo
                                </h1>
                                <p class="opacity-75">Mount Bromo, Area Gunung Bromo, Podokoyo, Pasuruan, East Java,
                                    Indonesia</p>
                                {{-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/landing/hero2.jpg') }}" alt="" class="bd-placeholder-img">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1 class="text-white carousel-header">Unveiling the Hidden Gem of Pianemo</h1>
                                <p>Explore the Pristine Beauty of Raja Ampat's Spectacular Islands in Indonesia!</p>
                                {{-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/landing/hero3.jpg') }}" alt="" class="bd-placeholder-img">
                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1 class="text-white carousel-header">Embark on a Journey Through Time and Culture</h1>
                                <p>Malioboro Yogyakarta, Jalan Malioboro, Sosromenduran, Yogyakarta City, Special Region
                                    of
                                    Yogyakarta, Indonesia</p>
                                {{-- <button class="button">View more...</button> --}}
                                {{-- <p><a class="link-detail" href="#">Browse gallery</a></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        {{-- End Carousel --}}

        {{-- Desc --}}
        <section id="desc" class="pt-5">
            <div class="container py-5">
                <div class="d-flex align-items-center justify-content-between gap-2 gap-xl-5 flex-column flex-md-row">
                    <div class="col-md-5" data-aos="fade-right" data-aos-duration="1000">
                        <h1 class="section-title fw-semibold">Discover <br>the Ultimate Adventure!</h1>
                        <p class="section-text mt-5">Embark on a journey to the most breathtaking destinations at
                            unbeatable
                            prices. From serene
                            beaches to majestic mountains, we offer special discounts on all our tours. Simply choose
                            your
                            dream destination, and we'll take care of the rest. Secure your spot now and let the
                            adventure
                            begin!</p>
                    </div>
                    <div class="">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="img-overlay" data-aos="fade-left" data-aos-duration="1000">
                                <img src="{{ asset('img\landing\img1.jpg') }}" class="desc-img1" alt="">
                            </div>
                            <div class="img-overlay" data-aos="fade-left" data-aos-duration="2000">
                                <img src="{{ asset('img\landing\img2.jpg') }}" class="desc-img2" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        {{-- End Desc --}}

        {{-- Swipper --}}
        <section id="discover" class="pt-5">
            <div class="container mt-5 pt-5">
                <h1 class="section-title fw-semibold text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                    Discover the most <br />
                    attractive places
                </h1>

                <!-- Swiper Konten -->
                <div class="discover__container max-w-lg swiper-container" data-aos="zoom-out"
                    data-aos-duration="1500">
                    <div class="swiper-wrapper">
                        @foreach ($discovers as $discover)
                            <div class="discover__card swiper-slide">
                                <img src="{{ asset('storage/' . $discover->discover_image) }}" alt=""
                                    class="discover__img">
                                <div class="discover__data">
                                    <h2 class="discover__title text-white">{{ $discover->discover_title }}</h2>
                                    <span
                                        class="discover__description text-white">{{ $discover->discover_location }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
        {{-- End Swipper --}}

        {{-- Experience --}}
        <section id="exp" class="pt-5">
            <div class="container pt-5">
                <h1 class="mt-5 section-title fw-semibold text-center" data-aos="fade-up" data-aos-duration="1000">
                    With
                    Our Experience <br>
                    We Will Serve You</h1>

                <div class="d-flex flex-row justify-content-center gap-5 mt-5 ">
                    <div class="d-flex flex-column" data-aos="fade-up" data-aos-duration="500">
                        <div class="">
                            <h1>5+</h1>
                        </div>
                        <div class="">
                            <h6>Years <br>Experience</h6>

                        </div>
                    </div>
                    <div class="d-flex flex-column" data-aos="fade-up" data-aos-duration="1000">
                        <div class="">
                            <h1>140+</h1>
                        </div>
                        <div class="">
                            <h6>Complete <br>Tours</h6>

                        </div>
                    </div>
                    <div class="d-flex flex-column" data-aos="fade-up" data-aos-duration="1500">
                        <div class="">
                            <h1>400+</h1>
                        </div>
                        <div class="">
                            <h6>Tour <br>Destination</h6>
                        </div>
                    </div>

                </div>

                <div class=" mt-5 " data-aos="zoom-out-down" data-aos-duration="1000">
                    <div class="position-relative exp-img exp-img-container mx-auto">
                        <div class="img-overlay">
                            <img class="exp-img-1" src="{{ asset('img/landing/hero2.jpg') }}" alt="">
                        </div>
                        <div class="img-overlay position-absolute img2-frame">
                            <img class=" exp-img-2" src="{{ asset('img/landing/curug.jpg') }}" alt="">

                        </div>

                    </div>
                </div>
            </div>
        </section>
        {{-- End Experience --}}

        {{-- Journey Plan --}}
        <section id="journey-plan" class="pt-5">
            <div class="container  pt-5">
                <h1 class="mt-5 section-title fw-semibold text-center" data-aos="fade-up" data-aos-duration="1000">
                    Let's
                    see <br>
                    Our Plan Journey</h1>
                <div class="row row-cols-1 row-cols-md-3 mb-3 mt-5 text-center" data-aos="fade-up"
                    data-aos-duration="1000">
                    @foreach ($tours as $tour)
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="plan-card" style="background-color: aqua">
                                    <div class="card border-0 rounded-0 text-bg-dark">
                                        <img src="{{ asset('storage/' . $tour->banner_path) }}" class="card-img"
                                            alt="...">
                                        <div class="card-img-overlay d-flex align-items-end">
                                            <div class="text-start">
                                                <h2 class="card-title text-capitalize">{{ $tour->title }}</h2>
                                                <h6 class="card-text text-white text-capitalize">{{ $tour->location }}
                                                </h6>
                                                <p class="card-text">Rp.
                                                    {{ number_format($tour->price, 0, ',', '.') }}/pax</p>
                                                <a href="{{ route('showPlan', $tour->tour_id) }}"
                                                    class="link-detail">View Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>



            </div>
        </section>
        {{-- End Journey Plan --}}

        {{-- Contact --}}
        <section id="contact" class="pt-5">
            <div class="container px-4 py-5">
                <h1 class="mt-5 section-title fw-semibold text-center" data-aos="fade-up" data-aos-duration="1000">
                    Or Plan your own trip <br>and Contact us</h1>

                <div
                    class="row row-cols-1 flex-column-reverse flex-md-row row-cols-md-2 align-items-md-center g-5 py-5">
                    <div class="col d-flex flex-column align-items-start gap-2">
                        <img src="{{ asset('img/landing/hero3.jpg') }}" class="contact-img" alt="">
                    </div>

                    <div class="col">
                        {{-- <div class="row row-cols-1 row-cols-sm-2 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#collection" />
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#gear-fill" />
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#speedometer" />
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#table" />
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>
                        </div> --}}
                        <form action="">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Name :</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Contact --}}

    </main>
    <footer style="background-color: #043442;height: fit-content;margin-top: 300px;padding: 50px 0"
        class="text-white">
        <div class="container d-flex flex-wrap gap-5">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" width="100px" class="mt-4" alt="">
            </div>
            <div class="contact mt-4 ms-md-auto">
                <h4 class="text-white mb-5">Contact Us</h4>
                <p style="color: #cacaca"><i class="bi bi-telephone me-2"></i> Telp : 081123123123 <br>Senin - Minggu
                    <br>24 Jam
                </p>
                <p style="color: #cacaca"><i class="bi bi-geo-alt-fill me-2"></i>Jl. jalan ke Kota Jogja <br>No. 05
                    Dimana-mana hatiku senang
                </p>
                <p style="color: #cacaca"><i class="bi bi-envelope-at-fill me-2"></i>sistysixjourney@gmail.com
                </p>
            </div>
            <div class="pages mt-4 mx-md-4">
                <h4 class="text-white mb-5">Pages</h4>
                <a class="text-decoration-none pages-link d-block mt-2" href="#desc">Description</a>
                <a class="text-decoration-none pages-link d-block mt-2" href="#discover">Discover</a>
                <a class="text-decoration-none pages-link d-block mt-2" href="#exp">Experience</a>
                <a class="text-decoration-none pages-link d-block mt-2" href="#journey-plan">Plan</a>
                <a class="text-decoration-none pages-link d-block mt-2" href="#contact">Contact</a>
            </div>
            <div class="about mt-4">
                <h4 class="text-white mb-5">About</h4>
                <div class="d-flex flex-column" style="max-width: 400px">
                    <p style="color: #cacaca">Welcome to SixtysixJourney, your trusted partner in creating
                        unforgettable travel
                        experiences. We offer personalized itineraries, seamless booking, and 24/7 support to ensure
                        your journey is smooth and memorable. Discover the world with us!</p>
                    <div class="sosial-media d-flex mt-3 gap-3 fs-6">
                        <a href="https://youtube.com" target="blank">
                            <div class="border border-2 rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 35px;height: 35px;">
                                <i class="bi bi-youtube" style="color: #cacaca"></i>
                            </div>
                        </a>
                        <a href="https://instagram.com" target="blank">
                            <div class="border border-2 rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 35px;height: 35px;">
                                <i class="bi bi-instagram" style="color: #cacaca"></i>
                            </div>
                        </a>
                        <a href="https://twitter.com" target="blank">
                            <div class="border border-2 rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 35px;height: 35px;">
                                <i class="bi bi-twitter-x" style="color: #cacaca"></i>
                            </div>
                        </a>
                        <a href="https://tiktok.com" target="blank">
                            <div class="border border-2 rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 35px;height: 35px;">
                                <i class="bi bi-tiktok" style="color: #cacaca"></i>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js\aos.js') }}"></script>

    <script src="{{ asset('js\swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('js\script.js') }}"></script>
</body>

</html>
