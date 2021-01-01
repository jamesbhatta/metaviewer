<?php

namespace App\Http\Controllers;

use App\Services\MetaServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetaController extends Controller
{
    protected $metaServiceProvider;

    public function __construct(MetaServiceProvider $metaServiceProvider)
    {
        $this->metaServiceProvider = $metaServiceProvider;
    }

    public function __invoke(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'url' => 'required|url'
        ]);

        // Return JSON response in case of validation failure
        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        try {
            $data = $this->metaServiceProvider->getMetas($request->url);
            return response()->json($data);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
