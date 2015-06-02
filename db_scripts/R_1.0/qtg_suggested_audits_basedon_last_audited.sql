SELECT
	acc.*,
	IFNULL(lad.latest_audit_month, '0') last_audit_month,
	IFNULL(lad.latest_audit_year, '1999') last_audit_year
FROM
	access_details acc
	LEFT OUTER JOIN
	LATEST_AUDIT_DETAILS lad
	ON
	acc.accessid = lad.accessid
ORDER BY
	last_audit_year, last_audit_month
LIMIT 0,20