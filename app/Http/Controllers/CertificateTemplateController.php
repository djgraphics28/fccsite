<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\CertificateTemplate;
use App\Http\Requests\CertificateTemplateStoreRequest;

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
        $members = Member::all();
        return view('backend.certificate_maker.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateTemplateStoreRequest $request)
    {

        // dd($request->all());
        $data = [
            'title' => strtoupper($request->title),
            'content' => $request->content,
            'signatories' => json_encode($request->signatories),
        ];

        $data = CertificateTemplate::create($data);

        // Upload certificate background picture if provided
        if ($request->hasFile('background')) {
            $data->addMediaFromRequest('background')
                ->toMediaCollection('background');
        }

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
        $members = Member::all();
        $certgen = CertificateTemplate::find($id);
        return view('backend.certificate_maker.edit', compact('certgen', 'members'));
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

        // Upload certificate background picture if provided
        if ($request->hasFile('background')) {
            $certgen->addMediaFromRequest('background')
                ->toMediaCollection('background');
        }

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
