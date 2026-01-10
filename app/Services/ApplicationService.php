<?php

namespace App\Services;

use App\Models\Application;
use App\Models\Student;
use App\Models\UniversityMajor;
use App\Domain\ApplicationRules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApplicationService
{
    /**
     * إنشاء الطلب بعد تطبيق قواعد التحقق
     */
    public function createApplication(array $data): Application
    {
        return DB::transaction(function () use ($data) {

            // 1) إنشاء أو استرجاع الطالب
            $student = Student::findOrCreateByFullName($data);

            $studentId = $student->id;
            $majorId   = $data['university_major_id'];

            $major = UniversityMajor::findOrFail($majorId);

            // 2) القواعد
            ApplicationRules::ensureNoActiveOrBlocked($studentId);
            ApplicationRules::ensureNotRejectedRecently($studentId, $majorId);
            ApplicationRules::ensureMeetsAdmissionRate($student, $major);

            // 3) إنشاء الطلب — المستخدم الحالي
            return Application::create([
    'student_id'          => $studentId,
    'university_major_id' => $majorId,
    'user_id'             => Auth::id(),
    'status'              => 'processing',
    'is_active'           => true,
    'application_code'    => $this->generateUniqueCode(), // ← هنا نضيف الكود
]);
        });
    }
    private function generateUniqueCode(): string
{
    do {
        $code = strtoupper(Str::random(13)); // مثال: AB4D9C8ZQ2
    } while (Application::where('application_code', $code)->exists());

    return $code;
}
}
