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

        if (request('search')) {
            $query = $query->where(function($builder) use ($request){
                $builder->where('name', 'LIKE', "%{$request->search}%")
                    ->orWhere('ppi', 'LIKE', "%{$request->search}%");
            });
        }

        if (request('region')) {
            $query = $query->where(function($builder) use ($request){
                $builder->where('region', 'LIKE', "%{$request->region}%");
            });
        }
        $query = $query->get();
        return $query;
    }

    public function readDetail($id) {
        $speaker = Speaker::where('id', $id)->first();
        $data = [$speaker, $speaker->email];
        return $data;
    }

    public function updateImage($id)
    {
        request()->validate([
            'picture' => ['required', 'image']
        ]);

        // get partner data by id
        $speaker = Speaker::find($id);
        $oldPicturePath = public_path() . '/storage/img/speakers/' . $speaker->id;

        // replace old picture name
        array_map('unlink', glob("$oldPicturePath/*.*"));
        $pictureName = request('picture')->getClientOriginalName();
        $speaker->picture = $pictureName;
        $speaker->save();

        // add new picture to storage
        request('picture')->move($oldPicturePath, $pictureName);

        return $speaker;
    }

    public function insert() {
        request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'ppi' => ['required', 'string'],
            'major' => ['required', 'string'],
            'school' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'picture' => ['required', 'image'],
            'event_id' => ['required', 'integer']
        ]);

        $check = Speaker::where('email', request('email'))->first();
        if ($check)
            abort(400, 'Sorry, cannot insert the same speaker\'s email as the existing one');

        $pictureName = request('picture')->getClientOriginalName();

        $speakerData = [
            'name' => request('name'),
            'email' => request('email'),
            'ppi' => request('ppi'),
            'major' => request('major'),
            'school' => request('school'),
            'detail' => request('detail'),
            'event_id' => request('event_id'),
            'picture' => $pictureName
        ];

        $speaker = Speaker::create($speakerData);

        $newPath = public_path() . '/storage/img/speakers/' . $speaker->id;

        request('picture')->move($newPath, $pictureName);

        return $speaker;
    }

    public function update($id) {
        request()->validate([
            'name' => ['required', 'string'],
            'email' => [
                'required', 
                'string',
                Rule::unique('speakers')->ignore($id)
            ],
            'ppi' => ['required', 'string'],
            'major' => ['required', 'string'],
            'school' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'event_id' => ['required', 'integer']
        ]);

        $speaker = Speaker::where('id', $id)->first();
    
        $speakerData = [
            'name' => request('name'),
            'email' => request('email'),
            'ppi' => request('ppi'),
            'major' => request('major'),
            'school' => request('school'),
            'detail' => request('detail'),
            'event_id' => request('event_id')
        ];

        $speaker->update($speakerData);
        
        $response = [
            "speaker" => [
                'name' => $speaker->name,
                'ppi' => $speaker->ppi,
                'major' => $speaker->major,
                'school' => $speaker->school,
                'detail' => $speaker->detail,
                'event_id' => $speaker->event_id,
                'picture' => $speaker->picture
            ]
        ];

        return $response;
    }

    public function delete($id) {
        $speaker = Speaker::where('id', $id);
        $speakerObject = $speaker->first();

        //Delete directory and picture
        $picturePath = public_path() . '/storage/img/speakers/' . $speakerObject->id;
        array_map('unlink', glob("$picturePath/*.*"));
        rmdir($picturePath);

        $deleteSpeaker = $speaker->delete();
        $msg = "success to delete";
        return [
            'response' => $msg
        ];
    }
}
