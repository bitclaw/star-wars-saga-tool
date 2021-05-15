# star-wars-saga-tool

Epic:
Our client needs a tool to display data from the Star Wars saga.
We can use https://swapi.dev/ to retrieve the initial data, but once it's retrieved we need to store it in our database
to avoid querying the API twice for the same data.

Don't pull all the data from the API at once, just retrieve it as it's needed. So our database will act as a cache layer, it should be queried initially, and only if the data is not present, then query the API.

The web application needs to be behind a login screen, only authenticated users can use it.

Data we need:
- Film
    - characters
    - director
    - release date
    - title

- Character:
- name
- gender
- species
- films

User stories:

1.  As a user, I want to see a page with a full list of Star Wars films, including title and release date, so that I can navigate through each film and learn more about them.
    a. I want to click on a film’s title to go to its own page where I can see all its details.
    b. I want to be able to click on a character’s name so that I can visit that character’s own page and learn more about them.

2.  As a user, I want to have a page where I can browse all Star Wars characters, and for each, see Name, their Species, and the films they are on. Names and films should be clickable so that I can visit their specific pages.

3. The system should send an email notification every time a user logs in, the email address should be configurable.

Requirements:

- Symfony 4 (or 5)
- Twig 3
- MySQL (or MariaDB)

Deliverables:

- Before start working we need you to provide an estimate for this test to be done.
- Provide the ERD
- Functional web application, deployed in your favorite hosting (if you don't have one, you can use a free one like Heroku).
- Git repository
    - Make sure to commit your code as you would do in a regular job, don't just push everything into a single commit.
    - Follow Git best practices (Git-flow, or anything similar)
    - If you want to create PR's feel free to assign our developers as reviewers.

Notes:
- We'll be evaluating your communication skills, ability to understand requirements, and of course the quality
  of your code and solution. Feel free to ask anything, there are no unnecessary questions, so feel free to reach any of our
  developers by email.
