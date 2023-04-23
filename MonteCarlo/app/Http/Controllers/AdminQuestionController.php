<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;

class AdminQuestionController extends Controller
{
    public function create()
    {
        return view('admin.questioncreate');
    }

    public function store(Request $request)
    {
        $messages = [
            'questionText.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'answer1.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'answer2.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'answer3.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'correctAnswer.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'questionScore.required' => 'Pole jest wymagane. Uzupełnij dane.',         
        ];

        $request->validate([
            'questionText' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'correctAnswer' => 'required',
            'questionScore' => 'required',
            'questionFile' => 'nullable|mimes:jpeg,jpg,png,gif'
        ], $messages);

        $file = $request->file('questionFile');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filename_path = 'storage/files/' . $filename;

        Question::create([
            'questionText' => $request->questionText,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2,
            'answer3' => $request->answer3,
            'correctAnswer' => $request->correctAnswer,
            'questionScore' => $request->questionScore,
            'questionFile' => $filename_path,
        ]);

        Storage::putFileAs('public/files', $file, $filename);

        return redirect()->route('admin.question');
    }

    public function edit($id)
    {
        $question = Question::find($id);
        return view('admin.questionedit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'questionText.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'answer1.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'answer2.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'answer3.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'correctAnswer.required' => 'Pole jest wymagane. Uzupełnij dane.',         
            'questionScore.required' => 'Pole jest wymagane. Uzupełnij dane.',         
        ];

        $request->validate([
            'questionText' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'correctAnswer' => 'required',
            'questionScore' => 'required',
        ], $messages);

        $question = Question::find($id);
        $question->questionText = $request->input('questionText');
        $question->answer1 = $request->input('answer1');
        $question->answer2 = $request->input('answer2');
        $question->answer3 = $request->input('answer3');
        $question->correctAnswer = $request->input('correctAnswer');
        $question->questionScore = $request->input('questionScore');
        $question->save();

        return redirect()->route('admin.question');
    }

    public function destroy(Question $question)
    {
        $question -> delete();

        return redirect()->route('admin.question');
    }
}
