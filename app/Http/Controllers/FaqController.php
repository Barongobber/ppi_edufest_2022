<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    public function read() {
        return Faq::all();
    }

    public function insert(Request $request) {
        $this->validateFaq($request);

        $check = Faq::where('question', $request->question)->first();
        if ($check) {
            return response()->json(['error' => 'Sorry, cannot insert the same question as the existing one'], 400);
        }
        
        $faqData = $request->only('question', 'answer');
        $faq = Faq::create($faqData);

        return response()->json($faq, 201);
    }

    public function update($id, Request $request) {
        $this->validateFaq($request, $id);

        $faq = Faq::findOrFail($id);
        $faq->update($request->only('question', 'answer'));

        return response()->json([
            'faq' => [
                'id' => $faq->id,
                'question' => $faq->question,
                'answer' => $faq->answer
            ]
        ]);
    }

    public function delete($id) {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return response()->json(['response' => 'Success to delete']);
    }

    private function validateFaq(Request $request, $id = null) {
        $uniqueRule = $id ? Rule::unique('faqs')->ignore($id) : 'unique:faqs';

        $request->validate([
            'question' => ['required', 'string', $uniqueRule],
            'answer' => ['required', 'string']
        ]);
    }
}
