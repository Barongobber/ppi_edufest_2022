<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{

    public function read() {
        $reports = Report::all();
        return $reports;
    }

    public function readDetail($id) {
        $report = Report::where('id', $id)->first();
        $data = [$report];
        return $data;
    }

    public function insert() {
        request()->validate([
            'title' => ['required', 'string'],
            'urls_registrant' => ['required', 'string'],
            'ranges_registrant' => ['required', 'string'],
            'url_attendance' => ['required', 'string'],
            'range_attendance' => ['required', 'string'],
            'event_id' => ['required', 'integer']
        ]);

        $check = Report::where('title', request('title'))->first();
        if ($check)
            abort(400, 'Sorry, cannot insert the same report\'s title as the existing one');

        $reportData = [
            'title' => request('title'),
            'urls_registrant' => request('urls_registrant'),
            'ranges_registrant' => request('ranges_registrant'),
            'url_attendance' => request('url_attendance'),
            'range_attendance' => request('range_attendance'),
            'event_id' => request('event_id')
        ];

        $report = Report::create($reportData);

        return $report;
    }

    public function update($id) {
        request()->validate([
            'title' => [
                'required', 
                'string',
                Rule::unique('reports')->ignore($id)
            ],
            'urls_registrant' => ['required', 'string'],
            'ranges_registrant' => ['required', 'string'],
            'url_attendance' => ['required', 'string'],
            'range_attendance' => ['required', 'string'],
            'event_id' => ['required', 'integer']
        ]);

        $report = Report::where('id', $id)->first();

        $reportData = [
            'title' => request('title'),
            'urls_registrant' => request('urls_registrant'),
            'ranges_registrant' => request('ranges_registrant'),
            'url_attendance' => request('url_attendance'),
            'range_attendance' => request('range_attendance'),
            'event_id' => request('event_id')
        ];
        
        $report->update($reportData);

        $response = [
            "report" => [
                'title' => $report->title,
                'urls_registrant' => $report->urls_registrant,
                'ranges_registrant' => $report->ranges_registrant,
                'url_attendance' => $report->url_attendance,
                'range_attendance' => $report->range_attendance,
                'event_id' => $report->event_id
            ]
        ];

        return $response;
    }

    public function generate($id) {
        $spreadsheetController = new spreadsheetController;
        $report = Report::where('id', $id)->first();
        $dataSpreadsheet = $spreadsheetController->read($id);
        $data['title'] = $report->title;
        $data['event_id'] = $report->event_id;
        $data['total_registrant'] = $dataSpreadsheet['totalRegistrants'];
        $data['total_attendance'] = $dataSpreadsheet['totalAttendances'];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $arrayHeader = [
            ['Title: ', $data['title']],
            ['Event ID: ', $data['event_id']],
            ['Total Registrants: ', $data['total_registrant']],
            ['Total Attendance: ', $data['total_attendance']]
        ];

        $sheet->fromArray($arrayHeader, "", 'B1');
        
        //Section for Eligible List
        $arrayEligible = [
            "Eligible Email",
            "Eligible Name",
        ];
        $sheet->fromArray($arrayEligible, "", 'A6');

        //Writing The eligible email list
        $arrayData = $dataSpreadsheet['email'];
        $columnArrayData = array_chunk($arrayData, 1);
        $sheet->fromArray($columnArrayData, "", 'A7');
        
        //Writing The eligible name list
        $arrayData = $dataSpreadsheet['name'];
        $columnArrayData = array_chunk($arrayData, 1);
        $sheet->fromArray($columnArrayData, "", 'B7');
        
        //Section for Non Eligible List
        $arrayEligible = [
            "Non Eligible Email",
            "Non Eligible Name",
        ];
        $sheet->fromArray($arrayEligible, "", 'E6');

        //Writing The eligible email list
        $arrayData = $dataSpreadsheet['nonEligibleEmail'];
        $columnArrayData = array_chunk($arrayData, 1);
        $sheet->fromArray($columnArrayData, "", 'E7');
        
        //Writing The eligible name list
        $arrayData = $dataSpreadsheet['nonEligibleName'];
        $columnArrayData = array_chunk($arrayData, 1);
        $sheet->fromArray($columnArrayData, "", 'F7');

        $styleArray = array(
            'font' => array(
                'bold' => true
            )
        );
        $sheet->getStyle('A1:F6')->applyFromArray($styleArray);

        //Setting the width of columns
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        $writer = new Xlsx($spreadsheet);
        $writer->save('../public/storage/file/reports/' . $report->title . ".xlsx");
        return redirect("storage/file/reports/" . $report->title . ".xlsx");
    }

    public function delete($id) {
        $report = Report::where('id', $id)->delete();
        $msg = "Success to delete";
        return [
            'response' => $msg
        ];
    }
}
