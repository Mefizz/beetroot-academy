SET @MIN = (SELECT MIN(id) FROM genre);
SET @MAX = (SELECT MAX(id) FROM genre);
-- rand * (max - min) + min; 
-- UPDATE <table> SET <col> = <value> ; 
UPDATE book SET genre_id = ROUND(rand()* (@MAX -@MIN) +@MIN);