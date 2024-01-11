<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sentimental Analysis Techniques</title>

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
                        <h3 class="text-white">Sentimental Analysis <br> Techniques</h3>

                        <div class="d-flex align-items-center mt-5">
                            <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read
                                More</a>

                            <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="topics-detail-block bg-white shadow-lg">
                            <img src="./assets/images/topics/sentiment-analysis-techniques.png" class="topics-detail-block-image img-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </header>


        <section class="topics-detail-section section-padding" id="topics-detail">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 m-auto">
                        <h3 class="mb-4">Sentimental Analysis Techniques</h3>

                        <p><strong>1. Text Preprocessing:</strong>
                            Before sentiment analysis can begin, text data needs to be preprocessed. This involves tasks like tokenization (splitting text into words or phrases), removing punctuation and special characters, converting text to lowercase, and handling stop words (common words like "and," "the," "is" that don't carry sentiment).</p>

                        <p><strong>2. Lexicon-Based Approaches:</strong>

                            Lexicon-based sentiment analysis relies on predefined sentiment lexicons or dictionaries that contain lists of words with associated sentiment scores (e.g., positive, negative, neutral). Sentiment scores can be assigned based on the polarity of words. For example, "happy" might have a positive score, while "sad" might have a negative score. The overall sentiment of a text is calculated by aggregating the sentiment scores of individual words.</p>

                        <p><strong>3. Machine Learning-Based Approaches:</strong>

                            Machine learning techniques are commonly used for sentiment analysis. These approaches involve training a model on labeled data, where the sentiment of each text is known. Common machine learning algorithms for sentiment analysis include:
                        </p>

                        <p><strong>4. Aspect-Based Sentiment Analysis:</strong>

                            This technique goes beyond classifying overall sentiment and breaks down sentiment by specific aspects or topics within a text. For example, in a product review, you might want to know the sentiment about the product's performance, design, and customer service separately.</p>

                        <div class="row my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <img src="./assets/images/topics/topic-image8.png" class="topics-detail-block-image img-fluid">
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                                <img src="./assets/images/topics/topic-image9.png" class="topics-detail-block-image img-fluid">
                            </div>
                        </div>

                        <p><strong>5. Sentiment Intensity Analysis:</strong>

                            Not all sentiments are equal in intensity. Some expressions may carry strong sentiment, while others may be more subtle. Sentiment intensity analysis aims to quantify the strength of sentiment in a text.</p>

                        <p><strong>6. Handling Negation and Context:</strong>

                            Understanding negation is crucial in sentiment analysis. For example, "not good" has a negative sentiment, even though the word "good" is present. Contextual analysis helps in capturing such nuances.</p>

                        <p><strong>7. Evaluation and Validation:</strong>

                            Assessing the performance of sentiment analysis models is essential. Common evaluation metrics include accuracy, precision, recall, F1-score, and ROC-AUC, depending on the specific problem and dataset.</p>
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