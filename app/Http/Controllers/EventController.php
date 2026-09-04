<?php

namespace App\Http\Controllers;

use App\Models\EventModel;

class EventController extends Controller
{
    public function index()
    {
        $events = EventModel::orderByDesc('event_date')
            ->orderByDesc('id')
            ->paginate(9);

        return view('events.index', compact('events'));
    }

    public function show(EventModel $event)
    {
        return view('events.show', compact('event'));
    }
}
