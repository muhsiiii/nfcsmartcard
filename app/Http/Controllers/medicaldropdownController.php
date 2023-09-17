<?php

namespace App\Http\Controllers;

use App\Models\allergyDropdown;
use App\Models\IndustryDropdown;
use App\Models\medicalDropdown;
use App\Models\Profile;
use Illuminate\Http\Request;

class medicaldropdownController extends Controller
{
    public function dropdownSave(Request $request)
    {
        // $dropdownSave = medicalDropdown::create([
        //     'condition' => $request->newcondition
        // ]);

        // if ($dropdownSave) {
        //     $data['success'] = 'success';
        // } else {
        //     $data['error'] = 'error';
        // }
        // echo json_encode($data);

        $data = [];

        if (Profile::where('conditions', $request->newcondition)->exists()) {L
            $data['error'] = 'Allergy already exists';
        } else {
            medicalDropdown::create([
                'condition' => $request->newcondition
            ]);
            $data['success'] = 'condition added successfully';
        }

        return response()->json($data);
    }



    public function getConditions(Request $req)
    {
        $dropdownDatas = medicalDropdown::all();
        foreach ($dropdownDatas as $j) {
            echo "<option value=" . $j->condition . " selected>" . $j->condition . "</option>";
        }
    }




    public function dropdownallergySave(Request $request)
    {
        $data = [];

        if (Profile::where('allergies', $request->newallergy)->exists()) {
            $data['error'] = 'Allergy already exists';
        } else {
            allergyDropdown::create([
                'allergy' => $request->newallergy
            ]);
            $data['success'] = 'Allergy added successfully';
        }

        return response()->json($data);
    }


    public function getAllergy(Request $req)
    {
        $dropdownallergyDatas = allergyDropdown::all();
        foreach ($dropdownallergyDatas as $j) {
            echo "<option value=" . $j->allergy . " selected>" . $j->allergy . "</option>";
        }
    }

    public function dropdownIndustrySave(Request $request)
    {
        $data = [];

        if (Profile::where('industry', $request->newindustry)->exists()) {
            $data['error'] = 'Allergy already exists';
        } else {
            IndustryDropdown::create([
                'industry' => $request->newindustry
            ]);

            $data['success'] = 'Allergy added successfully';
        }

        return response()->json($data);
    }

    public function getIndustry(Request $req)
    {
        $dropdownindustryDatas = IndustryDropdown::all();
        foreach ($dropdownindustryDatas as $j) {
            echo "<option value=" . $j->industry . " selected>" . $j->industry . "</option>";
        }
    }
}
