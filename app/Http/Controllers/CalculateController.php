<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculateController extends Controller
{
   //   public function index(){
   //    $a =0;
   //    $b=0;
   //    $results=['c'=>0,'d'=>0,'e'=>0,'f'=>0];

   //      return view('calculate.index');

   //   }
   public function index()
   {
      $a = 0;
      $b = 0;
      $results = [
         'c' => 0,
         'd' => 0,
         'e' => 0,
         'f' => 0
      ];

      return view('calculate.index', [
         'a' => $a,
         'b' => $b,
         'results' => $results
      ]);
   }

   public function calculate(Request $request)
   {
      $a = $request->input('a');
      $b = $request->input('b');

      $results = DB::select(
         'CALL USP_Calculate(?,?,@c,@d,@e,@f)',
         [$a, $b]
      );
     $calculatedValues = DB::select(
    'SELECT @c AS c, @d AS d, @e AS e, @f AS f'
);

      return view('calculate.index', ['results' => (array)$calculatedValues[0], 'a' => $a, 'b' => $b]);
   }
}
