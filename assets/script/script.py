from textblob import TextBlob
from spellchecker import SpellChecker
import sys

spell = SpellChecker()
target_words = ["kill", "suicide"]


def analyze_sentiment(text, target_words):
    corrected_text = ' ' . join([spell.correction(word) for word in text.split()])

    analysis = TextBlob(corrected_text.lower())
    for target_word in target_words:
        if target_word.lower() in analysis.words:
            return -1.0

    return analysis.sentiment.polarity


text = sys.argv[1]
sentiment_score = analyze_sentiment(text, target_words)
print(sentiment_score)
