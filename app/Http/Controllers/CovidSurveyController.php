<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CovidSurvey;
use Illuminate\Support\Facades\Validator;

class CovidSurveyController extends Controller
{

    public function index(Request $request)
    {
        $covidSurveys = CovidSurvey::latest()->paginate($request->input('per_page', 25));
        // return view('covid-survey.index', compact('covidSurveys'));
        return response()->json($covidSurveys, 200);
    }

    public function store(Request $request)
    {
        $request->date_of_birth ? $request->merge(['date_of_birth' => date('Y-m-d', strtotime($request->dob))]) : null;
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Name is required, string, max length 255
            'email' => 'required|email|max:255|unique:covid_survey,email', // Email is required, must be valid, unique in form_data table
            'date_of_birth' => 'required|date|before:today', // Optional, must be a valid date before today
            'division' => 'required|string|max:255', // Optional, string, max length 255
            'gender' => 'required|in:Male,Female,Others', // Required, must be one of the specified values
            'vaccine_doses' => 'nullable|integer|min:0|max:4', // Optional, integer between 0 and 4
            'problems' => 'nullable|string', // Optional, string
            'symptoms' => 'nullable|array'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error_message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 400); // HTTP status code for unprocessable entity
        }

        if ($request->vaccine_doses > 0 && $request->has('vaccinesTaken')) {
            for ($i = 1; $i <= $request->vaccine_doses; $i++) {
                $request->merge([
                    $i . '_dose_name' => $request->vaccinesTaken[$i - 1]
                ]);
            }
        }

        // Save the data to the database
        $covidSurvey = CovidSurvey::create($request->all());

        return response()->json(['message' => 'Your survey saved successfully. Thanks for you effort.', 'data' => $covidSurvey], 201);
    }
}
