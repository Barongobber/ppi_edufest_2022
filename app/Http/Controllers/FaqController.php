<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    public function read() {
        $faqs = Faq::all();
        return $faqs;
    }

    public function insert() {
        request()->validate([
            'question' => ['required', 'string'],
            'answer' => ['required', 'string']
        ]);

        $check = Faq::where('question', request('question'))->first();
        if ($check)
            abort(400, 'Sorry, cannot insert the same question as the existing one');
        
        $faqData = [
            'question' => request('question'),
            'answer' => request('answer')
        ];
        $faq = Faq::create($faqData);

        return $faq;
    }

    public function update($id) {
        request()->validate([
            'question' => [
                'required', 
                'string',
                Rule::unique('faqs')->ignore($id)
            ],
            'answer' => ['required', 'string']
        ]);

        $faq = Faq::where('id', $id)->first();
        
        $faqData = request()->only([
            'question',
            'answer'
        ]);

        $faq->update($faqData);

        $response = [
            "faq" => [
                'id' => $faq->id,
                'question' => $faq->question,
                'answer' => $faq->answer
            ]
        ];

        return $response;
    }

    public function delete($id) {
        $faq = Faq::where('id', $id)->delete();
        $msg = "Success to delete";
        return [
            'response' => $msg
        ];
    }
}
