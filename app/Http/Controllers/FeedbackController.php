<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use PDF;
use App\Events\FeedbackAdded;

class FeedbackController extends Controller
{   
    public function __construct()
    {
          $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $feedbacks = Feedback::latest()->get();

        return view('feedbacks.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feedback = new Feedback;

        return view('feedbacks.create', [
            'feedback' => $feedback
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {       
        $this->validate(request(), [
            'title' => 'required | min: 10 | max : 50',
            'body' => 'required | max : 500'
        ]);

        $feedback = auth()->user()->publish(new Feedback(request(['title', 'body'])));
        event(new FeedbackAdded($feedback));
        return redirect('feedback');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {   
        view()->share('feedback',$feedback);
        return view('feedbacks.show');
    }

    public function download(Feedback $feedback)
    {   
        view()->share('feedback',$feedback);
        $pdf = PDF::loadView('feedbacks.pdf');
        return $pdf->download($feedback->user->name.'-Feedback.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
