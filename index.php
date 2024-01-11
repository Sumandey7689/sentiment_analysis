<?php
session_start();
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["sentiment-text"])) {
        if (isset($_SESSION['loginUsername']) && !empty($_SESSION['loginUsername'])) {

            $username = $_SESSION['loginUsername'];
            $text = $_POST["sentiment-text"];
            $text = escapeshellarg($text);

            $command = "python E:\\Hackathon\\assets\\script\\script.py $text";
            $sentiment_score = shell_exec($command);

            if ($sentiment_score !== null) {
                $sentiment_score = floatval($sentiment_score);
                $sentiment = "Neutral";

                if ($sentiment_score > 0.1) {
                    $sentiment = "Positive";
                } elseif ($sentiment_score < -0.1) {
                    $sentiment = "Negative";
                }

                if ($sentiment == "Positive") {
                    $sql = "INSERT INTO $db.`tbl_analysis_data`(`value`, `username`) VALUES('1', '$username');";
                    if ($conn->query($sql) === TRUE) {
                        $popup = true;
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else if ($sentiment == "Neutral") {
                    $sql = "INSERT INTO $db.`tbl_analysis_data`(`value`, `username`) VALUES('0', '$username');";
                    if ($conn->query($sql) === TRUE) {
                        $popup = true;
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    $sql = "INSERT INTO $db.`tbl_analysis_data`(`value`, `username`) VALUES('-1', '$username');";
                    if ($conn->query($sql) === TRUE) {
                        $popup = 1;
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        } else {
            $popup = 2;
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sentiment analysis of Social Media presence</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="/assets/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/assets/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <style>
        .modal-content {
            border-radius: 10px;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        #startButton {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: 3px 10px 0 0;
            background-color: #ced7e6;
            color: white;
            font-size: 30px;
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>


</head>

<body id="top">

    <main>

        <!-- Navbar -->
        <?php include 'navbar.php' ?>

        <!-- Hero Section -->
        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 mx-auto">
                        <h1 class="text-white text-center">Empower. Analyze. Thrive.</h1>

                        <h6 class="text-center">A platform for sentiment analysis</h6>

                        <form method="post" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1"></span>

                                <input name="sentiment-text" type="search" class="form-control" id="keyword" placeholder="Explore social media sentiments..." aria-label="Search">

                                <div id="startButton"><i class="fa fa-microphone" style="color: red;"></i></div>
                                <button type="submit" class="form-control">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Section -->
        <section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="#">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-2">Social Media Analysis</h5>

                                        <p class="mb-0">Unlock valuable insights from social media sentiments with our
                                            platform.</p>
                                    </div>
                                </div>

                                <img src="/assets/images/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-block custom-block-overlay">
                            <div class="d-flex flex-column h-100">
                                <img src="/assets/images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

                                <div class="custom-block-overlay-text d-flex">
                                    <div>
                                        <h5 class="text-white mb-2">Data-Driven Insights</h5>

                                        <p class="text-white">Harness the power of sentiment analysis for data-driven
                                            decision-making.</p>

                                        <a href="#" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                    </div>
                                </div>

                                <div class="social-share d-flex">
                                    <p class="text-white me-4">Share:</p>

                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-facebook"></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="section-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Topic Section -->
        <section class="explore-section section-padding" id="section_2">
            <div class="col-12 text-center">
                <h2 class="mb-4">Browse Topics</h1>
            </div>

            </div>
            </div>

            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design1-tab-pane" type="button" role="tab" aria-controls="design1-tab-pane" aria-selected="true">Sentiment Analysis</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#design2-tab-pane" type="button" role="tab" aria-controls="design2-tab-pane" aria-selected="false">Marketing</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#design3-tab-pane" type="button" role="tab" aria-controls="design3-tab-pane" aria-selected="false">Finance</button>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="design1-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="/topics-detail-2.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Sentiment Analysis Tools</h5>

                                                            <p class="mb-0">Explore tools and techniques for sentiment
                                                                analysis.</p>
                                                        </div>


                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-tools.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="/topics-detail-4.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Sentiment Analysis Techniques</h5>

                                                            <p class="mb-0">Learn about various techniques for sentiment
                                                                analysis.</p>
                                                        </div>


                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-techniques.png" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="/topic-detail-1.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Sentiment Analysis in Social Media</h5>

                                                            <p class="mb-0">Explore the impact of sentiment analysis in
                                                                social media.</p>
                                                        </div>
                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-social-techniques.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="design2-tab-pane" role="tabpanel" aria-labelledby="marketing-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="/topics-detail-3.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Sentiment Analysis in Advertising</h5>

                                                            <p class="mb-0">Explore how sentiment analysis impacts
                                                                advertising strategies.</p>
                                                        </div>

                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-advertising.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Sentiment Analysis in Video Content</h5>

                                                            <p class="mb-0">Discover how sentiment analysis enhances
                                                                video content strategies.</p>
                                                        </div>
                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-video-content.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Analyzing Viral Tweets</h5>

                                                            <p class="mb-0">Learn how sentiment analysis can analyze
                                                                viral tweets for insights.</p>
                                                        </div>
                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-viral-tweets.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="design3-tab-pane" role="tabpanel" aria-labelledby="design3-tab-pane" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Sentiment Analysis in Graduation</h5>

                                                            <p class="mb-0">Explore how sentiment analysis can play a
                                                                role in graduation and academia.</p>
                                                        </div>
                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-graduation.png" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Sentiment Analysis for Educators</h5>

                                                            <p class="mb-0">Discover how educators can leverage
                                                                sentiment analysis for better teaching.</p>
                                                        </div>
                                                    </div>

                                                    <img src="/assets/images/topics/sentiment-analysis-educators.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Working Section -->
        <section class="timeline-section section-padding" id="section_3">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">How does Sentiment Analysis work?</h2>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Analyze Social Media Content</h4>

                                    <p class="text-white">Sentiment Analysis starts by collecting and analyzing social
                                        media
                                        content, such as posts, comments, and interactions.</p>

                                    <div class="icon-holder">
                                        <i class="bi-search"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Determine Sentiment</h4>

                                    <p class="text-white">The system then determines the sentiment or emotional tone
                                        expressed in
                                        the text, classifying it as positive, negative, or neutral.</p>

                                    <div class="icon-holder">
                                        <i class="bi-bookmark"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Gain Insights and Take Action</h4>

                                    <p class="text-white">By analyzing sentiments, individuals and organizations can
                                        gain valuable
                                        insights into public perception and take appropriate actions to maintain or
                                        enhance their
                                        online presence.</p>

                                    <div class="icon-holder">
                                        <i class="bi-book"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-5">
                        <p class="text-white">
                            Want to learn more about Sentiment Analysis?
                            <a href="#" class="btn custom-btn custom-border-btn ms-3">Check out Youtube</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section section-padding" id="section_4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Frequently Asked Questions</h2>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-5 col-12">
                        <img src="/assets/images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                    </div>

                    <div class="col-lg-6 col-12 m-auto">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is Sentiment Analysis?
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Sentiment Analysis is the process of automatically determining the sentiment or
                                        emotional tone expressed in text or speech. It helps to understand whether the
                                        text conveys a positive, negative, or neutral sentiment.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How is Sentiment Analysis applied?
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Sentiment Analysis is applied in various fields, including social media
                                        monitoring, customer feedback analysis, brand reputation management, and market
                                        research. It helps organizations gauge public perception and make informed
                                        decisions.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can Sentiment Analysis be customized?
                                    </button>
                                </h2>

                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes, Sentiment Analysis can be customized to fit specific requirements.
                                        Organizations can tailor sentiment classification models to their industry or
                                        domain to improve accuracy.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php' ?>

    <!-- JAVASCRIPT FILES -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>
    <script src="/assets/js/click-scroll.js"></script>
    <script src="/assets/js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php
        if ($popup == 1) { ?>
            var sentiment = <?php echo json_encode($sentiment); ?>;
            var iconHtml = '';

            if (sentiment === 'Positive') {
                iconHtml = '😃';
            } else if (sentiment === 'Negative') {
                iconHtml = '😞';
            } else {
                iconHtml = '😐';
            }

            Swal.fire({
                title: 'Sentiment Analysis Result',
                text: 'Sentiment: ' + sentiment,
                icon: 'info',
                iconHtml: iconHtml,
                confirmButtonText: 'OK'
            });
        <?php } else if ($popup == 2) { ?>
            Swal.fire({
                title: 'Not Authorized',
                text: 'You do not have permission to access this resource.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        <?php } ?>
    </script>

    <script>
        const startButton = document.getElementById("startButton");
        const keywordInput = document.getElementById("keyword");

        const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
        recognition.lang = 'en-US';

        recognition.onresult = function(event) {
            const result = event.results[0][0].transcript;
            keywordInput.value = result;
        };

        recognition.onend = function() {
            startButton.disabled = false;
            startButton.innerHTML = '<i class="fa fa-microphone" style="color: red;"></i>';
        };

        startButton.addEventListener("click", function() {
            recognition.start();
            startButton.disabled = true;
            startButton.innerHTML = '<i class="fa-solid fa-microphone-lines" style="color: red;"></i>';
            keywordInput.value = "";
        });
    </script>

</body>

</html>