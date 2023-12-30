<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FeaturesController extends Controller
{
    public function showFeatures()
    {
        $features = Feature::all();
        return view('admin.pages.features.features', compact('features'));
    }

    public function addFeatures(Request $request)
    {
        $feature = new Feature();
        $request->validate([

            'feature_name' => 'required',
            'feature_banner' => 'required|image',
            'feature_details' => 'required',
            'feature_url' => 'required|url',

        ]);

        $originalImage = $request->file('feature_banner');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/thumbnail/';
        $originalPath = public_path() . '/images/';
        $filename = $originalImage->getClientOriginalName();
        $arr = explode(".", $filename);
        $name = $arr[0];
        $extension = $arr[1];
        $uploaded_file_name = time() . '.' . $extension;
        $thumbnailImage->save($originalPath . $uploaded_file_name);
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . $uploaded_file_name);

        $feature->feature_name = $request->feature_name;
        $feature->feature_banner = $uploaded_file_name;
        $feature->feature_details = $request->feature_details;
        $feature->feature_url = $request->feature_url;
        if ($feature->save()) {
            return redirect()->back()->with('success', 'Feature Submitted Successfully!');
        } else {
            return redirect()->back()->with('failed', 'Something Went Wrong!');

        }

    }

     public function deleteFeature($id)
    {
        $feature = Feature::where('id', '=', $id);
        if (!is_null($feature)) {
            $feature->delete();
            return redirect()->back()->with('deleted', 'Deleted Successfully');
        }
        return redirect()->route('show.Feature');

    }

}
