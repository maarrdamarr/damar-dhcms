<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// EMPLOYEE
use App\Http\Controllers\Employee\ProfileController as EmpProfileController;
use App\Http\Controllers\Employee\AttendanceController as EmpAttendanceController;
use App\Http\Controllers\Employee\LeaveController as EmpLeaveController;
use App\Http\Controllers\Employee\SalaryController as EmpSalaryController;

// MANAGER
use App\Http\Controllers\Manager\TeamController;
use App\Http\Controllers\Manager\ApprovalController;
use App\Http\Controllers\Manager\PerformanceController;
use App\Http\Controllers\Manager\ReportController;

// HR
use App\Http\Controllers\Hr\RecruitmentController;
use App\Http\Controllers\Hr\EmployeeController as HrEmployeeController;
use App\Http\Controllers\Hr\PayrollController;
use App\Http\Controllers\Hr\TrainingController;

// ADMIN
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\AuditController;

Route::get('/', function () {
    return view('welcome');
});

// ===== routes bawaan breeze (profile) =====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===== routes utama aplikasi =====
Route::middleware('auth')->group(function () {

    // DASHBOARD UTAMA (pilih view per role)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ========= EMPLOYEE =========
    Route::prefix('employee')->name('employee.')->group(function () {
        Route::get('/', [EmpProfileController::class, 'index'])->name('dashboard');
        Route::get('/profile', [EmpProfileController::class, 'index'])->name('profile');

        Route::get('/attendance', [EmpAttendanceController::class, 'index'])->name('attendance');
        Route::post('/attendance', [EmpAttendanceController::class, 'store'])->name('attendance.store');

        Route::get('/leaves', [EmpLeaveController::class, 'index'])->name('leaves');
        Route::post('/leaves', [EmpLeaveController::class, 'store'])->name('leaves.store');

        Route::get('/salary-slips', [EmpSalaryController::class, 'index'])->name('salary');
    });

    // ========= MANAGER =========
    Route::prefix('manager')->name('manager.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('dashboard');
        Route::get('/team', [TeamController::class, 'index'])->name('team');

        Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals');
        Route::post('/approvals/{leave}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
        Route::post('/approvals/{leave}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');

        Route::get('/performance', [PerformanceController::class, 'index'])->name('performance');
        // kalau nanti form penilaian mau jalan:
        // Route::post('/performance', [PerformanceController::class, 'store'])->name('performance.store');

        Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    });

    // ========= HR =========
    Route::prefix('hr')->name('hr.')->group(function () {
        Route::get('/', [RecruitmentController::class, 'index'])->name('dashboard');

        // list + form lowongan
        Route::get('/recruitments', [RecruitmentController::class, 'index'])->name('recruitments');
        // form di view tadi ngarah ke /hr/recruitments -> POST → kita tambahkan:
        Route::post('/recruitments', [RecruitmentController::class, 'storeJob'])->name('recruitments.store');

        Route::get('/employees', [HrEmployeeController::class, 'index'])->name('employees');

        Route::get('/payrolls', [PayrollController::class, 'index'])->name('payrolls');
        Route::post('/payrolls/generate', [PayrollController::class, 'generate'])->name('payrolls.generate');

        Route::get('/trainings', [TrainingController::class, 'index'])->name('trainings');
        // di view training kita juga buat form POST, jadi tambahkan:
        Route::post('/trainings', [TrainingController::class, 'store'])->name('trainings.store');
    });

    // ========= ADMIN =========
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('dashboard');

        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');

        Route::get('/settings', [SystemController::class, 'index'])->name('settings');
        // view settings kita pakai form POST -> tambahkan
        Route::post('/settings', [SystemController::class, 'store'])->name('settings.store');

        Route::get('/backups', [BackupController::class, 'index'])->name('backups');
        Route::get('/audits', [AuditController::class, 'index'])->name('audits');
    });

});

require __DIR__.'/auth.php';
