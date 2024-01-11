<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sentimental Analysis In Social Media</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="/assets/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/assets/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body id="top">

    <main>

        <?php include 'navbar.php' ?>

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-5 col-12 mb-5">
                        <h3 class="text-white">Sentimental Analysis <br> In Social Media</h3>

                        <div class="d-flex align-items-center mt-5">
                            <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read
                                More</a>

                            <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="topics-detail-block bg-white shadow-lg">
                            <img src="./assets/images/topics/topic-image1.jpg" class="topics-detail-block-image img-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </header>


        <section class="topics-detail-section section-padding" id="topics-detail">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 m-auto">
                        <h3 class="mb-4">Sentimental Analysis In Social Media</h3>

                        <p><strong>1. Positive Sentiment:</strong>
                            When the text expresses a favorable or positive opinion or emotion. For example, "I love
                            this new smartphone!"</p>

                        <p><strong>2. Negative Sentiment:</strong>

                            When the text conveys a negative opinion or emotion. For example, "I can't stand this
                            traffic jam!"</p>

                        <p><strong>3. Neutral Sentiment:</strong>

                            When the text is neutral or lacks any discernible sentiment. For example, "The weather is
                            pleasant today."
                        </p>

                        <p><strong>4. Brand Monitoring:</strong>

                            Companies use sentiment analysis to monitor the sentiment surrounding their products or
                            services. By tracking what customers are saying on social media, they can gauge customer
                            satisfaction and make necessary improvements.</p>

                        <div class="row my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <img src="./assets/images/topics/topic-image2.jpg" class="topics-detail-block-image img-fluid">
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                                <img src="./assets/images/topics/topic-image3.png" class="topics-detail-block-image img-fluid">
                            </div>
                        </div>

                        <p><strong>5. Customer Feedback Analysis:</strong>

                            Sentiment analysis helps businesses analyze customer reviews and feedback to understand what
                            aspects of their offerings need improvement.</p>

                        <p><strong>6. Market Research:</strong>

                            It aids in identifying trends, emerging issues, and consumer preferences in real-time,
                            enabling businesses to make data-driven decisions.</p>

                        <p><strong>7. Political Analysis:</strong>

                            Political analysts use sentiment analysis to gauge public sentiment and predict election
                            outcomes based on social media conversations and sentiment trends.</p>
                    </div>

                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>

        <!-- JAVASCRIPT FILES -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/jquery.sticky.js"></script>
        <script src="/assets/js/click-scroll.js"></script>
        <script src="/assets/js/custom.js"></script>

</body>

</html>