<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        Event::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'image_path' => $imagePath,
        ]);

        return redirect('/')->with('success', 'Event created successfully!');
    }
    
    public function show(Event $event)
    {
        
        return view('event', ['event' => $event]);
    }

    public function edit(Event $event)
    {
        return view('edit', ['event' => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $event->image_path;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image_path && file_exists(public_path($event->image_path))) {
                unlink(public_path($event->image_path));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        $event->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'image_path' => $imagePath,
        ]);

        return redirect('/event/' . $event->id)->with('success', 'Event opdateret!');
    }

    public function destroy(Event $event)
    {
        // Delete image if exists
        if ($event->image_path && file_exists(public_path($event->image_path))) {
            unlink(public_path($event->image_path));
        }

        $event->delete();

        return redirect('/')->with('success', 'Event slettet!');
    }
}
