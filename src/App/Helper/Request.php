<?php

namespace Sarma\MisForPrabhatElectronics\App\Helper;
use Illuminate\Http\Request;

class Request
{
    // public function __construct()
    // {

public function stockitem(Request $request)
{
    $name = $request->input('name');   // get POST field
    $email = $request->email;          // shortcut

    return $name;
}
    }
// }