<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - FashionHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/templatemo-fashionhub.css">
</head>
<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/">Home</a></li>
                            <li class="scroll-to-section"><a href="/#men">Men's</a></li>
                            <li class="scroll-to-section"><a href="/#women">Women's</a></li>
                            <li class="scroll-to-section"><a href="/#kids">Kid's</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </li>
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

    <!-- ***** Page Heading Start ***** -->
    <div class="page-heading contact-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Page Heading End ***** -->

    <!-- ***** Contact Area Start ***** -->
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="contact-form">
                        <h3>Get In Touch</h3>
                        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>

                        @if($message = Session::get('success'))
                            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                                {{ $message }}
                            </div>
                        @endif

                        @if($message = Session::get('error'))
                            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                                {{ $message }}
                            </div>
                        @endif

                        <form id="contact" action="{{ route('contact.send') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="text" name="name" id="name" placeholder="Your Name *" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="email" name="email" id="email" placeholder="Your Email *" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="text" name="subject" id="subject" placeholder="Subject *" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" id="message" placeholder="Your Message *" required=""></textarea>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="submit-button">Send Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area End ***** -->

    <!-- ***** Info Section Start ***** -->
    <div class="info-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="info-box">
                        <h4><i class="fa fa-map-marker"></i> Address</h4>
                        <p>Royal Mor, Khulna<br>Bangladesh</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <h4><i class="fa fa-phone"></i> Phone</h4>
                        <p>+880 1740456966</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <h4><i class="fa fa-envelope"></i> Email</h4>
                        <p>shakilmsapro@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Info Section End ***** -->

<style>
/* Contact Page Styling */
.contact-page-heading {
    padding: 60px 0;
    background-color: #f8f9fa !important;
    background-image: none !important;
    margin-top: 0 !important;
}

.contact-page-heading .inner-content h2 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 10px;
}

.contact-section {
    padding: 80px 0;
    background-color: white;
}

.contact-form {
    background-color: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.contact-form h3 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 15px;
}

.contact-form p {
    color: #666;
    margin-bottom: 30px;
    font-size: 1rem;
}

.contact-form fieldset {
    margin-bottom: 20px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 0.95rem;
    font-family: 'Poppins', sans-serif;
}

.contact-form input:focus,
.contact-form textarea:focus {
    outline: none;
    border-color: #333;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

.contact-form textarea {
    resize: vertical;
    min-height: 150px;
}

.contact-form .submit-button {
    background-color: #333;
    color: white;
    padding: 12px 40px;
    border: none;
    border-radius: 5px;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

.contact-form .submit-button:hover {
    background-color: #555;
}

/* Info Section */
.info-section {
    padding: 80px 0;
    background-color: #f8f9fa;
}

.info-box {
    text-align: center;
    padding: 30px 20px;
}

.info-box h4 {
    font-size: 1.3rem;
    color: #333;
    margin-bottom: 15px;
}

.info-box i {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 15px;
    display: block;
}

.info-box p {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .contact-form {
        padding: 30px 20px;
    }

    .contact-form h3 {
        font-size: 1.5rem;
    }

    .contact-page-heading .inner-content h2 {
        font-size: 1.8rem;
    }
}
</style>

<script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
