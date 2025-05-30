DROP TABLE IF EXISTS games;

CREATE TABLE games (
    gameid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    game VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    caption VARCHAR(255) NOT NULL,
    type VARCHAR(100) NOT NULL,
    image VARCHAR(255) NOT NULL,
    username VARCHAR(100) NOT NULL
);

INSERT INTO games (game, description, caption, type, image, username) VALUES
('Call of Honor', 'A first-person shooter game with thrilling missions.', 'Epic shooter adventure', 'Action', 'game1.jpg', 'admin'),
('Fantasy Saga', 'Explore magical lands and mythical creatures.', 'Explore the unknown', 'Fantasy', 'game2.jpg', 's3786488'),
('Puzzle Panic', 'Solve mind-bending puzzles under pressure.', 'Think fast!', 'Puzzle', 'game3.jpg', 'guest');
