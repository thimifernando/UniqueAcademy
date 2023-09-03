<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        ini_set('max_execution_time', 1200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
            ->facebook()
            ->whatsapp();

        return view('advertisement.add-advertisement', compact('shareComponent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        //validate the request
        $validate = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'img' => ['required', 'mimes:jpeg,jpg,png,gif'],
            'video' => ['required', 'mimes:mp4,ogx,oga,ogv,ogg,webm'],
            'category' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
        ]);

        if ($validate) {
            $fileName = $request->video->getClientOriginalName();
            $videoFilePath = 'videos/' . $fileName;
            $imgfileName = $request->img->getClientOriginalName();
            $imgFilePath = 'images/' . $imgfileName;

            $isFileUploaded = Storage::disk('public')->put($videoFilePath, file_get_contents($request->video));
            // File URL to access the video in frontend
            $url = Storage::disk('public')->url($videoFilePath);

            $isImageFileUploaded = Storage::disk('public')->put($imgFilePath, file_get_contents($request->img));
            // File URL to access the image in frontend
            $url = Storage::disk('public')->url($imgFilePath);

            if ($request->isMethod('POST')) {
                if (isset($isFileUploaded) && isset($isImageFileUploaded)) {
                    try {
                        $advertisement = new Advertisement();
                        $advertisement->date = $request->date;
                        $advertisement->img = $imgFilePath;
                        $advertisement->video = $videoFilePath;
                        $advertisement->category = $request->category;
                        $advertisement->title = $request->title;


                        $create = $advertisement->save();

                        if ($create) {
                            return redirect('advertisement/show')->with('success', 'Advertisement created successfully');
                        } else {
                            return redirect('advertisement/show')->with('error', 'Advertisement not created');
                        }

                    } catch (\Exception $e) {
                        return response()->json([
                            'status' => 'error',
                            'message' => $e->getMessage()
                        ]);
                    }
                } else {
                    return redirect('/advertisement')->with('error', 'Invalid Request');
                }
            }
        } else {
            return redirect('/advertisement')->with('error', 'Invalid Request');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        //get all advertisement on database
        $advertisement = Advertisement::all();
        return view('advertisement.view-advertisement', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
            ->facebook()
            ->whatsapp();
        //get advertisement by id
        $advertisement = Advertisement::where('a_id', $id)->get()->first();
        return view('advertisement.update-advertisement', compact('advertisement', 'shareComponent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //validate the request
        $validate = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'img' => ['required', 'mimes:jpeg,jpg,png,gif'],
            'video' => ['required', 'mimes:mp4,ogx,oga,ogv,ogg,webm'],
            'category' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
        ]);

        if ($validate) {


            $fileName = $request->video->getClientOriginalName();
            $videoFilePath = 'videos/' . $fileName;
            $imgfileName = $request->img->getClientOriginalName();
            $imgFilePath = 'images/' . $imgfileName;

            $isFileUploaded = Storage::disk('public')->put($videoFilePath, file_get_contents($request->video));
            // File URL to access the video in frontend
            $url = Storage::disk('public')->url($videoFilePath);

            $isImageFileUploaded = Storage::disk('public')->put($imgFilePath, file_get_contents($request->img));
            // File URL to access the image in frontend
            $url = Storage::disk('public')->url($imgFilePath);

            if ($request->isMethod('POST')) {
                if (isset($isFileUploaded) && isset($isImageFileUploaded)) {
                    try {
                        //update advertisement
                        $update = Advertisement::where('a_id', $id)->get()->first()->update([
                            'a_id' => $id, // 'a_id' => 'required|integer',
                            'date' => $request->date,
                            'img' => $imgFilePath,
                            'video' => $videoFilePath,
                            'category' => $request->category,
                            'title' => $request->title,
                        ]);

                        if ($update) {
                            return redirect('advertisement/show')->with('success', 'Advertisement Updated successfully');
                        } else {
                            return redirect('advertisement/show')->with('error', 'Advertisement not Updated');
                        }

                    } catch (\Exception $e) {
                        return response()->json([
                            'status' => 'error',
                            'message' => $e->getMessage()
                        ]);
                    }
                } else {
                    return redirect('/advertisement/edit/' . $id)->with('error', 'Invalid Request');
                }
            }
        } else {
            return redirect('/advertisement/edit/' . $id)->with('error', 'Invalid Request');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //delete advertisement by id
        $delete = Advertisement::where('a_id', $id)->get()->first()?->delete();
        return $delete;
    }

    public function destroy($id)
    {
        //get current url
        $response = $this->delete($id);
        if ($response > 0) {
            return redirect('advertisement/show')->with('success', 'Advertisement Deleted successfully');
        } else {
            return redirect('advertisement/show')->with('error', 'Advertisement not Deleted');
        }


    }

    public function createPDF()
    {
        // retreive all records from db
        $advertisement = Advertisement::all();
//        echo $data;
        // share data to view
        view()->share('advertisement.pdf-view', $advertisement);
        $pdf = PDF::loadView('advertisement.pdf-view', compact('advertisement'))->setOptions(['defaultFont' => 'sans-serif'])->output();

        // download PDF file with download method
        return response()->streamDownload(
            fn() => print($pdf),
            "advertisement.pdf"
        );
    }

    public function pdfView()
    {
        $advertisement = Advertisement::all();
        return view('advertisement.pdf-view', compact('advertisement'));
    }
}
