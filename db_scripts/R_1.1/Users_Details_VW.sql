CREATE VIEW USER_DETAILS_VW
AS(
	SELECT 
		uniqueid, fname, lname, count(*) as accesscount, team
	FROM 
		access_details 
	GROUP BY 
		uniqueid 
	ORDER BY 
		uniqueid
)