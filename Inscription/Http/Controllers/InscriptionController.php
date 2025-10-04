<?php

namespace Modules\Inscription\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Inscription\Entities\Inscription;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $inscriptions = Inscription::orderBy('id', 'desc')->where('is_preregister',true)->get();
        $attributes = ['id','firstName','lastName','email','address']; 
        $pre=true;
        return view('inscription::index', compact('inscriptions', 'attributes','pre'));
    }
    public function register()
    {
        $inscriptions = Inscription::orderBy('id', 'desc')->where('is_preregister',false)->get();
        $attributes = ['id','firstName','lastName','email','address']; 
        $pre=false;
        return view('inscription::index', compact('inscriptions', 'attributes','pre'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        
        $validator = Validator::make($request->all(), [
            'address' => 'nullable|string',
            'aircraftOwner' => 'nullable|string',
            'aircraftType' => 'nullable|string',
            'cruiseSpeed' => 'nullable|integer',
            'email' => 'nullable|email',
            'firstName' => 'nullable|string',
            'flightHours' => 'nullable|integer',
            'fuelType' => 'nullable|string',
            'hotelRoomType' => 'nullable|string',
            'hourlyConsumption' => 'nullable|integer',
            'lastName' => 'nullable|string',
            'licenseNumber' => 'nullable|string',
            'licenseValidity' => 'nullable|date',
            'nationality' => 'nullable|string',
            'participants' => 'nullable|array',
            'passportNumber' => 'nullable|string',
            'passportValidity' => 'nullable|date',
            'phone' => 'nullable|string',
            'pilotFirstName' => 'nullable|string',
            'pilotLastName' => 'nullable|string',
            'range' => 'nullable|integer',
            'registration' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }
        $data=$request->all();
     
        $flightDetail = Inscription::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $flightDetail,
        ], 201);
    }
    public function complete(Inscription $id){
        try {
            \Mail::to($id->email)->send(new \App\Mail\CompleteInscription($id));
            $mailStatus = 'Mail sent successfully.';
        } catch (\Exception $e) {
            \Log::error('Mail sending failed: ' . $e->getMessage());
            $mailStatus = 'Mail sending failed.';
        }
        $inscriptions = Inscription::orderBy('id', 'desc')->get();
        $attributes = ['id','firstName','lastName','email','address']; 
        $pre=true;

        return view('inscription::index', compact('inscriptions', 'attributes','pre'));
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if($request->licenseValidity){

            $request->merge([
                'licenseValidity' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->licenseValidity)->format('Y-m-d'),
                'passportValidity' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->passportValidity)->format('Y-m-d'),
            ]);
        }
        $validator = Validator::make($request->all(), [
            'address' => 'nullable|string',
            'aircraftOwner' => 'nullable|string',
            'aircraftType' => 'nullable|string',
            'cruiseSpeed' => 'nullable|integer',
            'email' => 'nullable|email',
            'firstName' => 'nullable|string',
            'flightHours' => 'nullable|integer',
            'fuelType' => 'nullable|string',
            'hotelRoomType' => 'nullable|string',
            'hourlyConsumption' => 'nullable|integer',
            'lastName' => 'nullable|string',
            'licenseNumber' => 'nullable',
            'licenseValidity' => 'nullable|date',
            'nationality' => 'nullable|string',
            'participants' => 'nullable|array',
            'passportNumber' => 'nullable|string',
            'passportValidity' => 'nullable|date',
            'phone' => 'nullable|string',
            'pilotFirstName' => 'nullable|string',
            'pilotLastName' => 'nullable|string',
            'range' => 'nullable|integer',
            'registration' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }
        $data=$request->all();
        if($request->range){
            $data['hotelRoomType']=json_encode($request->rooms);
            $data['is_preregister'] = false;
        }

        $flightDetail = Inscription::create($data);
    
        try {
            // Send the email
            if($request->range){
                
                \Mail::to($request->email)->send(new \App\Mail\inscriptionDone( $flightDetail));
                $mailStatus = 'Mail sent successfully.';
                $recipients = [
                    'fadhelyacoub@gmail.com',
                    'a.ring@bautext.de',
                    'r.elfazaa@perffarma.com',
                    'elien06@yahoo.fr'
                ];
                // $recipients = ["inachet33@gmail.com"];
                \Mail::to($recipients)->send(new \App\Mail\NewRegister($flightDetail));
            }else{

                \Mail::to($request->email)->send(new \App\Mail\FlightDetailsMail($flightDetail));
                $recipients = [
                    'fadhelyacoub@gmail.com',
                    'a.ring@bautext.de',
                    'r.elfazaa@perffarma.com',
                    'elien06@yahoo.fr'
                ];
                // $recipients = ["inachet33@gmail.com"];
             
                \Mail::to($recipients)->send(new \App\Mail\NewRegister($flightDetail));

                $mailStatus = 'Mail sent successfully.';
            }
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            \Log::error('Mail sending failed: ' . $e->getMessage());
            $mailStatus = 'Mail sending failed.';
        }
    
        return response()->json([
            'status' => 'success',
            'data' => $flightDetail,
            'mailStatus' => $mailStatus,
        ], 201);
    }
    

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Inscription $id)
    {

        return response()->json([
            'status' => 'success',
            'data' =>$id,
        ], 200);
    }
    public function showBlade(Inscription $id)
    {
        return view('inscription::details', compact('id'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('inscription::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Inscription $id)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'nullable|string',
            'aircraftOwner' => 'nullable|string',
            'aircraftType' => 'nullable|string',
            'cruiseSpeed' => 'nullable|integer',
            'email' => 'nullable|email',
            'firstName' => 'nullable|string',
            'flightHours' => 'nullable|integer',
            'fuelType' => 'nullable|string',
            'hotelRoomType' => 'nullable|string',
            'hourlyConsumption' => 'nullable|integer',
            'lastName' => 'nullable|string',
            'licenseNumber' => 'nullable|integer',
            'licenseValidity' => 'nullable|date',
            'nationality' => 'nullable|string',
            'participants' => 'nullable|array',
            'passportNumber' => 'nullable|string',
            'passportValidity' => 'nullable|date',
            'phone' => 'nullable|string',
            'pilotFirstName' => 'nullable|string',
            'pilotLastName' => 'nullable|string',
            'range' => 'nullable|integer',
            'registration' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 422);
        }
    
        try {
            $data = $request->all();
            $data['is_preregister'] = false;
            $id->update($data);
            // Send the email
            \Mail::to($request->email)->send(new \App\Mail\inscriptionDone($id));
            $mailStatus = 'Mail sent successfully.';
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            \Log::error('Mail sending failed: ' . $e->getMessage());
            $mailStatus = 'Mail sending failed.';
        }
    
        return response()->json([
            'status' => 'success',
            'data' => $id->fresh(), // Return the updated instance
            'mailStatus' => $mailStatus,
        ], 200); // Use 200 for successful update
    }
    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
