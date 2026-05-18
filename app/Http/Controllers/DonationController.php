<?php

use App\Models\Donation;
use App\Models\Campaign;

class DonationController extends Controller
{
    public function store(Request $request, $campaignId)
    {
        $campaign = Campaign::findOrFail($campaignId);

        $donation = new Donation();
        $donation->campaign_id = $campaign->id;
        $donation->donor_name = $request->donor_name;
        $donation->amount = $request->amount;
        $donation->save();

        // Mise à jour du montant collecté
        $campaign->current_amount += $request->amount;
        $campaign->save();

        return redirect()->back()->with('success', 'Don effectué avec succès');
    }
}
