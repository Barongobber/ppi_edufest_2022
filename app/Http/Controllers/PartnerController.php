<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    private function validatePartnerData(Request $request, $id = null)
    {
        $uniqueNameRule = $id ? Rule::unique('partners')->ignore($id) : 'unique:partners';
        
        return $request->validate([
            'name' => ['required', 'string', $uniqueNameRule],
            'picture' => $id ? ['image'] : ['required', 'image']
        ]);
    }

    private function handlePartnerImage($partner, $picture)
    {
        $oldPicturePath = public_path() . '/storage/img/partners/' . $partner->id;
        array_map('unlink', glob("$oldPicturePath/*.*"));
        
        $pictureName = $picture->getClientOriginalName();
        $partner->picture = $pictureName;
        $partner->save();

        $picture->move($oldPicturePath, $pictureName);
    }

    public function read()
    {
        return Partner::all();
    }

    public function updateImage($id)
    {
        request()->validate(['picture' => ['required', 'image']]);
        
        $partner = Partner::findOrFail($id);
        $this->handlePartnerImage($partner, request('picture'));

        return $partner;
    }

    public function insert()
    {
        $validatedData = $this->validatePartnerData(request());

        $partner = Partner::create($validatedData);
        $this->handlePartnerImage($partner, request('picture'));

        return $partner;
    }

    public function update($id, Request $request)
    {
        $validatedData = $this->validatePartnerData($request, $id);

        $partner = Partner::findOrFail($id);
        $partner->update($validatedData);

        if ($request->hasFile('picture')) {
            $this->handlePartnerImage($partner, $request->file('picture'));
        }

        return ['partner' => $partner];
    }

    public function delete($id)
    {
        $partner = Partner::findOrFail($id);

        $picturePath = public_path() . '/storage/img/partners/' . $partner->id;
        array_map('unlink', glob("$picturePath/*.*"));
        rmdir($picturePath);

        $partner->delete();

        return ['response' => "success to delete"];
    }
}