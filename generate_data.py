import json
import random

areas = ["Delhi", "Mumbai", "Bangalore", "Kolkata", "Chennai"]

political_keywords = [
    "government", "elections", "policy", "party", "democracy", "campaign",
    "opposition", "legislation", "candidate", "voters", "rally", "debate",
    "corruption", "scandal", "ineffective", "broken_promises", "gridlock", "controversial",
    "economy", "environment", "education", "healthcare", "security", "immigration",
    "foreign_relations", "taxation", "employment", "poverty", "climate_change",
    "technology", "infrastructure", "social_justice", "equality", "human_rights"
]

comment_templates = [
    "I support the {party} party's stance on {issue}.",
    "The {government} government's {policy} policy needs improvement.",
    "Elections are a crucial part of our {democracy} democracy.",
    "I attended a {party} party {rally} rally yesterday. It was {adjective}!",
    "The {candidate} candidate seems promising for our {area} area.",
    "The {government} government is plagued by {corruption} and {scandal}.",
    "I'm frustrated with the {government} government's {policy} policy.",
    "The {party} party's {candidate} candidate is making {broken_promises}.",
    "The {opposition} opposition is criticizing the {government} government's actions.",
    "The {government} government's {legislation} legislation has caused {controversial} debates.",
    "I have lost faith in the {government} government's ability to address {issue}.",
    "The {government} government's {policy} policy has led to {gridlock} in {area}.",
    "I'm disappointed with the {party} party's {candidate} candidate's performance.",
    "I'm frustrated by the constant {gridlock} in our {government} government.",
    "The {party} party is known for {controversial} decisions and {scandal}.",

    # Negative sentiment templates
    "I strongly oppose the {party} party's {policy} policy.",
    "The {government} government's {policy} policy is a disaster.",
    "Elections have become a battleground for {opposition} and {government} government.",
    "I'm fed up with the {candidate} candidate's empty promises.",
    "The {government} government's {legislation} legislation is a complete failure.",

    # Neutral sentiment templates
    "I'm analyzing the {party} party's {policy} policy from a neutral perspective.",
    "The {candidate} candidate has some interesting ideas.",
    "The {government} government is currently discussing {legislation} legislation.",

    # Positive sentiment templates
    "I appreciate the {party} party's efforts to address {issue}.",
    "The {government} government's {policy} policy has some positive aspects.",
    "I believe in the potential of the {candidate} candidate.",
    "The {party} party is making strides in {area} area.",
]


def generate_random_comment():
    template = random.choice(comment_templates)
    comment = template.format(
        party=random.choice(["BJP", "TMC", "INC", "AAP"]),
        issue=random.choice(political_keywords),
        government=random.choice(["central", "state", "local"]),
        policy=random.choice(["economic", "social", "foreign"]),
        democracy=random.choice(["representative", "direct"]),
        rally=random.choice(["campaign", "election", "supporter"]),
        adjective=random.choice(["exciting", "energetic", "inspiring"]),
        candidate=random.choice(["BJP", "TMC", "INC", "AAP"]),
        area=random.choice(areas),
        corruption=random.choice(["corruption", "bribery"]),
        scandal=random.choice(["scandal", "cover-up"]),
        ineffective=random.choice(["ineffective", "incompetent"]),
        broken_promises=random.choice(
            ["broken promises", "failed commitments"]),
        gridlock=random.choice(["gridlock", "stalemate"]),
        controversial=random.choice(["controversial", "divisive"]),
        opposition=random.choice(["opposition", "opposing parties"]),
        legislation=random.choice(["legislation", "laws"])
    )
    return comment


num_comments = 20

random_comments = []

num_negative_comments = int(num_comments * 0.6)
num_neutral_comments = int(num_comments * 0.2)
num_positive_comments = num_comments - \
    num_negative_comments - num_neutral_comments

for _ in range(num_negative_comments):
    random_comments.append(generate_random_comment())

for _ in range(num_neutral_comments):
    random_comments.append(generate_random_comment())

for _ in range(num_positive_comments):
    random_comments.append(generate_random_comment())

random.shuffle(random_comments)

data_sources = ["Twitter", "Facebook", "Instagram"]


def generate_party_data(num_comments):
    party_data = []
    for _ in range(num_comments):
        comment = random.choice(random_comments)
        area = random.choice(areas)
        source = random.choice(data_sources)

        party_data.append({
            "Comment": comment,
            "Area": area,
            "DataSource": source
        })
    return party_data


def main():
    party_data = generate_party_data(int(input()))
    with open("political_party_data.json", "w") as json_file:
        json.dump(party_data, json_file, indent=4)
    print(party_data)

if __name__ == "__main__":
    main()
