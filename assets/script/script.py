from textblob import TextBlob

import sys

target_words = ["kill", "suicide"]


def analyze_sentiment(text, target_words):
    corrected_text = text

    analysis = TextBlob(corrected_text.lower())
    for target_word in target_words:
        if target_word.lower() in analysis.words:
            return -1.0

    return analysis.sentiment.polarity


text = sys.argv[1]
sentiment_score = analyze_sentiment(text, target_words)
print(sentiment_score)
