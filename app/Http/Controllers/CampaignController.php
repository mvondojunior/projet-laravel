<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaigns.show', compact('campaign'));
    }
}
