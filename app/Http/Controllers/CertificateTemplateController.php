<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateTemplateStoreRequest;
use App\Models\CertificateTemplate;
use Illuminate\Http\Request;

class CertificateTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.certificate_maker.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.certificate_maker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateTemplateStoreRequest $request)
    {
        $data = [
            'title' => strtoupper($request->title),
            'content' => $request->content,
            'signatories' => json_encode($request->signatories),
        ];

        $data = CertificateTemplate::create($data);

        if($data) {
            toastr()->success('New Certificate Template has been created successfully!');
            return redirect()->route('cert.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CertificateTemplate $certificateTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $certgen = CertificateTemplate::find($id);
        return view('backend.certificate_maker.edit', compact('certgen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $certgen = CertificateTemplate::findOrFail($id);

        $data = [
            'title' => ucwords($request->title),
            'content' => $request->content,
            'signatories' => json_encode($request->signatories),
        ];

        $certgen->update($data);

        return redirect()->route('cert.index')->with('success', 'Certificate Template Info is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CertificateTemplate $certificateTemplate)
    {
        //
    }
}
