<?php

namespace App\Http\Controllers;
use App\Models\House;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use View;
use DB;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resident::latest()->paginate(10);
    }

    public function show_all()
    {
        return Resident::all();
    }

    public function resident_number()
    {
        $residentCount = Resident::count();
        $userCount = User::count();
        
        $data = [
            'residentCount' => $residentCount,
            'userCount' => $userCount
        ];

        return $data;
    }

    public function resident_house($id)
    {
        $resident = Resident::where('house_id', '=', $id)->orderBy('family_no')->get();
        $house_info = House::where('id', '=', $id)->get();
        $fam_info = DB::table('residents')
                 ->select('family_no', DB::raw('count(*) as total'))
                 ->groupBy('family_no')
                 ->where('house_id', '=', $id)
                 ->get();
        $data = [
            'residents' => $resident,
            'house_info' => $house_info,
            'fam_info' => $fam_info
        ];
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'residents.*.first_name' => 'required',
            'residents.*.last_name' => 'required',
            'residents.*.gender' => 'required',
            'residents.*.birth_date' => 'required',
            'residents.*.solo_parent' => 'required',
            'residents.*.family_no' => 'required',
            'house_info.house_number' => 'required|unique:houses,house_number',
            'house_info.street' => 'required',
            'house_info.sitio' => 'required',
        ]);

        $house_id = House::create($request->input('house_info'));
        $house_id = $house_id->id;

        foreach ($request->input('residents') as $key=>$value){
            $data[] = [
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'middle_name' => $value['middle_name'],
                'gender' => $value['gender'],
                'birth_date' => $value['birth_date'],
                'contact_no' => $value['contact_no'],
                'solo_parent' => $value['solo_parent'],
                'pwd' => $value['pwd'],
                'ethnicity' => $value['ethnicity'],
                'religion' => $value['religion'],
                'school' => $value['school'],
                'family_no' => $value['family_no'],
                'house_id' => $house_id
            ];
        }

        Resident::insert($data);


    }

    public function add_resident(Request $request)
    {
        $this->validate($request, [
            'resident.first_name' => 'required',
            'resident.last_name' => 'required',
            'resident.birth_date' => 'required',
            'resident.family_no' => 'required'
        ]);

        $data [] = [
            'first_name' => $request['resident']['first_name'],
            'last_name' => $request['resident']['last_name'],
            'middle_name' => $request['resident']['middle_name'],
            'gender' =>  $request['resident']['gender'],
            'contact_no' =>  $request['resident']['contact_no'],
            'solo_parent' =>  $request['resident']['solo_parent'],
            'pwd' =>  $request['resident']['pwd'],
            'ethnicity' =>  $request['resident']['ethnicity'],
            'religion' =>  $request['resident']['religion'],
            'school' =>  $request['resident']['school'],
            'birth_date' => $request['resident']['birth_date'],
            'family_no' => $request['resident']['family_no'],
            'house_id' => $request['house_info'][0]['id']
        ];
        
        Resident::insert($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Resident::findOrFail($id);
        return $resident;
    }

    //Reports
    public function business(Request $request)
    {

        $data = [
            'resident' => json_decode($request->residents),
            'business' => json_decode($request->business)
        ];

        $house = House::findOrFail($data['resident']->house_id);
        $house_info = [
            'house' => $house,
        ];
        return view('printable.business-clearance')->with('data', $data)->with('house', $house_info);
    }

    public function medical(Request $request)
    {

        $data = [
            'resident' => json_decode($request->residents),
            'med' => json_decode($request->treated_date)
        ];


        return view('printable.medical-certificate')->with('data', $data);
    }

    public function notmarried(Request $request)
    {

        $data = [
            'resident' => json_decode($request->residents),
            'notmarried' => json_decode($request->notmarried)
        ];

        $house = House::findOrFail($data['resident']->house_id);
        $house_info = [
            'house' => $house,
        ];

        return view('printable.not-married')->with('data', $data)->with('house', $house_info);
    }

    public function indigency(Request $request)
    {

        $data = [
            'resident' => json_decode($request->residents)
        ];

        $house = House::findOrFail($data['resident']->house_id);
        $house_info = [
            'house' => $house,
        ];


        return view('printable.indigency')->with('data', $data)->with('house', $house_info);
    }

    //End Reports
    
    public function print($id)
    {
        $resident = Resident::find($id);
        return view('printable.example')->with('data', $resident);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
        $this->validate($request, [
            'data.first_name' => 'required',
            'data.last_name' => 'required',
            'data.birth_date' => 'required'
        ]);
        Resident::where('id',$request->data['id'])->update($request->data);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        Resident::where('id',$resident->id)->delete();
    }
}
