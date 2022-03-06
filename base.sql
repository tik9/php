CREATE TABLE todo (
    i_id INT AUTO_INCREMENT,
    title VARCHAR(255),
    content VARCHAR(255),
    PRIMARY KEY(i_id)
);

INSERT INTO todo (title,content) VALUES ("My first important item", 'hooray'), ("2nd todo", 'we need some more eating stuff');


