<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\CertificateTemplate;

class CertificateController extends Controller
{
    // public function generateCertificate($memberIds)
    // {
    //     // $name = $request->input('name', 'John Doe'); // Default value if name is not provided
    //     // $title = $request->input('title', 'Certificate of Achievement'); // Default value if course is not provided
    //     // $desc = $request->input('desc', 'Lorem Ipsum.'); // Default value if course is not provided
    //     $backgroundImage = 'assets/cert_templates/baptism_cert.png'; // Background image URL, if provided
    //     $ids = json_decode($memberIds);
    //     $members = Member::whereIn('id', $ids)->whereNotNull('date_baptized')->get();

    //     // $data = [
    //     //     'name' => $member->first_name,
    //     //     'title' => 'Cetificate of Water Baptism',
    //     //     'desc' => 'Lorem Ipsum',
    //     //     // Add other variables you need for the certificate
    //     // ];

    //     $pdf = PDF::loadView('backend.certificates.index', compact('members'));

    //     // If a background image is provided, set it as the background
    //     // if ($backgroundImage) {
    //     //     $pdf->getDomPDF()->set_option('enable_html5_parser', true);
    //     //     $html = '<html><body style="background-image: url(\'' . $backgroundImage . '\'); background-size: cover; background-repeat: no-repeat; margin: 0;">';
    //     //     $html .= view('backend.certificates.index', $data)->render();
    //     //     $html .= '</body></html>';
    //     //     $pdf->loadHTML($html);
    //     // }

    //     // $pdf->setOptions(['margin-top' => 0, 'margin-right' => 0, 'margin-bottom' => 0, 'margin-left' => 0]);
    //     $pdf->setOption('margin', 0);
    //     $pdf->setOption('padding', 0);
    //     // Set paper size to A4 (21 x 29.7 cm)
    //     $pdf->setPaper('A4', 'landscape');


    //     return $pdf->stream('certificate.pdf');
    // }

    public function generateCertificate($memberIds, $templateId = 1)
    {
        $template = CertificateTemplate::find($templateId);
        $title = $template->title;
        $content = $template->content;
        // // Replace variable placeholder
        // $name = 'This is the value to replace'; // Replace with your actual variable value
        // $modifiedContent = str_replace('{variable_name}', $variableValue, $content);

        $signatories = json_decode($template->signatories, true);

        $backgroundImage = 'assets/cert_templates/vbs.png'; // Background image URL, if provided
        $ids = json_decode($memberIds);
        $members = Member::whereIn('id', $ids)->get();

        $pdf = PDF::loadView('backend.certificates.index', compact('members', 'title', 'content', 'signatories'));

        $pdf->setOption('margin', 0);
        $pdf->setOption('padding', 0);
        // Set paper size to A4 (21 x 29.7 cm)
        $pdf->setPaper('A4', 'landscape');


        return $pdf->stream('certificate.pdf');
    }
}
