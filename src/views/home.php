<!doctype html><html lang="en"><head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1">    <!-- Bootstrap CSS -->    <link rel="stylesheet" href="../../css/bootstrap.min.css">    <script src="../../js/bootstrap.bundle.min.js"></script>    <title>Home</title>    <link rel="stylesheet" href="../../assets/css/clientSide.css">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body><header class="sticky-top">    <nav class="navbar navbar-expand-lg navbar-dark">        <div class="container-fluid">            <a class="navbar-brand" href="#">Mang Johnny</a>            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"                    aria-label="Toggle navigation">                <span class="navbar-toggler-icon"></span>            </button>            <div class="collapse navbar-collapse" id="navbarNavDropdown">                <ul class="navbar-nav">                    <li class="nav-item">                        <a class="nav-link active" aria-current="page" href="#">Home</a>                    </li>                    <li class="nav-item">                        <a class="nav-link" href="#aboutSection">About Us</a>                    </li>                    <li class="nav-item">                        <a class="nav-link" href="#">Contact Us</a>                    </li>                </ul>            </div>        </div>    </nav></header><section id="hero_section" class="d-flex flex-column text-light justify-content-center">    <div class="p-3 container">        <h1>Mang Johnny Catering</h1>        <p class="col-lg-5">            Delight your guests with the freshest and most flavorful dishes,            expertly prepared for every occasion. Whether it's an intimate gathering or a grand celebration,            Mang Johnny Catering guarantees an unforgettable dining experience.        </p>    </div>    <div class="d-flex gap-3 container">        <button data-bs-toggle="modal" data-bs-target="#LoginModal" class="btn bg-transparent btn-outline-light text-light ">Sign In</button>        <button data-bs-toggle="modal" data-bs-target="#registerModal" class="btn">Sign Up</button>    </div></section><main class="container-fluid p-4">    <h1  class="text-center text-light  p-3 fw-bold">Best Seller of Year</h1>    <div class="container-fluid row gap-3">        <!-- card start -->        <div class="custom-card text-center">            <div class="card-image">                <img src="https://i.pinimg.com/736x/0d/5e/a1/0d5ea194fc3eebea720baf5cf79e3898.jpg" alt="Korean Soy Wings">            </div>            <h5 class="card-title">Korean Soy Wings</h5>            <p class="card-text">                Crispy wings in sweet and savory soy glaze with sesame seeds. Includes: 6 pieces of wings.            </p>            <p class="card-price">₱260.00</p>            <div >                <button class="btn">Buy Now</button>            </div>        </div>        <!-- card End -->        <!-- card start -->        <div class="custom-card text-center">            <div class="card-image">                <img src="https://i.pinimg.com/736x/0d/5e/a1/0d5ea194fc3eebea720baf5cf79e3898.jpg" alt="Korean Soy Wings">            </div>            <h5 class="card-title">Korean Soy Wings</h5>            <p class="card-text">                Crispy wings in sweet and savory soy glaze with sesame seeds. Includes: 6 pieces of wings.            </p>            <p class="card-price">₱260.00</p>            <div >                <button class="btn ">Buy Now</button>            </div>        </div>        <!-- card End -->        <!-- card start -->        <div class="custom-card text-center">            <div class="card-image">                <img src="https://i.pinimg.com/736x/0d/5e/a1/0d5ea194fc3eebea720baf5cf79e3898.jpg" alt="Korean Soy Wings">            </div>            <h5 class="card-title">Korean Soy Wings</h5>            <p class="card-text">                Crispy wings in sweet and savory soy glaze with sesame seeds. Includes: 6 pieces of wings.            </p>            <p class="card-price ">₱260.00</p>            <div >                <button class="btn">Buy Now</button>            </div>        </div>        <!-- card End -->        <!-- card start -->        <div class="custom-card text-center">            <div class="card-image">                <img src="https://i.pinimg.com/736x/0d/5e/a1/0d5ea194fc3eebea720baf5cf79e3898.jpg" alt="Korean Soy Wings">            </div>            <h5 class="card-title">Korean Soy Wings</h5>            <p class="card-text">                Crispy wings in sweet and savory soy glaze with sesame seeds. Includes: 6 pieces of wings.            </p>            <p class="card-price">₱260.00</p>            <div >                <button class="btn">Buy Now</button>            </div>        </div>        <!-- card End -->    </div></main><!-- for about us page --><section id="aboutSection" class="container-fluid text-light d-lg-flex justify-content-between align-items-center p-5">    <img class="img-fluid rounded-3" src="https://i.pinimg.com/736x/0d/5e/a1/0d5ea194fc3eebea720baf5cf79e3898.jpg" alt="Korean Soy Wings">    <div class="d-flex flex-column gap-3 p-2">        <h1><span class="fw-bold" style="font-size: 4rem">About</span> <span >Mang johnny</span></h1>        <p class="col-lg-9">            At Mang Johnny Catering, we believe that food is more than just a meal – it’s an experience that brings people together. Founded with passion and dedication to culinary excellence, we pride ourselves on delivering dishes that are as memorable as the occasions we serve.            Our journey began with a simple yet powerful mission – to craft dishes that tell stories, evoke emotions, and create lasting impressions. Whether it’s an intimate gathering, a corporate event, or a grand celebration, we approach each event with the same level of care and attention to detail.            We source the freshest ingredients and combine them with traditional flavours and innovative techniques. Our chefs are experts in blending tastes that delight the senses, ensuring that every dish is a reflection of quality and authenticity.            At Mang Johnny Catering, we don’t just serve food – we create culinary experiences that reflect the joy of shared moments. Let us take care of your next event, and together, we’ll make it unforgettable.        </p>    </div></section><!-- Footer --><div>    <?php    include '../../includes/footer.php';    include '../../includes/modals/registerModal.php';    include '../../includes/modals/clientLoginModal.php';    ?></div></body></html><script src="../JQUERY/auth.js"></script><script>    window.addEventListener('scroll', function() {        let header = document.querySelector('.sticky-top');        if (window.scrollY > 50) {            header.classList.add('scrolled');        } else {            header.classList.remove('scrolled');        }    });</script>