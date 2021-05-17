# star-wars-saga-tool

Epic:
Our client needs a tool to display data from the Star Wars saga.
We can use https://swapi.dev/ to retrieve the initial data, but once it's retrieved we need to store it in our database
to avoid querying the API twice for the same data. (DONE)

Don't pull all the data from the API at once, just retrieve it as it's needed. So our database will act as a cache layer,
it should be queried initially, and only if the data is not present, then query the API. (DONE)

The web application needs to be behind a login screen, only authenticated users can use it. (DONE)

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

1.  As a user, I want to see a page with a full list of Star Wars films, including title and release date, so that I can
    navigate through each film and learn more about them. (DONE)
    
    a. I want to click on a film’s title to go to its own page where I can see all its details. (DONE)
    b. I want to be able to click on a character’s name so that I can visit that character’s own page and learn more about them. (DONE)

2.  As a user, I want to have a page where I can browse all Star Wars characters, and for each, see Name, their Species,
    and the films they are on. Names and films should be clickable so that I can visit their specific pages. (DONE)

3. The system should send an email notification every time a user logs in, the email address should be configurable. (PENDING)

Requirements:

- Symfony 4 (or 5). Done in Symfony 5.2. See composer.json. 
- Twig 3. Done with Twig 3.3.1. See symfony/vendor/twig/twig/src/Environment.php after running `composer install`. 
- MySQL (or MariaDB). Used MySQL 8.0 on Heroku. See symfony/config/packages/doctrine.yaml. 

Deliverables:

- Before start working we need you to provide an estimate for this test to be done. (DONE)
- Provide the ERD. (PENDING)
- Functional web application, deployed in your favorite hosting (if you don't have one, you can use a free one like Heroku). (DONE)
- Git repository
    - Make sure to commit your code as you would do in a regular job, don't just push everything into a single commit. (DONE)
    - Follow Git best practices (Git-flow, or anything similar). (DONE)
    - If you want to create PR's feel free to assign our developers as reviewers. (DONE)

Notes:
- We'll be evaluating your communication skills, ability to understand requirements, and of course the quality
  of your code and solution. Feel free to ask anything, there are no unnecessary questions, so feel free to reach any of our
  developers by email.
