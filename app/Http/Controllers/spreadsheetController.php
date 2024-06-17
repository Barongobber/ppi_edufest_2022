<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class spreadsheetController extends Controller
{
    public function getServiceGoogleSheet() {
        // Initialize Google Sheets API client
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets and PHP');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig(__DIR__ . '/../../../credentials.json');
        return new \Google_Service_Sheets($client);
    }

    public function read($id) {
        $report = Report::findOrFail($id);
        
        list($spreadsheetIds, $ranges) = $this->extractUrlsAndRanges($report);

        $registrants = $this->getListRegistrants($spreadsheetIds, $ranges);
        $attendances = $this->getListOfAttendance($report->url_attendance, $report->range_attendance);

        list($eligibleNames, $eligibleEmails, $nonEligibleNames, $nonEligibleEmails) = $this->compareAttendances($attendances, $registrants);

        return [
            "email" => $eligibleEmails,
            "name" => $eligibleNames,
            "nonEligibleEmail" => $nonEligibleEmails,
            "nonEligibleName" => $nonEligibleNames,
            "totalRegistrants" => count($registrants),
            "totalAttendances" => count($attendances['emailAttendances'])
        ];
    }

    private function extractUrlsAndRanges($report) {
        $urlsRegistrant = explode(",", $report->urls_registrant);
        $rangesRegistrant = explode(",", $report->ranges_registrant);

        if (count($urlsRegistrant) !== count($rangesRegistrant)) {
            abort(500, "Please enter an equal number of URL IDs and ranges for registrants");
        }

        return [$urlsRegistrant, $rangesRegistrant];
    }

    private function getListRegistrants($urls, $ranges) {
        $service = $this->getServiceGoogleSheet();
        $emailRegistrant = [];

        foreach ($urls as $index => $url) {
            $range = "Form Responses 1!" . $ranges[$index];
            $registrantsValues = $service->spreadsheets_values->get($url, $range);
            $registrantList = $registrantsValues->getValues();

            foreach ($registrantList as $row) {
                $emailRegistrant[] = $row[0];  // Assumes email is in the first column
            }
        }

        return $emailRegistrant;
    }

    private function getListOfAttendance($url, $range) {
        $service = $this->getServiceGoogleSheet();
        $attendancesValues = $service->spreadsheets_values->get($url, "Form responses!" . $range);
        $attendancesList = $attendancesValues->getValues();

        $emailAttendances = [];
        $nameAttendances = [];

        foreach ($attendancesList as $row) {
            $emailAttendances[] = $row[0];  // Assumes email is in the first column
            $nameAttendances[] = $row[1];  // Assumes name is in the second column
        }

        return [
            "emailAttendances" => $emailAttendances,
            "nameAttendances" => $nameAttendances
        ];
    }

    private function compareAttendances($attendances, $registrants) {
        $emailAttendances = $attendances['emailAttendances'];
        $nameAttendances = $attendances['nameAttendances'];

        $comparison = array_diff($emailAttendances, $registrants);
        $resultEmail = array_diff($emailAttendances, $comparison);

        $nonEligibleNames = [];
        $nonEligibleEmails = [];
        foreach ($comparison as $index => $email) {
            $nonEligibleNames[] = $nameAttendances[$index];
            $nonEligibleEmails[] = $email;
        }

        $eligibleNames = [];
        $eligibleEmails = [];
        foreach ($resultEmail as $index => $email) {
            $eligibleNames[] = $nameAttendances[$index];
            $eligibleEmails[] = $email;
        }

        return [$eligibleNames, $eligibleEmails, $nonEligibleNames, $nonEligibleEmails];
    }
}
