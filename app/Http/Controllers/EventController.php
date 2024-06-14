<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    private function validateEventData(Request $request, $id = null)
    {
        $uniqueTitleRule = $id ? Rule::unique('events')->ignore($id) : 'unique:events';
        
        return $request->validate([
            'title' => ['required', 'string', $uniqueTitleRule],
            'form_link' => ['required', 'string'],
            'date' => ['required', 'date'],
            'detail' => ['required', 'string'],
            'region' => ['required', 'string'],
            'picture' => $id ? ['image'] : ['required', 'image']
        ]);
    }

    private function handleEventImage($event, $picture)
    {
        $oldPicturePath = public_path() . '/storage/img/events/' . $event->id;
        array_map('unlink', glob("$oldPicturePath/*.*"));
        
        $pictureName = $picture->getClientOriginalName();
        $event->picture = $pictureName;
        $event->save();

        $picture->move($oldPicturePath, $pictureName);
    }

    public function read(Request $request) {
        $query = DB::table('events');
        if ($request->search) {
            $query->where('title', 'LIKE', "%{$request->search}%");
        }
        if ($request->region) {
            $query->where('region', 'LIKE', "%{$request->region}%");
        }
        return $query->get();
    }

    public function detail($id){
        return view('event-details', [
            "title" => "Detail Acara",
            "event" => Event::findOrFail($id),
            "speakers" => DB::table('speakers')->where('event_id', $id)->get()
        ]);
    }

    public function readDetail($id) {
        $event = Event::findOrFail($id);
        $speakers = Speaker::where('event_id', $id)->get();
        return [$event, $speakers];
    }

    public function updateImage($id)
    {
        request()->validate(['picture' => ['required', 'image']]);
        
        $event = Event::findOrFail($id);
        $this->handleEventImage($event, request('picture'));

        return $event;
    }

    public function insert() {
        $validatedData = $this->validateEventData(request());

        $event = Event::create($validatedData);
        $this->handleEventImage($event, request('picture'));

        return $event;
    }

    public function update($id) {
        $validatedData = $this->validateEventData(request(), $id);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        if (request()->hasFile('picture')) {
            $this->handleEventImage($event, request('picture'));
        }

        return ['event' => $event];
    }

    public function delete($id) {
        $event = Event::findOrFail($id);

        $picturePath = public_path() . '/storage/img/events/' . $event->id;
        array_map('unlink', glob("$picturePath/*.*"));
        rmdir($picturePath);

        $event->delete();

        return ['response' => "success to delete"];
    }
}
