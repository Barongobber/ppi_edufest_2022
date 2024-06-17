<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SponsorController extends Controller
{
    public function read() {
        $sponsors = Sponsor::all();
        return response()->json($sponsors);
    }

    public function updateImage($id, Request $request)
    {
        $request->validate([
            'picture' => ['required', 'image']
        ]);

        // Get sponsor data by ID
        $sponsor = Sponsor::findOrFail($id);
        $oldPicturePath = public_path("storage/img/sponsors/{$sponsor->id}");

        // Replace old picture
        array_map('unlink', glob("$oldPicturePath/*.*"));
        $pictureName = $request->file('picture')->getClientOriginalName();
        $sponsor->picture = $pictureName;
        $sponsor->save();

        // Move new picture to storage
        $request->file('picture')->move($oldPicturePath, $pictureName);

        return response()->json($sponsor);
    }

    public function insert(Request $request) {
        $this->validateSponsor($request);

        if (Sponsor::where('name', $request->name)->exists()) {
            return response()->json(['error' => 'Sorry, cannot insert the same name as the existing one'], 400);
        }

        $pictureName = $request->file('picture')->getClientOriginalName();

        $sponsorData = $request->only([
            'name', 'detail'
        ]);
        $sponsorData['picture'] = $pictureName;

        $sponsor = Sponsor::create($sponsorData);

        $newPath = public_path("storage/img/sponsors/{$sponsor->id}");
        $request->file('picture')->move($newPath, $pictureName);

        return response()->json($sponsor, 201);
    }

    public function update($id, Request $request) {
        $this->validateSponsor($request, $id);

        $sponsor = Sponsor::findOrFail($id);
        $sponsor->update($request->only([
            'name', 'detail'
        ]));

        return response()->json($sponsor);
    }

    public function delete($id) {
        $sponsor = Sponsor::findOrFail($id);

        // Delete directory and picture
        $picturePath = public_path("storage/img/sponsors/{$sponsor->id}");
        array_map('unlink', glob("$picturePath/*.*"));
        rmdir($picturePath);

        $sponsor->delete();
        return response()->json(['response' => 'success to delete']);
    }

    private function validateSponsor(Request $request, $id = null) {
        $uniqueRule = $id ? Rule::unique('sponsors')->ignore($id) : 'unique:sponsors';

        $request->validate([
            'name' => ['required', 'string', $uniqueRule],
            'detail' => ['required', 'string'],
            'picture' => ['image']
        ]);
    }
}
