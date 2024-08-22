-- 1.
SELECT   BillingCountry AS "Pays",
         ROUND(AVG(Total), 2) AS "Total moyen"
FROM     Invoice
GROUP BY BillingCountry;

-- 2.
SELECT   Country AS "Pays",
         COUNT(*) AS "Employé·es"
FROM     Employee
GROUP BY Country;

-- 3.
SELECT E.FirstName || ' ' || E.LastName AS "Employé·es",
       M.FirstName || ' ' || M.LastName AS "Superviseur·es"
FROM   Employee E, Employee M
WHERE  E.ReportsTo = M.EmployeeId;

-- 4.
SELECT Track.Name  AS "Titre",
       Album.Title AS "Album",
       Artist.Name AS "Artiste"
FROM   Artist, Album, Track
WHERE  Artist.ArtistId = Album.ArtistId
       AND Album.AlbumId = Track.AlbumId;

-- 5.
SELECT T.Name AS "Titre"
FROM   Track T, PlaylistTrack PT, Playlist P
WHERE  T.TrackId = PT.TrackId
       AND PT.PlaylistId = P.PlaylistId
       AND P.Name = 'TV Shows';

-- 6.
SELECT   T.Name AS "Titre",
         COUNT(*) AS "# d'inclusions"
FROM     Track T, PlaylistTrack PT, Playlist P
WHERE    T.TrackId = PT.TrackId
         AND PT.PlaylistId = P.PlaylistId
GROUP BY T.Name
HAVING   COUNT(*) > 1;

-- 7.
SELECT T.Name AS "Titre"
FROM   Track T, PlaylistTrack PT, Playlist P
WHERE  T.TrackId = PT.TrackId
       AND PT.PlaylistId = P.PlaylistId
       AND (P.Name = 'Classical' OR P.Name = 'Classical 101 - The Basics')
GROUP BY T.Name
HAVING COUNT(*) > 1;

-- 8.
SELECT   G.Name AS "Genre", 
         AVG(T.Milliseconds) AS "Durée moyenne (ms)"
FROM     Track T, Genre G
WHERE    T.GenreId = G.GenreId
GROUP BY G.Name;
