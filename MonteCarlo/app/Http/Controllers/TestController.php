<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;
use Carbon\Carbon;

class TestController extends Controller
{
    public function start()
    {
        $questions = Question::all();

        // Store quiz state in session if it doesn't exist
        if (!session()->has('quiz_state')) {
            $quizState = [
                'current_question' => 0,
                'score' => 0,
                'answers' => [],
            ];
            session(['quiz_state' => $quizState]);
        }
    
        $quizState = session('quiz_state');
    
        return view('student.start', compact('questions', 'quizState'));
    }

    public function nextQuestion(Request $request)
    {
        $quizState = session('quiz_state');

        if ($quizState === null || !isset($quizState['current_question'])) {
            return redirect()->route('student.test')->with('error', 'Invalid question number');
        }

        // Retrieve the current question
        $currentQuestion = $quizState['current_question'];
        $quiz = Question::find($request->input('quiz_id'));

        $questions = Question::all();
    
        // Check if the picked answer is correct and update the score
        if ($request->input('picked_option') == $quiz->correctAnswer) {
            $quizState['score'] += $quiz->questionScore;
        }
    
        // Store the answer
        $quizState['answers'][$currentQuestion] = $request->input('picked_option');
    
        // Update the current question
        $quizState['current_question']++;
    
        session(['quiz_state' => $quizState]);
    
        // Check if the quiz is completed
        if ($quizState['current_question'] >= count($questions)) {
            session(['quiz_state' => $quizState]);
            return redirect()->route('test.end');
        }
    
        return redirect()->route('test.start');
    }

    public function end()
    {
        $quizState = session('quiz_state');

        if ($quizState === null || !isset($quizState['current_question'])) {
            return redirect()->route('student.test')->with('error', 'Invalid question number');
        }

        // Retrieve all the quizzes
        $questions = Question::all();
    
        // // Store the answer for the current question
        // $currentQuestion = $quizState['current_question'];
        // $quiz = $questions[$currentQuestion];
        // $quizState['answers'][$currentQuestion] = $quiz->correctAnswer;
    
        $score = new Score;
        $score->score = $quizState['score'];
        $score->date = Carbon::now();
        $score->idStudent = auth()->id(); // Assuming you have a logged-in user with an ID
        $score->save();

        // Clear the quiz state from the session
        session()->forget('quiz_state');
    
        return view('student.end', compact('quizState', 'questions'));
    }
}
