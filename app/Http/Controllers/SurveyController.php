<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use DataTables;

class SurveyController extends Controller
{
    public function index(){
        return view('survey.index');
    }

    public function create(){
        return view('survey.create');
    }


    public function store(Request $request)
    {
         $data = $request->validate([
        'name' => 'required|string|max:255',
        'mobile' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'satisfaction' => 'required|string|max:255',
        'content_satisfaction' => 'required|string|max:255',
        'note' => 'nullable|string|max:255',




    ],[
        'name.required' => 'الاسم مطلوب.',
        'name.string' => 'يجب أن يكون الاسم نصًا.',
        'name.max' => 'يجب ألا يزيد الاسم عن 255 حرفًا.',

        'mobile.required' => 'رقم الجوال مطلوب.',
        'mobile.string' => 'يجب أن يكون رقم الجوال نصًا.',
        'mobile.max' => 'يجب ألا يزيد رقم الجوال عن 255 حرفًا.',

        'category.required' => 'الفئة مطلوب.',
        'category.string' => 'يجب أن يكون الفئة نصًا.',
        'category.max' => 'يجب ألا يزيد الفئة عن 255 حرفًا.',

        'satisfaction.required' => 'مطلوب تحديد مستوى الرضا.',
        'satisfaction.string' => 'يجب أن يكون مستوى الرضا نصًا.',
        'satisfaction.max' => 'يجب ألا يزيد مستوى الرضا عن 255 حرفًا.',

        'content_satisfaction.required' => 'مطلوب تحديد رضاك عن المحتوى.',
        'content_satisfaction.string' => 'يجب أن يكون رضاك عن المحتوى نصًا.',
        'content_satisfaction.max' => 'يجب ألا يزيد رضاك عن المحتوى عن 255 حرفًا.',

        'note.string' => 'يجب أن تكون الملاحظة نصًا.',
        'note.max' => 'يجب ألا تزيد الملاحظة عن 255 حرفًا.',
    ]);

        Survey::create([
            'name' => $data['name'],
            'mobile' => $request->full,
            'category' => $data['category'],
            'satisfaction' => $data['satisfaction'],
            'content_satisfaction' => $data['content_satisfaction'],
            'note' => $data['note'] ?? null,
        ]);

        return redirect()->route('survey.success');
    }

     public function getData(Request $request)
    {
            $data = Survey::all();
            return Datatables::of($data)

                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->make(true);
    }

     public function edit($id)
    {
        $survey = Survey::findOrFail($id);

        return view('survey.edit', compact('survey'));
    }

    public function update(Request $request , $id)
    {
       $survey = Survey::findOrFail($id);
        $data = $request->validate([
        'name' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'country' => 'required|string|max:100',
        'contact_number' => [
        'nullable',
        'string',
        'max:255',
        'regex:/^([0-9]{6,20}|[^@\s]+@[^@\s]+\.[^@\s]+)$/',
        Rule::unique('surveys', 'contact_number')->ignore($survey->id),
        ],
        'overall_experience' => 'required|in:Excellent,Good,Average,Poor',
        'interests' => 'required|array',
        'interests.*' => 'string|max:255',
        'wants_more_info' => 'nullable|boolean',
         'wants_more_info' => 'nullable|boolean',
        'email' => [
            'nullable',
            'email',
            'required_if:wants_more_info,1',
            Rule::unique('surveys', 'email')->ignore($survey->id),
        ],
        'collaboration_types' => 'required|array',
        'collaboration_types.*' => 'string|max:255',
        'comments' => 'nullable|string|max:1000',
        ], [
        'name.required' => 'Name is required.',
        'name.string' => 'Name must be a string.',
        'name.max' => 'Name may not be greater than 255 characters.',

        'company.required' => 'Company is required.',
        'company.string' => 'Company must be a string.',
        'company.max' => 'Company may not be greater than 255 characters.',

        'country.required' => 'Country is required.',
        'country.string' => 'Country must be a string.',
        'country.max' => 'Country may not be greater than 100 characters.',


        'overall_experience.required' => 'Please rate your overall experience.',
        'overall_experience.in' => 'The selected overall experience is invalid.',

        'interests.required' => 'Please select at least one interest.',
        'interests.array' => 'The interests must be an array.',
        'interests.*.string' => 'Each interest must be a valid string.',
        'interests.*.max' => 'Each interest may not be greater than 255 characters.',

        'wants_more_info.boolean' => 'Invalid value for wants_more_info.',

        'email.email' => 'Please enter a valid email address.',
        'email.required_if' => 'Email is required if you want more information.',

        'collaboration_types.required' => 'Please select at least one collaboration type.',
        'collaboration_types.array' => 'The collaboration types must be an array.',
        'collaboration_types.*.string' => 'Each collaboration type must be a valid string.',
        'collaboration_types.*.max' => 'Each collaboration type may not be greater than 255 characters.',

        'comments.string' => 'Comments must be a string.',
        'comments.max' => 'Comments may not be greater than 1000 characters.',
    ]);

        $survey->Update([
            'name' => $data['name'],
            'company' => $data['company'],
            'country' => $data['country'],
            'contact_number' => $request->contact_number ,
            'overall_experience' => $data['overall_experience'] ?? null,
            'interests' => $data['interests'] ?? [],
            'wants_more_info' => $request->has('wants_more_info'),
            'email' => $data['email'] ?? null,
            'collaboration_types' => $data['collaboration_types'] ?? [],
            'comments' => $data['comments'] ?? null,
        ]);
        return redirect()->route('show-survey')->with('success','update Successfuly');
    }

    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();

        return response()->json(['success' => 'Survey deleted successfully']);
    }
}
