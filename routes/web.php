<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Employee\ProfileController as EmpProfileController;
use App\Http\Controllers\Employee\AttendanceController as EmpAttendanceController;
use App\Http\Controllers\Employee\LeaveController as EmpLeaveController;
use App\Http\Controllers\Employee\SalaryController as EmpSalaryController;
use App\Http\Controllers\Manager\TeamController;
use App\Http\Controllers\Manager\ApprovalController;
use App\Http\Controllers\Manager\PerformanceController;
use App\Http\Controllers\Manager\ReportController;
use App\Http\Controllers\Hr\RecruitmentController;
use App\Http\Controllers\Hr\EmployeeController as HrEmployeeController;
use App\Http\Controllers\Hr\PayrollController;
use App\Http\Controllers\Hr\TrainingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\AuditController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // EMPLOYEE
    Route::prefix('employee')->name('employee.')->group(function () {
        Route::get('/', [EmpProfileController::class, 'index'])->name('dashboard'); // simple
        Route::get('/profile', [EmpProfileController::class, 'index'])->name('profile');
        Route::get('/attendance', [EmpAttendanceController::class, 'index'])->name('attendance');
        Route::post('/attendance', [EmpAttendanceController::class, 'store'])->name('attendance.store');
        Route::get('/leaves', [EmpLeaveController::class, 'index'])->name('leaves');
        Route::post('/leaves', [EmpLeaveController::class, 'store'])->name('leaves.store');
        Route::get('/salary-slips', [EmpSalaryController::class, 'index'])->name('salary');
    });

    // MANAGER
    Route::prefix('manager')->name('manager.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('dashboard');
        Route::get('/team', [TeamController::class, 'index'])->name('team');
        Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals');
        Route::post('/approvals/{leave}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
        Route::post('/approvals/{leave}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');
        Route::get('/performance', [PerformanceController::class, 'index'])->name('performance');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    });

    // HR
    Route::prefix('hr')->name('hr.')->group(function () {
        Route::get('/', [RecruitmentController::class, 'index'])->name('dashboard');
        Route::get('/recruitments', [RecruitmentController::class, 'index'])->name('recruitments');
        Route::get('/employees', [HrEmployeeController::class, 'index'])->name('employees');
        Route::get('/payrolls', [PayrollController::class, 'index'])->name('payrolls');
        Route::post('/payrolls/generate', [PayrollController::class, 'generate'])->name('payrolls.generate');
        Route::get('/trainings', [TrainingController::class, 'index'])->name('trainings');
    });

    // ADMIN
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('dashboard');
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');

        Route::get('/settings', [SystemController::class, 'index'])->name('settings');
        Route::get('/backups', [BackupController::class, 'index'])->name('backups');
        Route::get('/audits', [AuditController::class, 'index'])->name('audits');
    });

});

require __DIR__.'/auth.php';


