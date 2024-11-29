<?php

namespace App\Http\Controllers\Admin\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Stage;
use App\Models\CardMovement;
use App\Models\Course;

class CRMController extends Controller
{
    // Display the CRM funnel page with all stages and cards
    public function index()
    {
        $stages = Stage::with('cards')->get(); // Get all stages with their associated cards
        $cards = Card::with('user', 'course', 'stage')->get();
        
        return view('pages.crm.index', compact('stages', 'cards'));
    }

    // Store a new card in the CRM
    public function storeCard(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $card = Card::create($request->all());

        return redirect()->route('crm.index')->with('success', 'Card created successfully.');
    }

    // Update card's stage and log the movement
    public function updateCardStage(Request $request, $id)
    {
        $request->validate([
            'new_stage_id' => 'required|exists:stages,id',
        ]);

        $card = Card::findOrFail($id);
        $oldStageId = $card->stage_id;

        // Update the card's stage
        $card->update(['stage_id' => $request->new_stage_id]);

        // Log the card movement
        CardMovement::create([
            'card_id' => $card->id,
            'old_stage_id' => $oldStageId,
            'new_stage_id' => $request->new_stage_id,
            'moved_user' => auth()->id(), // Assuming the user is authenticated
        ]);

        return redirect()->route('crm.index')->with('success', 'Card stage updated successfully.');
    }

    // Delete a card and log the deletion in movements
    public function destroyCard($id)
    {
        $card = Card::findOrFail($id);
        
        // Log the card movement before deletion
        CardMovement::create([
            'card_id' => $card->id,
            'old_stage_id' => $card->stage_id,
            'new_stage_id' => null, // Null signifies card deletion
            'moved_user' => auth()->id(), // Assuming the user is authenticated
        ]);

        $card->delete();

        return redirect()->route('crm.index')->with('success', 'Card deleted successfully.');
    }
}
