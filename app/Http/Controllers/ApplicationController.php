<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Services\ApplicationService;

class ApplicationController extends Controller
{
    protected ApplicationService $service;

    public function __construct(ApplicationService $service)
    {
        $this->service = $service;
    }

    /**
     * إنشاء طلب جديد بعد تطبيق قواعد التحقق
     */
    public function store(ApplicationRequest $request)
    {
        $application = $this->service->createApplication($request->validated());

        return response()->json([
            'message' => 'تم إنشاء الطلب بنجاح',
            'data'    => $application,
        ]);
    }
}








