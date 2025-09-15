<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class FeedbackController extends Controller
{
    public function index(){
        $feedback = Feedback::paginate(10);

        return view('admin.feedback.index', compact('feedback'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
    
    
        $feedbackQuery = Feedback::query();
    
        if ($keyword) {
            $feedbackQuery->where('name', 'LIKE', "%$keyword%")
                        ->orWhere('subject', 'LIKE', "%$keyword%")
                        ->orWhere('email', 'LIKE', "%$keyword%");
        }
    
        $feedback = $feedbackQuery->paginate(10);
        Paginator::useBootstrap(); // Sesuaikan dengan tampilan Anda
    
        View::composer('*', function ($view) {
            $feed = Feedback::paginate(10); // Sesuaikan dengan jumlah item per halaman yang Anda inginkan
            $view->with('feed', $feed);
        });
    
        return view('admin.feedback.index', compact('feedback', 'keyword'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Feedback::create($validatedData);

        // toastr()->success('Feedback sent successfully!');
        return redirect()->back()->with('success', 'Feedback has been submitted successfully.');

    }
    public function delete(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        toastr()->success('Data Alumni berhasil dihapus');
        return redirect('/feedback');
    }
    public function show($id)
    {
        $feedback = Feedback::find($id);
        return response()->json($feedback);
    }
    
 
                               
      
}
