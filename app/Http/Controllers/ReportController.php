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
        return Report::all();
    }

    public function readDetail($id) {
        $report = Report::findOrFail($id);
        return response()->json($report);
    }

    public function insert(Request $request) {
        $this->validateReport($request);

        if (Report::where('title', $request->title)->exists()) {
            return response()->json(['error' => 'Sorry, cannot insert the same report\'s title as the existing one'], 400);
        }

        $report = Report::create($request->only([
            'title', 
            'urls_registrant', 
            'ranges_registrant', 
            'url_attendance', 
            'range_attendance', 
            'event_id'
        ]));

        return response()->json($report, 201);
    }

    public function update($id, Request $request) {
        $this->validateReport($request, $id);

        $report = Report::findOrFail($id);
        $report->update($request->only([
            'title', 
            'urls_registrant', 
            'ranges_registrant', 
            'url_attendance', 
            'range_attendance', 
            'event_id'
        ]));

        return response()->json($report);
    }

    public function generate($id) {
        $spreadsheetController = new spreadsheetController();
        $report = Report::findOrFail($id);
        $dataSpreadsheet = $spreadsheetController->read($id);
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headerData = [
            ['Title:', $report->title],
            ['Event ID:', $report->event_id],
            ['Total Registrants:', $dataSpreadsheet['totalRegistrants']],
            ['Total Attendance:', $dataSpreadsheet['totalAttendances']]
        ];
        $sheet->fromArray($headerData, null, 'B1');

        // Section for Eligible List
        $eligibleHeaders = ["Eligible Email", "Eligible Name"];
        $sheet->fromArray($eligibleHeaders, null, 'A6');
        $sheet->fromArray(array_chunk($dataSpreadsheet['email'], 1), null, 'A7');
        $sheet->fromArray(array_chunk($dataSpreadsheet['name'], 1), null, 'B7');

        // Section for Non-Eligible List
        $nonEligibleHeaders = ["Non-Eligible Email", "Non-Eligible Name"];
        $sheet->fromArray($nonEligibleHeaders, null, 'E6');
        $sheet->fromArray(array_chunk($dataSpreadsheet['nonEligibleEmail'], 1), null, 'E7');
        $sheet->fromArray(array_chunk($dataSpreadsheet['nonEligibleName'], 1), null, 'F7');

        $sheet->getStyle('A1:F6')->getFont()->setBold(true);
        $columns = ['A', 'B', 'E', 'F'];
        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setWidth(40);
        }
        $sheet->getColumnDimension('C')->setWidth(15);

        $writer = new Xlsx($spreadsheet);
        $filePath = public_path("storage/file/reports/{$report->title}.xlsx");
        $writer->save($filePath);

        return response()->download($filePath);
    }

    public function delete($id) {
        $report = Report::findOrFail($id);
        $report->delete();

        return response()->json(['response' => 'Success to delete']);
    }

    private function validateReport(Request $request, $id = null) {
        $uniqueRule = $id ? Rule::unique('reports')->ignore($id) : 'unique:reports';

        $request->validate([
            'title' => ['required', 'string', $uniqueRule],
            'urls_registrant' => ['required', 'string'],
            'ranges_registrant' => ['required', 'string'],
            'url_attendance' => ['required', 'string'],
            'range_attendance' => ['required', 'string'],
            'event_id' => ['required', 'integer']
        ]);
    }
}
