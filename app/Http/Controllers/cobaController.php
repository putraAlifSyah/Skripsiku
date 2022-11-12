<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class cobaController extends Controller
{
    public function tambahColomn(){
        Route::get('user-data', function() {
            $model = App\User::query();
         
            return DataTables::eloquent($model)
                        ->addColumn('intro', 'Hi {{$name}}!')
                        ->toJson();
        });

        return redirect('/admin/datakriteria')->with('status', 'Data telah berhasil dihapus');
    }
}
