<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SpeakerController extends Controller
{
    public function read(Request $request) {
        $query = DB::table('speakers as s')
            ->join('events as e', 's.event_id', '=', 'e.id')
            ->select(
                's.id',
                's.event_id',
                's.name',
                's.ppi',
                's.picture',
                's.major',
                's.school',
                's.detail',
                'e.region'
            );

        if ($request->has('search')) {
            $query->where(function($builder) use ($request) {
                $builder->where('s.name', 'LIKE', "%{$request->search}%")
                    ->orWhere('s.ppi', 'LIKE', "%{$request->search}%");
            });
        }

        if ($request->has('region')) {
            $query->where('e.region', 'LIKE', "%{$request->region}%");
        }

        return response()->json($query->get());
    }

    public function readDetail($id) {
        $speaker = Speaker::findOrFail($id);
        return response()->json([
            'speaker' => $speaker,
            'email' => $speaker->email
        ]);
    }

    public function updateImage($id, Request $request) {
        $request->validate([
            'picture' => ['required', 'image']
        ]);

        $speaker = Speaker::findOrFail($id);
        $oldPicturePath = public_path("storage/img/speakers/{$speaker->id}");

        // Replace old picture
        array_map('unlink', glob("$oldPicturePath/*.*"));
        $pictureName = $request->file('picture')->getClientOriginalName();
        $speaker->picture = $pictureName;
        $speaker->save();

        // Move new picture to storage
        $request->file('picture')->move($oldPicturePath, $pictureName);

        return response()->json($speaker);
    }

    public function insert(Request $request) {
        $this->validateSpeaker($request);

        if (Speaker::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'Sorry, cannot insert the same speaker\'s email as the existing one'], 400);
        }

        $pictureName = $request->file('picture')->getClientOriginalName();

        $speakerData = $request->only([
            'name', 'email', 'ppi', 'major', 'school', 'detail', 'event_id'
        ]);
        $speakerData['picture'] = $pictureName;

        $speaker = Speaker::create($speakerData);
        $newPath = public_path("storage/img/speakers/{$speaker->id}");
        $request->file('picture')->move($newPath, $pictureName);

        return response()->json($speaker, 201);
    }

    public function update($id, Request $request) {
        $this->validateSpeaker($request, $id);

        $speaker = Speaker::findOrFail($id);
        $speaker->update($request->only([
            'name', 'email', 'ppi', 'major', 'school', 'detail', 'event_id'
        ]));

        return response()->json($speaker);
    }

    public function delete($id) {
        $speaker = Speaker::findOrFail($id);

        // Delete directory and picture
        $picturePath = public_path("storage/img/speakers/{$speaker->id}");
        array_map('unlink', glob("$picturePath/*.*"));
        rmdir($picturePath);

        $speaker->delete();
        return response()->json(['response' => 'success to delete']);
    }

    private function validateSpeaker(Request $request, $id = null) {
        $uniqueRule = $id ? Rule::unique('speakers')->ignore($id) : 'unique:speakers';

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', $uniqueRule],
            'ppi' => ['required', 'string'],
            'major' => ['required', 'string'],
            'school' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'picture' => ['required', 'image'],
            'event_id' => ['required', 'integer']
        ]);
    }
}
