USE superhero;

SELECT * FROM superhero; -- 756
SELECT * FROM gender;
SELECT * FROM race;

DELIMITER $$
CREATE PROCEDURE spu_superhero_list(IN _publisher_id INT)
BEGIN
	SELECT  
		
		superhero.`id`,
		superhero.`superhero_name`,
		superhero.`full_name`,
		gender.`gender`,
		c1.`colour` 'eye_colour',
		c2.`colour` 'hair_colour',
		c3.`colour` 'skin_colour',
		race.`race`,
		publisher.`publisher_name`,
		alignment.`alignment`,
		superhero.`height_cm`,
		superhero.`weight_kg`
	FROM superhero
		INNER JOIN gender ON gender.`id` = superhero.`gender_id`
		INNER JOIN colour c1 ON c1.`id` = superhero.`eye_colour_id`
		INNER JOIN colour c2 ON c2.`id` = superhero.`hair_colour_id`
		INNER JOIN colour c3 ON c3.`id` = superhero.`skin_colour_id`
		LEFT  JOIN race ON race.`id` = superhero.`race_id`						-- (LEFT JOIN) cuando la clave Foranea es null , y permite la union;
		LEFT  JOIN publisher ON publisher.`id` = superhero.`publisher_id`
		LEFT  JOIN alignment ON alignment.`id` = superhero.`alignment_id`
	WHERE superhero.`publisher_id` = _publisher_id
	ORDER BY superhero.`id`;
END $$

CALL spu_superhero_list(2);

DELIMITER $$
CREATE PROCEDURE spu_publisher_list()
BEGIN
	SELECT * FROM publisher;
END $$

SELECT * FROM alignment;

-- RACE
DELIMITER $$
CREATE PROCEDURE spu_racefiltro_list(IN _race_id INT)
BEGIN
	SELECT  
		
		superhero.`id`,
		superhero.`superhero_name`,
		c1.`colour` 'hair_colour',
		publisher.`publisher_name`,
		superhero.`weight_kg`
		
	FROM superhero
		INNER JOIN colour c1 ON c1.`id` = superhero.`hair_colour_id`
		LEFT  JOIN race ON race.`id` = superhero.`race_id`
		LEFT  JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	WHERE superhero.`race_id` = _race_id
	ORDER BY superhero.`id`;
END $$

CALL spu_racefiltro_list(2);
-- GENDER

DELIMITER $$
CREATE PROCEDURE spu_genderfiltro_list(IN _gender_id INT)
BEGIN
	SELECT  
		
		superhero.`id`,
		superhero.`superhero_name`,
		c1.`colour` 'hair_colour',
		publisher.`publisher_name`,
		superhero.`weight_kg`
		
	FROM superhero
		INNER JOIN colour c1 ON c1.`id` = superhero.`hair_colour_id`
		LEFT  JOIN race ON race.`id` = superhero.`race_id`
		LEFT  JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	WHERE superhero.`gender_id` = _gender_id
	ORDER BY superhero.`id`;
END $$

-- Alignment

DELIMITER $$
CREATE PROCEDURE spu_alignmentfiltro_list(IN _alignment_id INT)
BEGIN
	SELECT  
		
		superhero.`id`,
		superhero.`superhero_name`,
		c1.`colour` 'hair_colour',
		publisher.`publisher_name`,
		superhero.`weight_kg`
		
	FROM superhero
		INNER JOIN colour c1 ON c1.`id` = superhero.`hair_colour_id`
		LEFT  JOIN race ON race.`id` = superhero.`race_id`
		LEFT  JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	WHERE superhero.`alignment_id` = _alignment_id 
END $$
	ORDER BY superhero.`id`;

-- fitro

DELIMITER $$
CREATE PROCEDURE spu_filtro_list
(
IN _race_id INT,
IN _gender_id INT,
IN _alignment_id INT
)
BEGIN
	SELECT  
		
		superhero.`id`,
		superhero.`superhero_name`,
		c1.`colour` 'hair_colour',
		publisher.`publisher_name`,
		superhero.`weight_kg`
		
	FROM superhero
		INNER JOIN colour c1 ON c1.`id` = superhero.`hair_colour_id`
		LEFT  JOIN race ON race.`id` = superhero.`race_id`
		LEFT  JOIN publisher ON publisher.`id` = superhero.`publisher_id`
	WHERE superhero.`race_id` = _race_id AND superhero.`gender_id` = _gender_id AND superhero.`alignment_id` = _alignment_id
	ORDER BY superhero.`id`;
END $$

CALL spu_filtro_list(1,2,1);