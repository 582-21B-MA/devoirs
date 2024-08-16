-- 1.
SELECT AVG(age) AS "Moyenne d'âge"
FROM Sailors;

-- 2.
SELECT MAX(rating) AS "Cote maximum", age AS "Âge"
FROM Sailors
GROUP BY age;

-- 3.
SELECT DISTINCT day AS "Jour"
FROM Reserves;

-- 4.
SELECT COUNT(*) AS "Nombre de bateaux"
FROM Boats;

-- 5.
SELECT AVG(age) AS "Âge moyen", rating AS "Cote"
FROM Sailors
WHERE age > 30
GROUP BY rating;

-- 6.
SELECT COUNT(DISTINCT color) AS "Nombre de couleurs"
FROM Boats;

-- 7.
SELECT COUNT(*) AS "Nombre de réservation", bid AS "Bateau"
FROM Reserves
GROUP BY bid;

-- 8.
SELECT day AS "Jour", COUNT(*) AS "Nombre de réservation"
FROM Reserves
GROUP BY day
HAVING COUNT(*) > 1;
