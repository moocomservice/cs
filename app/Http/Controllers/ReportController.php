<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklist; // Import the Blacklist model
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    public function store(Request $request)
    {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'surname' => 'required|string',
                'idcard' => 'required|string',
                'bankAccount' => 'nullable|string',
                'bankType' => 'nullable|string',
                'date' => 'required|string',
                'amount' => 'required|integer',
                'productName' => 'nullable|string',
                'telephone' => 'nullable|string',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image files
            ]);

            // Create a new report record
            $report = new Blacklist();
            $report->fill($validatedData);
            $report->status = 'pending';
            $report->save();

            // Handle the file uploads
            if($request->hasFile('images')) {
                $images = $request->file('images');
                $imageUrls = [];

                foreach ($images as $image) {
                    $path = $image->store('images', 'public');
                    $imageUrls[] = Storage::url($path);
                }

                // Save the image URLs in the database if you have a column for them
                $report->image_urls = json_encode($imageUrls);
                $report->save();
            }

            return response()->json(['success' => true]);
    }

    public function reportList()
    {
        // Fetch all reports from the database
        $reports = Blacklist::all();

        // Pass the reports to the view for display
        return view('reportlist', compact('reports'));
    }

    public function update(Request $request, $id)
    {
        // Find the report by its ID
        $report = Blacklist::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'status' => 'required|in:pending,approve', // Ensure status is either "pending" or "approve"
        ]);

        // Update the status of the report
        $report->status = $validatedData['status'];

        // Save the updated report
        $report->save();

        // Redirect back to the report list page with a success message
        return redirect()->route('reportlist')->with('success', 'Report status updated successfully');
    }
}
