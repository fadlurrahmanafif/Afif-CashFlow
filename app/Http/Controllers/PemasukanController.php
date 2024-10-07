<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PemasukanController extends Controller
{

    public function view(Request $request)
    {
        $keyword = $request->keyword;
        
        $data = Pemasukan:: where('keterangan','LIKE','%'.$keyword.'%')
        ->orWhere('nominal','LIKE','%'.$keyword.'%')
        ->orWhere('tanggal','LIKE','%'.$keyword.'%')
        ->paginate(5);
        return view('pemasukan',["data"=>$data],['halaman' => 'pemasukan'] );
    }

    public function create()
    {
        $data = Pemasukan::all();
           return view('pemasukan-add',["data"=>$data],['halaman' => 'pemasukan-add'] );
    }

    public function add (Request $request)
    {
    
        $data=Pemasukan::create( $request->all() );

  if( $request){
    Session::flash('status','success');
    Session::flash('message','add new data succes!');
}

        return redirect('/pemasukan');
    }

    public function edit (Request $request,$id)
    {
        $data = Pemasukan::findOrFail($id);
        return view('pemasukan-edit',["data"=>$data],['halaman' => 'pemasukan-edit']);
    }

    public function update (Request $request,$id){
        $data = Pemasukan::findOrFail($id);
        $data->update($request->all());
        return redirect('/pemasukan');
    }

//    public function delete($id){
//     $data = Pemasukan::findOrFail($id);
//     return view('pemasukan-delete',["data"=>$data],['halaman' => 'pemasukan-delete']);
//    }

   public function destroy($id)
   {
    $deletedPemasukan = Pemasukan::findOrFail($id);
    $deletedPemasukan->delete();
    if( $deletedPemasukan){
        Session::flash('status','danger');
        Session::flash('message',value: 'delete data succes!');
    }
    return redirect('/pemasukan');
   }










//         $validator = Validator::make(request()->all(),[
//             'tanggal'=>'required' ,
//             'keterangan'=> 'required' ,
//             'nominal'=> 'required',
//         ],[
//             'tanggal.required'=> 'Tanggal wajib di isi',
//             'keterangan.required'=> 'Keterangan wajib di isi',
//             'nominal.required'=> 'Nominal wajib di isi',
//         ]);

//         if ($validator->fails()) {
//             return back()->with('pesan',$validator->messages()->get('*'));
//     }
//     Pemasukan::create([
//         'tanggal'=> request()->input('tanggal'),
//         'keterangan'=> request()->input('keterangan'),
//         'nominal'=> request()->input('nominal'),
//     ]);

//     return redirect('/history-pemasukan');
//   }


}