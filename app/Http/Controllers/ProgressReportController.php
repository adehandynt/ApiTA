<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProgressReportController extends Controller
{
    public function getProject($projectID, $contractorID)
    {
        return DB::select('SELECT a.*,d.PersonilName,c.BussinessName from projects a
        join project_numbers b on b.ProjectID=a.ProjectID
        join bussinesspartner c on c.id= b.BusinessPartnerID
        join personil d on d.BussinessPartnerID=c.id
        where a.ProjectID="' . $projectID . '" and c.id="' . $contractorID . '"');
    }

    public function getScheduledProgress(Request $request)
    {
        return DB::select('SELECT
        sum( amount ) as ScheduledProgress,
	(
	SELECT
		sum( weight ) 
	FROM
		baseline_wbs 
	WHERE
		parentItem IS NOT NULL 
		AND ProjectID = "' . $request->projectID . '" 
        AND contractorID = "' . $request->contractorID . '" 
        AND ( startDate <= "'. $request->date .'" AND EndDate <= "'. $request->date .'" ) 
	) as ScheduledPercent,
    (
        SELECT
            sum( amount ) 
        FROM
            baseline_wbs 
        WHERE
            parentItem IS NOT NULL 
            AND ProjectID = "' . $request->projectID . '" 
            AND contractorID = "' . $request->contractorID . '" 
        ) as Total_planned_cost
    FROM
        baseline_wbs 
    WHERE
        ProjectID = "' . $request->projectID . '" 
        AND contractorID = "' . $request->contractorID . '" 
        AND ( startDate <= "'. $request->date .'" AND EndDate <= "'. $request->date .'" )');
    }

    public function getActualProgress(Request $request)
    {
        return DB::select('SELECT
        sum( b.weight ) AS All_actual,
        sum(b.amount) AS All_amount,
        (
        SELECT
            sum( b.weight ) 
        FROM
            documents a
            JOIN progress_evaluation b ON b.docID = a.id
            -- JOIN document_detail c ON c.actualWbsID = b.ItemID 
        WHERE
            b.ProjectID = "' . $request->projectID . '" 
            AND b.contractorID = "' . $request->contractorID . '" 
            AND b.docID = "' . $request->docID . '" 
        ) AS ThisMonth 
    FROM
        documents a
        JOIN progress_evaluation b ON b.docID = a.id
        -- JOIN document_detail c ON c.actualWbsID = b.ItemID 
    WHERE
        b.ProjectID = "' . $request->projectID . '" 
        AND b.contractorID ="' . $request->contractorID . '"');
    }

    public function getIssue($projectID){
        return DB::select('SELECT * ,
        round(((select count(id) from issue_management where ProjectID="'.$projectID.'" and priority="high")/(select count(id) from issue_management where ProjectID="'.$projectID.'"))* 100) as high,
        round(((select count(id) from issue_management where ProjectID="'.$projectID.'" and priority="medium")/(select count(id) from issue_management where ProjectID="'.$projectID.'")) * 100) as medium,
        round(((select count(id) from issue_management where ProjectID="'.$projectID.'" and priority="low")/(select count(id) from issue_management where ProjectID="'.$projectID.'"))* 100) as low    
        from issue_management where ProjectID="'.$projectID.'"');
    }

    public function riskReport($projectID ,$contractorID){
        return DB::select('SELECT a.* , 
        
        round((select count(a.id) from risk_management a
        join personil b on b.id = a.PersonilID
        join bussinesspartner c on c.id = b.BussinessPartnerID
        join project_numbers d on d.BusinessPartnerID=c.id
        where d.ProjectID="'.$projectID.'" 
        AND d.BusinessPartnerID="'.$contractorID.'" AND a.Rank like "High%" )/(select count(a.id) from risk_management a
        join personil b on b.id = a.PersonilID
        join bussinesspartner c on c.id = b.BussinessPartnerID
        join project_numbers d on d.BusinessPartnerID=c.id
        where d.ProjectID="'.$projectID.'" 
        AND d.BusinessPartnerID="'.$contractorID.'") * 100) as high,

        round((select count(a.id) from risk_management a
        join personil b on b.id = a.PersonilID
        join bussinesspartner c on c.id = b.BussinessPartnerID
        join project_numbers d on d.BusinessPartnerID=c.id
        where d.ProjectID="'.$projectID.'" 
        AND d.BusinessPartnerID="'.$contractorID.'" AND a.Rank like "Medium%" )/(select count(a.id) from risk_management a
        join personil b on b.id = a.PersonilID
        join bussinesspartner c on c.id = b.BussinessPartnerID
        join project_numbers d on d.BusinessPartnerID=c.id
        where d.ProjectID="'.$projectID.'" 
        AND d.BusinessPartnerID="'.$contractorID.'") * 100) as medium,
        
        round((select count(a.id) from risk_management a
        join personil b on b.id = a.PersonilID
        join bussinesspartner c on c.id = b.BussinessPartnerID
        join project_numbers d on d.BusinessPartnerID=c.id
        where d.ProjectID="'.$projectID.'" 
        AND d.BusinessPartnerID="'.$contractorID.'" AND a.Rank like "Low%" )/(select count(a.id) from risk_management a
        join personil b on b.id = a.PersonilID
        join bussinesspartner c on c.id = b.BussinessPartnerID
        join project_numbers d on d.BusinessPartnerID=c.id
        where d.ProjectID="'.$projectID.'" 
        AND d.BusinessPartnerID="'.$contractorID.'") * 100) as low
        
        from risk_management a
        join personil b on b.id = a.PersonilID
        join bussinesspartner c on c.id = b.BussinessPartnerID
        join project_numbers d on d.BusinessPartnerID=c.id
        where d.ProjectID="'.$projectID.'" 
        AND d.BusinessPartnerID="'.$contractorID.'"');
    }

    public function getProgressCurve($projectid,$contractorid){
        return  DB::select("SELECT
        a.* 
    FROM
        (
        SELECT
            MONTHNAME( StartDate ) AS x,
            SUM( amount ) AS baseline,
            MONTH ( StartDate ) AS month_num 
        FROM
            baseline_wbs 
        WHERE
            amount IS NOT NULL 
            AND ProjectID = '".$projectid."'
            AND contractorID = '".$contractorid."'
        GROUP BY
            MONTHNAME( StartDate ) UNION
        SELECT
            MONTHNAME( endDate ) AS x,
            SUM( amount ) AS baseline,
            MONTH ( endDate ) AS month_num 
        FROM
            baseline_wbs 
        WHERE
            amount IS NOT NULL 
            AND ProjectID = '".$projectid."'
            AND contractorID = '".$contractorid."'
        GROUP BY
            MONTHNAME( endDate ) 
        ) a 
    GROUP BY
        a.x 
    ORDER BY
        month_num");
    }
    
}
