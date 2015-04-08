CREATE VIEW ACC_AUD_MAX_YEAR_VW
AS(
	SELECT
		acc.accessid,
		MAX(year) max_year
	FROM
		access_details acc
		LEFT OUTER JOIN
		audit_details aud
		ON
		acc.accessid = aud.accessid
	GROUP BY
		acc.accessid
)