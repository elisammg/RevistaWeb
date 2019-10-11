(SELECT users.username, posts.body, posts.created_at, posts.updated_at FROM mydb.posts INNER JOIN mydb.users ON posts.user_id = users.id);
(SELECT post_topic.post_id, topics.name FROM mydb.post_topic INNER JOIN mydb.topics ON post_topic.topic_id = topics.id);

SELECT users.username, subtopic.nombre, posts.body, posts.created_at, posts.updated_at FROM mydb.posts 
INNER JOIN mydb.users 
ON posts.user_id = users.id
JOIN mydb.subtopic
ON posts.id_subtopic = subtopic.id;





