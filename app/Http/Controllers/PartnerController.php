<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facadesuse\Input;

class PartnerController extends Controller
{
    public function read()
    {
        $partner = Partner::all();
        return $partner;
    }

    public function updateImage($id)
    {
        request()->validate([
            'picture' => ['required', 'image']
        ]);

        // get partner data by id
        $partner = Partner::find($id);
        $oldPicturePath = public_path() . '/storage/img/partners/' . $partner->id;
        $oldFile = $oldPicturePath . '/' . $partner->picture;

        // replace old picture name
        array_map('unlink', glob("$oldPicturePath/*.*"));
        $pictureName = request('picture')->getClientOriginalName();
        $partner->picture = $pictureName;
        $partner->save();

        // add new picture to storage
        request('picture')->move($oldPicturePath, $pictureName);

        return $partner;
        
    }

    public function insert()
    {
        request()->validate([
            'name' => ['required', 'string'],
            'picture' => ['required', 'image']
        ]);

        $check = Partner::where('name', request('name'))->first();
        if ($check)
            abort(400, 'Sorry, cannot insert the same name as the existing one');

        $pictureName = request('picture')->getClientOriginalName();

        $partnerData = [
            'name' => request('name'),
            'picture' => $pictureName
        ];
        $partner = Partner::create($partnerData);

        $newPath = public_path() . '/storage/img/partners/' . $partner->id;

        request('picture')->move($newPath, $pictureName);

        return $partner;
    }


    public function update($id, Request $request) {
        request()->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('partners')->ignore($id)
            ]
        ]);

        $partner = Partner::where('id', $id)->first();

        $partnerData = [
            'name' => $request->name
        ];

        $partner->update($partnerData);

        $response = [
            "partner" => [
                'id' => $partner->id,
                'name' => $partner->name,
                'picture' => $partner->picture
            ]
        ];

        return $response;
    }

    public function delete($id)
    {
        $partner = Partner::where('id', $id);
        $partnerObject = $partner->first();

        //Delete directory and picture
        $picturePath = public_path() . '/storage/img/partners/' . $partnerObject->id;
        array_map('unlink', glob("$picturePath/*.*"));
        rmdir($picturePath);

        $deleteSponsor = $partner->delete();
        $msg = "success to delete";
        return [
            'response' => $msg
        ];
    }
}
