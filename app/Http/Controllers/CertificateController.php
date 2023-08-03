<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Member;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function generateCertificate($memberId)
    {
        // $name = $request->input('name', 'John Doe'); // Default value if name is not provided
        // $title = $request->input('title', 'Certificate of Achievement'); // Default value if course is not provided
        // $desc = $request->input('desc', 'Lorem Ipsum.'); // Default value if course is not provided
        $backgroundImage = null; // Background image URL, if provided

        $member = Member::find($memberId);

        $data = [
            'name' => $member->first_name,
            'title' => 'Cetificate of Achievement',
            'desc' => 'Lorem Ipsum',
            // Add other variables you need for the certificate
        ];

        $pdf = PDF::loadView('backend.certificates.index', $data);

        // If a background image is provided, set it as the background
        if ($backgroundImage) {
            $pdf->getDomPDF()->set_option('enable_html5_parser', true);
            $html = '<html><body style="background-image: url(\'' . $backgroundImage . '\'); background-size: cover; background-repeat: no-repeat;">';
            $html .= view('backend.certificates.index', $data)->render();
            $html .= '</body></html>';
            $pdf->loadHTML($html);
        }

        // Set paper size to A4 (21 x 29.7 cm)
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('certificate.pdf');
    }
}
