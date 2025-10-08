<?php

namespace App\Http\Controllers;

use App\Models\PartnerSurvey;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Validation\Rule;


class PartnerSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return view('partner_survey.index');
    }

    public function create(){
        return view('partner_survey.create');
    }
    public function getData(Request $request)
    {
            $data = PartnerSurvey::all();
            return Datatables::of($data)
                
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->make(true);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            //'contact_person' => 'nullable|string|max:255',
            'contact_person' => [
            'nullable',
            'string',
            'max:255',
            'regex:/^([0-9]{6,20}|[^@\s]+@[^@\s]+\.[^@\s]+)$/',
            Rule::unique('partner_surveys', 'contact_person'),
            ],
            'exhibition_name_location' => 'required|string|max:255',
            'exhibition_date' => 'required|string|max:255',

            'saudi_pavilion_marketing_rating' => 'required|string',
            'marketing_material_usefulness' => 'required|string',
            'marketing_helped_attract_visitors' => 'required|string',
            'marketing_suggestions' => 'required|string',

            'stand_design_rating' => 'required|string',
            'stand_space_suitability' => 'required|string',
            'stand_requirements_fulfilled' => 'required|string',
            'stand_improvement_suggestions' => 'required|string',

            'logistics_rating' => 'required|string',
            'materials_delivered_on_time' => 'required|string',
            'logistics_issues' => 'required|string',

            'communication_rating' => 'required|string',
            'team_support_rating' => 'required|string',
            'support_comments' => 'required|string',

            'networking_rating' => 'required|string',
            'sales_leads_rating' => 'required|string',
            'brand_exposure_rating' => 'required|string',
            'business_goals_achieved' => 'required|string',
            'key_outcomes' => 'required|string',

            'future_improvements' => 'required|string',
            'additional_services' => 'required|string',
            'interested_in_future_exhibitions' => 'required|string',
            'signed_during' => 'required',

        ]);

        PartnerSurvey::create($data);

        return redirect()->back()->with('success', '');
    }

    public function edit($id)
    {
        $PartnerSurvey = PartnerSurvey::findOrFail($id);
        
        return view('partner_survey.edit', compact('PartnerSurvey'));
    }

    public function update(Request $request , $id)
    {
       $survey = PartnerSurvey::findOrFail($id);
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
           // 'contact_person' => 'nullable|string|max:255',
            'contact_person' => [
            'nullable',
            'string',
            'max:255',
            'regex:/^([0-9]{6,20}|[^@\s]+@[^@\s]+\.[^@\s]+)$/',
            Rule::unique('partner_surveys', 'contact_person')->ignore($survey->id),
            ],
            'exhibition_name_location' => 'required|string|max:255',
            'exhibition_date' => 'required|string|max:255',

            'saudi_pavilion_marketing_rating' => 'required|string',
            'marketing_material_usefulness' => 'required|string',
            'marketing_helped_attract_visitors' => 'required|string',
            'marketing_suggestions' => 'required|string',

            'stand_design_rating' => 'required|string',
            'stand_space_suitability' => 'required|string',
            'stand_requirements_fulfilled' => 'required|string',
            'stand_improvement_suggestions' => 'required|string',

            'logistics_rating' => 'required|string',
            'materials_delivered_on_time' => 'required|string',
            'logistics_issues' => 'required|string',

            'communication_rating' => 'required|string',
            'team_support_rating' => 'required|string',
            'support_comments' => 'required|string',

            'networking_rating' => 'required|string',
            'sales_leads_rating' => 'required|string',
            'brand_exposure_rating' => 'required|string',
            'business_goals_achieved' => 'required|string',
            'key_outcomes' => 'required|string',

            'future_improvements' => 'required|string',
            'additional_services' => 'required|string',
            'interested_in_future_exhibitions' => 'required|string',
        ]);
        $survey->Update($data);
        return redirect()->route('show-partner-survey')->with('success','update Successfuly');
    }

    

   public function destroy($id)
    {
        $survey = PartnerSurvey::findOrFail($id);
        $survey->delete();

        return response()->json(['success' => 'Survey deleted successfully']);
    }
}
