CREATE TABLE todo (
    id INT(3) AUTO_INCREMENT,
    title VARCHAR(255),
    content VARCHAR(255),
    PRIMARY KEY(id)
);

INSERT INTO todo (title,content) VALUES ("My first important item", 'hooray'), ("second todo", 'we need some more eating stuff');


