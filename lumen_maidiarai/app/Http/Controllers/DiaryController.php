<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiaryController extends Controller
{   
    public function index(){
        return \App\Diary::all();
    }

    public function detail($id){
        $diary = \App\Diary::find($id);

        if(empty($diary)){
            return[
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];    
        }
        return[
            'status' => 'success',
            'result' => $diary
        ];
    }

    public function read(Request $request){
        $result = \App\Diary::all();
        return[
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'judul' => 'required|max:150',
            'keterangan' => 'required|string',
        ]);

        if ($validation->fails())
        {
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $result = \App\Diary::create($request->all());
        if ($result){
            return [
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
            'result' => $result];
        } else{
            return[
            'status' => 'error',
            'message' => 'Data gagal ditambahkan',
            'result' => null];
        }
    }

    public function update(Request $request, $id){
        $validation = Validator::make($request->all(), [
            'judul' => 'required|max:150',
            'keterangan' => 'required|string',
        ]);

        if ($validation->fails())
        {
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $diary = \App\Diary::find($id);
        if (empty($diary)){
            return [
            'status' => 'error',
            'message' => 'Data tidak ditemukan',
            'result' => null];
        }
        $result = $diary->update($request->all());
        if ($result){
            return [
            'status' => 'success',
            'message' => 'Data berhasil diubah',
            'result' => $result];
        } else{
            return[
            'status' => 'error',
            'message' => 'Data gagal diubah',
            'result' => null];
        }   
    }

    public function delete(Request $request, $id){
        $diary = \App\Diary::find($id);
        if (empty($diary)){
            return [
            'status' => 'error',
            'message' => 'Data tidak ditemukan',
            'result' => null];
        }
        $result = $diary->delete($id);
        if ($result){
            return [
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
            'result' => $result];
        } else{
            return[
            'status' => 'error',
            'message' => 'Data gagal dihapus',
            'result' => null];
        }   
    }
    
}
