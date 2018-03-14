SELECT * FROM exercise_3.movies;
CREATE TABLE `exercise_3`.`movies` (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    actors VARCHAR(30) NOT NULL,
    director VARCHAR(30) NOT NULL,
    producer VARCHAR(30) NOT NULL,
    prodYear YEAR  NOT NULL,
    movieLanguage VARCHAR(30) NOT NULL,
    category ENUM('Thriller', 'Romance', 'Comedy'),
    storyline TEXT NOT NULL,
    video VARCHAR(255) NOT NULL
    )