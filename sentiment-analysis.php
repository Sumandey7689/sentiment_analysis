<?php
session_start();
$profileUsername = $_SESSION['loginUsername'];
if (!isset($_SESSION['loginUsername']) && empty($_SESSION['loginUsername'])) {
    header('location: index.php');
}
?>
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
                        <h3 class="text-white">Sentimental Analysis</h3>

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

        <!-- Graph Plotting Analysis -->

        <section id="topics-detail">
            <div class="container">
                <div class="col-12 text-center m-5">
                    <h2 class="mb-4">Sentiment Analysis</h1>
                </div>
                <div class="row tm-content-row">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                        <div class="tm-bg-primary-dark tm-block">
                            <h2 class="tm-block-title chart-text-color">Social Media Sentiment Trends</h2>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                        <div class="tm-bg-primary-dark tm-block">
                            <h2 class="tm-block-title chart-text-color">Sentiment Performance Analysis</h2>
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                        <div class="tm-bg-primary-dark tm-block tm-block-taller">
                            <h2 class="tm-block-title chart-text-color">Social Media Sentiment Storage</h2>
                            <div id="pieChartContainer">
                                <canvas id="pieChart" class="chartjs-render-monitor" width="200" height="200"></canvas>
                            </div>
                        </div>
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
        <script src="/assets/js/Chart.min.js"></script>

        <script>
            var SearchUsername = <?php echo json_encode($profileUsername); ?>;
            if (localStorage.getItem("SearchUsername")) {
                localStorage.removeItem("SearchUsername");
                localStorage.setItem("SearchUsername", SearchUsername);
            } else {
                localStorage.setItem("SearchUsername", SearchUsername);
            }

            Chart.defaults.global.defaultFontColor = 'white';
            let ctxLine,
                ctxBar,
                ctxPie,
                optionsLine,
                optionsBar,
                optionsPie,
                configLine,
                configBar,
                configPie,
                lineChart;
            barChart, pieChart;

            $(function() {
                drawLineChart();
                drawBarChart();
                drawPieChart();

                $(window).resize(function() {
                    updateLineChart();
                    updateBarChart();
                });
            });
        </script>

        <script src="/assets/js/tooplate-scripts.js"></script>
</body>

</html>