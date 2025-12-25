<?php


namespace App\Http\Controllers;

use App\Models\Summary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index()
    {
 
        $user = auth()->user();

        $summaries = Summary::where('user_id', $user->id)->get();


        return view('summaries.index', compact('summaries'));
    }

    public function create()
    {
        return view('summaries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summaries_content' => 'required|string',
        ]);

        Summary::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'summaries_content' => $request->summaries_content,
        ]);

        return redirect()->route('summaries.index')
            ->with('success', 'تم حفظ الملخص بنجاح');
    }

    public function show(Summary $summary)
    {
        if ($summary->user_id !== auth()->id()) {
            abort(403);
        }

        return view('summaries.show', compact('summary'));
    }

    public function edit(Summary $summary)
    {
        if ($summary->user_id !== auth()->id()) {
            abort(403);
        }

        return view('summaries.edit', compact('summary'));
    }

    public function update(Request $request, Summary $summary)
    {
        if ($summary->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'summaries_content' => 'required|string',
        ]);

        $summary->update([
            'title' => $request->title,
            'summaries_content' => $request->summaries_content,
        ]);

        return redirect()->route('summaries.index')
            ->with('success', 'تم تعديل الملخص بنجاح');
    }

    public function destroy(Summary $summary)
    {
        if ($summary->user_id !== auth()->id()) {
            abort(403);
        }

        $summary->delete();

        return redirect()->route('summaries.index')
            ->with('success', 'تم حذف الملخص بنجاح');
    }
}
