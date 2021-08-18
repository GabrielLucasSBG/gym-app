<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReminderController extends Controller
{
    public function add(Lead $lead)
    {
        return Inertia::render('Leads/LeadReminderAdd', [
            'lead' => $lead
        ]);
    }

    public function store(Request $request)
    {
        $postData = $request->validate([
            'reminder' => 'required|min:3',
            'reminder_date' => 'required|date',
            'lead_id' => 'required|exists:leads,id'
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['status'] = 'pending';

        $lead = Lead::findOrFail($postData['lead_id']);

        $lead->reminders()->create($postData);

        return redirect()->route('lead.view', [$lead]);
    }

    public function view(Lead $lead, Reminder $reminder)
    {
        return Inertia::render('Leads/ReminderView', [
            'lead' => $lead,
            'reminder' => $reminder
        ]);
    }
}
