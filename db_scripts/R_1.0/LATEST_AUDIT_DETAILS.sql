CREATE VIEW LATEST_AUDIT_DETAILS
AS (
	SELECT 
		acc.accessid,
		MAX(month) latest_audit_month,
		year latest_audit_year
	FROM
		access_details acc
		LEFT OUTER JOIN
		audit_details aud
		ON
		acc.accessid = aud.accessid
	WHERE
		year = (SELECT acc_aud_max_year_vw.max_year from
					 acc_aud_max_year_vw
				WHERE acc_aud_max_year_vw.accessid = acc.accessid
				)
	GROUP BY
			acc.accessid
)
