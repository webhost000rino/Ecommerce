<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory; // Assuming your purchase history model is PurchaseHistory

class PurchaseController extends Controller
{
    // Method to delete purchase history
    public function destroy($historyId)
    {
        // Find the purchase history record by ID
        $purchaseHistory = PurchaseHistory::findOrFail($historyId);

        // Delete the record
        $purchaseHistory->delete();

        // Redirect with success message
        return redirect()->route('products.index')->with('success', 'Purchase history successfully deleted!');
    }
}
