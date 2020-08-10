<?php

namespace App\Http\Controllers;

use App\MasterFlag;
use Illuminate\Http\Request;
use DataTables;

class MasterFlagController extends Controller
{
    public function index(Request $req)
    {
        // AJAX
        if($req->ajax())
        {
            $data = MasterFlag::orderBy('parent', 'ASC')
            ->orderBy('level', 'ASC')
            ->get();

            return DataTables::of($data)
                    // ->addIndexColumn()
                    // ->editColumn('created_at', function ($user) {
                    //     return $user->created_at ? $user->created_at->format('m-d-Y') : '';
                    // })
                    ->addColumn('action', function($data){
                        $button = '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="'. route('flag.destroy', $data->id) .'" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $record = MasterFlag::orderBy('parent', 'DESC')
        ->orderBy('level', 'DESC')
        ->get();

        return view('master.flag.index', compact('record'));
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'parent'        => 'required',
            'level'         => 'required|unique:master_flags,level,NULL,id,parent,' . $req->parent,
            'description'   => 'required',
        ]);

        $data = MasterFlag::firstOrCreate([
            'parent'        => $req->parent,
            'level'         => $req->level,
            'description'   => $req->description
        ]);

        return redirect()->back()->with(['success' => 'Flag: ' . $data->description . ' Ditambahkan']);
    }

    public function destroy($id)
    {
        $role = MasterFlag::findOrFail($id);

        if($role->delete()){
            return response()->json(['code' => 'success', 'msg' => 'Data berhasil di hapus']);
        }else{
            return response()->json(['code' => 'error', 'msg' => 'Terjadi kesalahan!']);
        }
    }
}
