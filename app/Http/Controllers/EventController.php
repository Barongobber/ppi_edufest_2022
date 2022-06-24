<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function read(Request $request) {
        $query = DB::table('events');
        if (request('search')) {
            $query = $query->where(function($builder) use ($request){
                $builder->where('title', 'LIKE', "%{$request->search}%");
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

    public function detail($id){
        return view('event-details', [
            "title" => "Detail Acara",
            "event" => Event::findOrFail($id),
            "speakers" => DB::table('speakers')->where('event_id', $id)->get()
        ]);
    }

    public function readDetail($id) {
        $event = Event::where('id', $id)->first();
        $speakers = Speaker::where('event_id', $id)->get();
        $data = [$event, $speakers];
        return $data;
    }

    public function updateImage($id)
    {
        request()->validate([
            'picture' => ['required', 'image']
        ]);

        // get partner data by id
        $events = Event::find($id);
        $oldPicturePath = public_path() . '/storage/img/events/' . $events->id;
        $oldFile = $oldPicturePath . '/' . $events->picture;

        // replace old picture name
        array_map('unlink', glob("$oldPicturePath/*.*"));
        $pictureName = request('picture')->getClientOriginalName();
        $events->picture = $pictureName;
        $events->save();

        // add new picture to storage
        request('picture')->move($oldPicturePath, $pictureName);

        return $events;
    }

    public function insert() {
        request()->validate([
            'title' => ['required', 'string'],
            'form_link' => ['required', 'string'],
            'date' => ['required', 'date'],
            'detail' => ['required', 'string'],
            'region' => ['required', 'string'],
            'picture' => ['required', 'image']
        ]);

        $check = Event::where('title', request('title'))->first();
        if ($check)
            abort(400, 'Sorry, cannot insert the same title as the existing one');

        $pictureName = request('picture')->getClientOriginalName();

        $eventData = [
            'title' => request('title'),
            'form_link' => request('form_link'),
            'date' => request('date'),
            'detail' => request('detail'),
            'region' => request('region'),
            'picture' => $pictureName
        ];

        $event = Event::create($eventData);

        $newPath = public_path() . '/storage/img/events/' . $event->id;

        request('picture')->move($newPath, $pictureName);

        return $event;
    }

    public function update($id) {
        request()->validate([
            'title' => [
                'required',
                'string',
                Rule::unique('events')->ignore($id)
            ],
            'form_link' => ['required', 'string'],
            'date' => ['required', 'date'],
            'detail' => ['required', 'string'],
            'region' => ['required', 'string']
        ]);

        $event = Event::where('id', $id)->first();

        $eventData = [
            'title' => request('title'),
            'form_link' => request('form_link'),
            'date' => request('date'),
            'detail' => request('detail'),
            'region' => request('region')
        ];

        $event->update($eventData);

        $response = [
            "event" => [
                'id' => $event->id,
                'title' => $event->title,
                'form_link' => $event->form_link,
                'date' => $event->date,
                'detail' => $event->detail,
                'region' => $event->region,
                'picture' => $event->picture
            ]
        ];

        return $response;
    }

    public function delete($id) {
        $event = Event::where('id', $id);
        $eventObject = $event->first();

        //Delete directory and picture
        $picturePath = public_path() . '/storage/img/events/' . $eventObject->id;
        array_map('unlink', glob("$picturePath/*.*"));
        rmdir($picturePath);

        $deleteEvent = $event->delete();
        $msg = "success to delete";
        return [
            'response' => $msg
        ];
    }
}
