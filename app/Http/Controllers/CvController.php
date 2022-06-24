<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCvRequest;
use App\Models\Cv;
use Illuminate\Http\Request;
use Storage;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = auth()->user()->cvs;

        return view('jobseeker.cv.index', [
            'cvs' => $cvs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCvRequest $request)
    {
        $file = $request->file('cv');

        try {
            // Store file to storage
            $storagePath = $file->store('cv');

            $cv = auth()->user()->cvs()->create([
                'original_name' => $file->getClientOriginalName(),
                'extension' => $file->extension(),
                'storage_path' => $storagePath
            ]);

            session()->flash('success', 'CV stored successfully');
            return redirect(route('cv.index'));

        } catch (\Exception $ex) {
            // An error has been occured
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $cv
     * @return \Illuminate\Http\Response
     */
    public function show(Cv $cv)
    {
        if (auth()->user()->is($cv->user)) {
            $filePath = Storage::path($cv->storage_path);
            $fileName = $cv->original_name;

            if (Storage::disk()->exists($filePath)) {
                return Storage::disk()->download($filePath, $fileName);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cv $cv)
    {
        if (auth()->user()->is($cv->user)) {
            try {
                // Delete file from the storage
                $result = Storage::delete($cv->storage_path);

                // Delete the record
                ($result) ? $cv->delete() : abort(500);

                session()->flash('success', 'CV deleted successfully');

                return redirect(route('cv.index'));
            } catch (\Exception $ex) {
                return response($ex->getMessage(), 500);
            }

        } else {
            abort(403);
        }
    }
}
