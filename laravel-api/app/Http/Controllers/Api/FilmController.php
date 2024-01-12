<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Validator;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Film::orderby('judul','asc')->get();
         return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan',
            'data'=>$data
         ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataFilm = new Film;
        $rules = [
            'judul' => 'required',
            'pembuat' => 'required',
            'tanggal_upload' => 'required|date'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message' => 'gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }
        $dataFilm->judul = $request->judul;
        $dataFilm->pembuat = $request->pembuat;
        $dataFilm->tanggal_upload = $request->tanggal_upload;

        $post = $dataFilm->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Film::find($id); 
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$data
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataFilm = Film::find($id);
        if(empty($dataFilm)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $rules = [
            'judul' => 'required',
            'pembuat' => 'required',
            'tanggal_upload' => 'required|date'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message' => 'gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }
        $dataFilm->judul = $request->judul;
        $dataFilm->pembuat = $request->pembuat;
        $dataFilm->tanggal_upload = $request->tanggal_upload;

        $post = $dataFilm->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses melakukan update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataFilm = Film::find($id);
        if(empty($dataFilm)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        
        $post = $dataFilm->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses menghapus data'
        ]);
    }
}
