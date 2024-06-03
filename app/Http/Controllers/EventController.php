<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function calendar()
    {
        $calendarEvents = [];

        $events = Event::all();

        foreach ($events as $event) {
            $calendarEvents[] = [
                'title' => $event->name . ' ('.$event->user->name.')',
                'start' => $event->event_time,
            ];
        }

        return view('events.index', compact('calendarEvents'));
    }
}
