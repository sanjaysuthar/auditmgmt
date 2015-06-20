----------------------------------------------------------------------
-- Query to Get Auto Suggestion of Team Members
-- @author: Sanjay Suthar
-- @date: 20-Jun-2015
-- @ver: 2.0
-- @email: ss2445@gmail.com
----------------------------------------------------------------------
SELECT 
	acc_aud_perc.uniqueid, 
	acc_aud_perc.name, 
	acc_aud_perc.total_access, 
	acc_aud_perc.audited_before,
    ROUND((audited_before*100)/total_access) as AccessDetail__auditPerc
FROM(
		SELECT 
			acc.uniqueid as uniqueid,
			CONCAT(acc.fname, ' ', acc.lname) as name
			count(*) as total_access,
			SUM(IFNULL(aud.audited_before,0)) as audited_before
		FROM 
			access_details acc
			LEFT JOIN(
						SELECT 
							access_detail_id, 
							1 as audited_before
						FROM
							audit_details
						WHERE
							(year <> 2015 OR month <> 5)	--Current_Month, Current_Year
						GROUP BY access_detail_id
					) aud
			ON acc.accessid = aud.access_detail_id
		WHERE
			team = 'Lara Cargo' AND status = '1'		--User_Team, Activated_User_Status
		GROUP BY uniqueid
	) acc_aud_perc
ORDER BY AccessDetail__auditPerc
LIMIT 7	--Limit_Calculate_From_Below_Query

----------------------------------------------------------------------
-- Query To Calculate Limit for Auto Suggestion of Team Members
-- @author: Sanjay Suthar
----------------------------------------------------------------------

SELECT 
	ROUND(
			(SELECT 
				count(*) 
			FROM(
					SELECT 
						uniqueid 
					FROM 
						access_details 
					WHERE 
						team = 'Lara Cargo' and status = 1 
					GROUP BY uniqueid
				)derived
			) * .1
		) AS Percentage 
FROM dual