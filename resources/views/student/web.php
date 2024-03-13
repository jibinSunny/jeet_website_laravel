<?php
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\BookIssueController;
use App\Http\Controllers\Admin\StudentGroupController;
use App\Http\Controllers\Admin\LibrarymemberController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\HostelMemberController;
use App\Http\Controllers\Admin\HostelController;
use App\Http\Controllers\Admin\HostelCategoryController;
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\ArtController;
use App\Http\Controllers\Admin\AssignmentsController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\CasteController;
use App\Http\Controllers\Admin\ClassReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamQuestionController;
use App\Http\Controllers\Admin\ExamScheduleController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\ExtracurricularController;
use App\Http\Controllers\Admin\FeeTypeController;
use App\Http\Controllers\Admin\FrontSettingController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\HourlyTemplateController;
use App\Http\Controllers\Admin\InstructionController;
use App\Http\Controllers\Admin\LeaveApplicationController;
use App\Http\Controllers\Admin\LeaveApplyController;
use App\Http\Controllers\Admin\LeaveAssignController;
use App\Http\Controllers\Admin\LeaveCategoryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PostingController;
use App\Http\Controllers\Admin\QuestionBankController;
use App\Http\Controllers\Admin\QuestionInstructionController;
use App\Http\Controllers\Admin\QuestionLevelController;
use App\Http\Controllers\Admin\ReligionController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SalaryTemplateController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\StudentAttendanceController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentReportController;
use App\Http\Controllers\Admin\SyllabusController;
use App\Http\Controllers\Admin\TeacherAttendanceController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TimeTableController;
use App\Http\Controllers\Admin\UserAttendanceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserTypeController;
use App\Http\Controllers\InstallerController;
use App\Http\Controllers\Admin\PremotionController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\parent\DashboardController as ControllersParentDashboardController;
use App\Http\Controllers\parent\ParentLoginController;
use App\Http\Controllers\student\DashboardController as StudentDashboardController;
use App\Http\Controllers\student\StudentLoginController;
use App\Http\Controllers\teacher\DashboardController as TeacherDashboardController;
use App\Http\Controllers\parent\DashboardController as ParentDashboardController;
use App\Http\Controllers\teacher\TeacherLoginController;
use App\Http\Controllers\Web\HomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class,'showHome'])->name('showHome');
Route::get('/start', [InstallerController::class, 'start'])->name('start');
Route::any('/purchase', [InstallerController::class, 'purchaseCode'])->name('purchaseCode');
Route::any('/database-check', [InstallerController::class, 'databaseCheck'])->name('databaseCheck');
Route::any('/timezone', [InstallerController::class, 'timeZone'])->name('timeZone');
Route::any('/site', [InstallerController::class, 'site'])->name('site');
Route::any('/done', [InstallerController::class, 'done'])->name('done');
//students resetlink
Route::any('/student/resetlink/{email}/{token}', [HomeController::class, 'studentResetlink'])->name('studentResetlink');
Route::any('/student/resetlink/save', [HomeController::class, 'savestudentResetlink'])->name('savestudentResetlink');
//students login
Route::group(['prefix' => 'student'], function () {
Route::any('/login', [StudentLoginController::class, 'showStudentlogin'])->name('showStudentlogin');
Route::any('/login/process', [StudentLoginController::class, 'Studentlogin'])->name('Studentlogin');
Route::group(['middleware' => 'auth:student'], function () {
// students dashboard
Route::any('/dashboard', [StudentDashboardController::class, 'showDashboard'])->name('studentshowDashboard');
//students profile
Route::any('/dashboard/profile', [StudentDashboardController::class, 'studentProfile'])->name('studentProfile');
Route::any('/dashboard/update/profile', [StudentDashboardController::class, 'studentupdateProfile'])->name('studentupdateProfile');
//students profile password
Route::any('/dashboard/password', [StudentDashboardController::class, 'studentPassword'])->name('studentPassword');
Route::any('/dashboard/update/password', [StudentDashboardController::class, 'updatestudentPassword'])->name('updatestudentPassword');
});
});
//teacher resetlink
Route::any('/teacher/resetlink/{email}/{token}', [HomeController::class, 'teacherResetlink'])->name('teacherResetlink');
Route::any('/teacher/resetlink/save', [HomeController::class, 'saveteacherResetlink'])->name('saveteacherResetlink');
//teacher login
Route::group(['prefix' => 'teacher'], function () {
Route::any('/login', [TeacherLoginController::class, 'showTeacherlogin'])->name('showTeacherlogin');
Route::any('/login/process', [TeacherLoginController::class, 'Teacherlogin'])->name('Teacherlogin');
Route::group(['middleware' => 'auth:teacher'], function () {
    // teacher dashboard
    Route::any('/dashboard', [TeacherDashboardController::class, 'showDashboard'])->name('teacherhsowDashboard');  
});
});   
//parent resetlink
Route::any('/parent/resetlink/{email}/{token}', [HomeController::class, 'parentResetlink'])->name('parentResetlink');
Route::any('/parent/resetlink/save', [HomeController::class, 'saveparentResetlink'])->name('saveparentResetlink');
Route::group(['prefix' => 'parent'], function () {
    Route::any('/login', [ParentLoginController::class, 'showParentlogin'])->name('showParentlogin');
    Route::any('/login/process', [ParentLoginController::class, 'Parentlogin'])->name('Parentlogin');
    Route::group(['middleware' => 'auth:parent'], function () {
        // parent dashboard
        Route::any('/dashboard', [ParentDashboardController::class, 'showDashboard'])->name('parentshowDashboard');  
});
});  


    Route::group(['prefix' => 'admin'], function () {
    Route::any('/login', [LoginController::class, 'showLogin'])->name('showLogin');
    Route::any('/login/process', [LoginController::class, 'login'])->name('login');
    Route::group(['middleware' => 'auth:admin'], function () {
        //dashboard
        Route::any('/dashboard', [DashboardController::class, 'showDashboard'])->name('showDashboard');
        //profile
        Route::any('/dashboard/profile', [DashboardController::class, 'adminProfile'])->name('adminProfile');
        Route::any('/dashboard/update/profile', [DashboardController::class, 'adminupdateProfile'])->name('adminupdateProfile');
        //profile password
        Route::any('/dashboard/password', [DashboardController::class, 'adminPassword'])->name('adminPassword');
        Route::any('/dashboard/update/password', [DashboardController::class, 'updateAdminPassword'])->name('updateAdminPassword');
        //student
        Route::any('/student', [StudentController::class, 'showStudent'])->name('showStudent');
        Route::any('/student/new', [StudentController::class, 'newStudent'])->name('newStudent');
        Route::any('/student/add', [StudentController::class, 'saveStudent'])->name('saveStudent');
        Route::any('/student/edit/{code}', [StudentController::class, 'editStudent'])->name('editStudent');
        Route::any('/student/view/{code}', [StudentController::class, 'viewStudent'])->name('viewStudent');
        Route::any('/student/invite', [StudentController::class, 'inviteStudent'])->name('inviteStudent');
        Route::any('/student/active', [StudentController::class, 'activeStudent'])->name('activeStudent');
        //parent
        Route::any('/parent', [ParentController::class, 'showParent'])->name('showParent');
        Route::any('/parent/new', [ParentController::class, 'newParent'])->name('newParent');
        Route::any('/parent/save', [ParentController::class, 'saveParent'])->name('saveParent');
        Route::any('/parent/edit/{code}', [ParentController::class, 'editParent'])->name('editParent');
        Route::any('/parent/view/{code}', [ParentController::class, 'viewParent'])->name('viewParent');
        Route::any('/parent/invite', [ParentController::class, 'inviteParent'])->name('inviteParent');
        Route::any('/parent/active', [ParentController::class, 'activeParent'])->name('activeParent');
        //Teacher
        Route::any('/teacher', [TeacherController::class, 'showTeacher'])->name('showTeacher');
        Route::any('/teacher/new', [TeacherController::class, 'newTeacher'])->name('newTeacher');
        Route::any('/teacher/save', [TeacherController::class, 'saveTeacher'])->name('saveTeacher');
        Route::any('/teacher/edit/{code}', [TeacherController::class, 'editTeacher'])->name('editTeacher');
        Route::any('/teacher/view/{code}', [TeacherController::class, 'viewTeacher'])->name('viewTeacher');
        Route::any('/teacher/invite', [TeacherController::class, 'inviteTeacher'])->name('inviteTeacher');
        Route::any('/teacher/active', [TeacherController::class, 'activeTeacher'])->name('activeTeacher');
        //user
        Route::any('/user/index', [UserController::class, 'showUser'])->name('showUser');
        Route::any('/user/add', [UserController::class, 'addUser'])->name('addUser');
        Route::any('/user/save', [UserController::class, 'saveUser'])->name('saveUser');
        Route::any('/user/edit/{code}', [UserController::class, 'editUser'])->name('editUser');
        Route::any('/user/view/{code}', [UserController::class, 'viewUser'])->name('viewUser');
        Route::any('/user/invite', [UserController::class, 'inviteUser'])->name('inviteUser');
        Route::any('/user/active', [UserController::class, 'activeUser'])->name('activeUser');
        //select-ajax
        Route::any('/setting/select/states', [SettingController::class, 'selectState'])->name('selectState');
        Route::any('/setting/select/divisions', [SettingController::class, 'selectDivision'])->name('selectDivision');
        Route::any('/setting/select/castes', [SettingController::class, 'selectCaste'])->name('selectCaste');
        Route::any('/setting/select/subjects', [SettingController::class, 'selectSubjects'])->name('selectSubjects');
        Route::any('/setting/select/students', [SettingController::class, 'selectStudents'])->name('selectStudents');
        Route::any('/setting/select/users', [SettingController::class, 'selectUsers'])->name('selectUsers');
        //settings
        Route::any('/setting', [SettingController::class, 'showSetting'])->name('showSetting');
        Route::any('/setting/update', [SettingController::class, 'updateSetting'])->name('updateSetting');
        //administrator-academic-year
        Route::any('/setting/administrator/academic-year', [AcademicYearController::class, 'showAcademicYear'])->name('showAcademicYear');
        Route::any('/setting/administrator/academic-year/add', [AcademicYearController::class, 'addAcademicYear'])->name('addAcademicYear');
        Route::any('/setting/administrator/academic-year/save', [AcademicYearController::class, 'saveAcademicYear'])->name('saveAcademicYear');
        Route::any('/setting/administrator/academic-year/edit/{categoryId}', [AcademicYearController::class, 'editAcademicYear'])->name('editAcademicYear');
        Route::get('/setting/administrator/academic-year/delete', [AcademicYearController::class, 'deleteAcademicYear'])->name('deleteAcademicYear');
        //student-group
        Route::any('/setting/administrator/student-group', [StudentGroupController::class, 'showStudentGroup'])->name('showStudentGroup');
        Route::any('/setting/administrator/student-group/add', [StudentGroupController::class, 'addStudentGroup'])->name('addStudentGroup');
        Route::any('/setting/administrator/student-group/save', [StudentGroupController::class, 'saveStudentGroup'])->name('saveStudentGroup');
        Route::any('/setting/administrator/student-group/edit/{categoryId}', [StudentGroupController::class, 'editStudentGroup'])->name('editStudentGroup');
        Route::get('/setting/administrator/student-group/delete', [StudentGroupController::class, 'deleteStudentGroup'])->name('deleteStudentGroup');
        //hostel
        Route::any('/hostel/index', [HostelController::class, 'showHostel'])->name('showHostel');
        Route::any('/hostel/add', [HostelController::class, 'addHostel'])->name('addHostel');
        Route::any('/hostel/save', [HostelController::class, 'saveHostel'])->name('saveHostel');
        Route::any('/hostel/edit/{categoryId}', [HostelController::class, 'editHostel'])->name('editHostel');
        Route::get('/hostel/delete', [HostelController::class, 'deleteHostel'])->name('deleteHostel');
        //hostel category
        Route::any('/hostel_category/index', [HostelCategoryController::class, 'showHostelCategory'])->name('showHostelCategory');
        Route::any('/hostel_category/add', [HostelCategoryController::class, 'addHostelCategory'])->name('addHostelCategory');
        Route::any('/hostel_category/saved', [HostelCategoryController::class, 'savedHostelCategory'])->name('savedHostelCategory');
        Route::any('/hostel_category/edit/{categoryId}', [HostelCategoryController::class, 'editHostelCategory'])->name('editHostelCategory');
        Route::get('/hostel_category/delete', [HostelCategoryController::class, 'deleteHostelCategory'])->name('deleteHostelCategory');

        //hostel member
        Route::any('/hmember/index', [HostelMemberController::class, 'showHostelMember'])->name('showHostelMember');
        Route::any('/hmember/add', [HostelMemberController::class, 'addHostelMember'])->name('addHostelMember');
        Route::any('/hostel_category/save', [HostelMemberController::class, 'saveHostelMember'])->name('saveHostelMember');
        Route::any('/hmember/view/{categoryId}', [HostelMemberController::class, 'viewHostelMember'])->name('viewHostelMember');
        Route::any('/hmember/edit/{categoryId}', [HostelMemberController::class, 'editHostelMember'])->name('editHostelMember');
        Route::get('/hmember/hostel/category/list', [HostelMemberController::class, 'listHostelCategory'])->name('listHostelCategory');
        Route::get('/hostelm/class/filter', [HostelMemberController::class, 'classfilterHostelMember'])->name('classfilterHostelMember');

        Route::any('/hmember/edit/{categoryId}', [HostelMemberController::class, 'editHostelMember'])->name('editHostelMember');
        //book
        Route::any('/book/index', [BookController::class, 'showBook'])->name('showBook');
        Route::any('/book/add', [BookController::class, 'addBook'])->name('addBook');
        Route::any('/book/save', [BookController::class, 'saveBook'])->name('saveBook');
        Route::any('/book/edit/{categoryId}', [BookController::class, 'editBook'])->name('editBook');
        Route::get('/book/delete', [BookController::class, 'deleteBook'])->name('deleteBook');
        //bookissue
        Route::any('/bookissue/index', [BookIssueController::class, 'showBookissue'])->name('showBookissue');
        Route::any('/bookissue/add', [BookIssueController::class, 'addBookissue'])->name('addBookissue');
        Route::any('/bookissue/save', [BookIssueController::class, 'saveBookissue'])->name('saveBookissue');
        Route::any('/bookissue/edit/{categoryId}', [BookIssueController::class, 'editBookissue'])->name('editBookissue');
        Route::get('/bookissue/delete', [BookIssueController::class, 'deleteBookissue'])->name('deleteBookissue');
        Route::get('/bookissu/user/list', [BookIssueController::class, 'listUser'])->name('listUser');
        //librarymemeber
        Route::any('/librarymember/index', [LibrarymemberController::class, 'showLibrarymember'])->name('showLibrarymember');
        Route::any('/librarymember/add', [LibrarymemberController::class, 'addLibrarymember'])->name('addLibrarymember');
        Route::any('/librarymember/save', [LibrarymemberController::class, 'saveLibrarymember'])->name('saveLibrarymember');
        Route::any('/librarymember/edit/{categoryId}', [LibrarymemberController::class, 'editLibrarymember'])->name('editLibrarymember');
        Route::get('/librarymember/delete', [LibrarymemberController::class, 'deleteLibrarymember'])->name('deleteLibrarymember');
        //classes
        Route::any('/classes/index', [ClassController::class, 'showClasses'])->name('showClasses');
        Route::any('/classes/add', [ClassController::class, 'addClasses'])->name('addClasses');
        Route::any('/classes/save', [ClassController::class, 'saveClasses'])->name('saveClasses');
        Route::any('/classes/edit/{categoryId}', [ClassController::class, 'editClasses'])->name('editClasses');
        Route::get('/classes/delete', [ClassController::class, 'deleteClasses'])->name('deleteClasses');
        //division
        Route::any('/division/index', [DivisionController::class, 'showDivision'])->name('showDivision');
        Route::any('/division/add', [DivisionController::class, 'addDivision'])->name('addDivision');
        Route::any('/division/save', [DivisionController::class, 'saveDivision'])->name('saveDivision');
        Route::any('/division/edit/{categoryId}', [DivisionController::class, 'editDivision'])->name('editDivision');
        Route::get('/division/delete', [DivisionController::class, 'deleteDivision'])->name('deleteDivision');
        //subject
        Route::any('/subject/index', [SubjectController::class, 'showSubject'])->name('showSubject');
        Route::any('/subject/add', [SubjectController::class, 'addSubject'])->name('addSubject');
        Route::any('/subject/save', [SubjectController::class, 'saveSubject'])->name('saveSubject');
        Route::any('/subject/edit/{categoryId}', [SubjectController::class, 'editSubject'])->name('editSubject');
        Route::get('/subject/delete', [SubjectController::class, 'deleteSubject'])->name('deleteSubject');
        //syllabus
        Route::any('/syllabus/index', [SyllabusController::class, 'showSyllabus'])->name('showSyllabus');
        Route::any('/syllabus/add', [SyllabusController::class, 'addSyllabus'])->name('addSyllabus');
        Route::any('/syllabus/save', [SyllabusController::class, 'saveSyllabus'])->name('saveSyllabus');
        Route::any('/syllabus/edit/{categoryId}', [SyllabusController::class, 'editSyllabus'])->name('editSyllabus');
        Route::get('/syllabus/delete', [SyllabusController::class, 'deleteSyllabus'])->name('deleteSyllabus');
        //Departments
        Route::any('/departments/index', [DepartmentController::class, 'showDepartments'])->name('showDepartments');
        Route::any('/departments/add', [DepartmentController::class, 'addDepartments'])->name('addDepartments');
        Route::any('/departments/save', [DepartmentController::class, 'saveDepartments'])->name('saveDepartments');
        Route::any('/departments/edit/{categoryId}', [DepartmentController::class, 'editDepartments'])->name('editDepartments');
        Route::get('/departments/delete', [DepartmentController::class, 'deleteDepartments'])->name('deleteDepartments');
        //LeaveCategory
        Route::any('/leavecategory/index', [LeaveCategoryController::class, 'showleaveCategory'])->name('showleaveCategory');
        Route::any('/leavecategory/add', [LeaveCategoryController::class, 'addleaveCategory'])->name('addleaveCategory');
        Route::any('/leavecategory/save', [LeaveCategoryController::class, 'saveleaveCategory'])->name('saveleaveCategory');
        Route::any('/leavecategory/edit/{categoryId}', [LeaveCategoryController::class, 'editleaveCategory'])->name('editleaveCategory');
        Route::get('/leavecategory/delete', [LeaveCategoryController::class, 'deleteleaveCategory'])->name('deleteleaveCategory');
        //leave assign
        Route::any('/leaveassign/index', [LeaveAssignController::class, 'leaveAssign'])->name('leaveAssign');
        Route::any('/leaveassign/add', [LeaveAssignController::class, 'addleaveAssign'])->name('addleaveAssign');
        Route::any('/leaveassign/save', [LeaveAssignController::class, 'saveleaveAssign'])->name('saveleaveAssign');
        Route::any('/leaveassign/edit/{categoryId}', [LeaveAssignController::class, 'editleaveAssign'])->name('editleaveAssign');
        Route::get('/leaveassign/delete', [LeaveAssignController::class, 'deleteleaveAssign'])->name('deleteleaveAssign');
        //leave apply
        Route::any('/leaveapply/index', [LeaveApplyController::class, 'leaveApply'])->name('leaveApply');
        Route::any('/leaveapply/add', [LeaveApplyController::class, 'addleaveApply'])->name('addleaveApply');
        Route::any('/leaveapply/save', [LeaveApplyController::class, 'saveleaveApply'])->name('saveleaveApply');
        Route::any('/leaveapply/edit/{categoryId}', [LeaveApplyController::class, 'editleaveApply'])->name('editleaveApply');
        // Route::any('/leaveapply/pdf_download/{categoryId}', [LeaveApplyController::class, 'pdf_download'])->name('pdfDownloadleaveApply');
        Route::get('/leaveapply/delete', [LeaveApplyController::class, 'deleteleaveApply'])->name('deleteleaveApply');
        //leave application
        Route::any('/leaveapplication/index', [LeaveApplicationController::class, 'leaveApplication'])->name('leaveApplication');
        Route::any('/leaveapplication/view', [LeaveApplicationController::class, 'viewleaveApplication'])->name('viewleaveApplication');
        Route::any('/approveleaveapplicationteacher', [LeaveApplicationController::class, 'approveleaveApplicationteacher'])->name('approveleaveApplicationteacher');
        Route::any('/rejectleaveapplicationteacher', [LeaveApplicationController::class, 'rejectleaveApplicationteacher'])->name('rejectleaveApplicationteacher');



        Route::any('/approveleaveApplicationuser/{categoryId}', [LeaveApplicationController::class, 'approveleaveApplicationuser'])->name('approveleaveApplicationuser');
        Route::any('/rejectleaveapplicationuser/{categoryId}', [LeaveApplicationController::class, 'rejectleaveApplicationuser'])->name('rejectleaveApplicationuser');
        //Fee Type
        Route::any('/setting/administrator/feeType/index', [FeeTypeController::class, 'showFeeType'])->name('showFeeType');
        Route::any('/setting/administrator/feeType/add', [FeeTypeController::class, 'addFeeType'])->name('addFeeType');
        Route::any('/setting/administrator/feeType/save', [FeeTypeController::class, 'saveFeeType'])->name('saveFeeType');
        Route::any('/setting/administrator/feeType/edit/{categoryId}', [FeeTypeController::class, 'editFeeType'])->name('editFeeType');
        Route::get('/setting/administrator/feeType/delete', [FeeTypeController::class, 'deleteFeeType'])->name('deleteFeeType');
        //user_type
        Route::any('/setting/administrator/usertype/index', [UserTypeController::class, 'showUsertype'])->name('showUsertype');
        Route::any('/setting/administrator/usertype/add', [UserTypeController::class, 'addUsertype'])->name('addUsertype');
        Route::any('/setting/administrator/usertype/save', [UserTypeController::class, 'saveUsertype'])->name('saveUsertype');
        Route::any('/setting/administrator/usertype/edit/{categoryId}', [UserTypeController::class, 'editUsertype'])->name('editUsertype');
        Route::get('/setting/administrator/usertype/delete', [UserTypeController::class, 'deleteUsertype'])->name('deleteUsertype');
        //frontend_setting
        Route::any('/setting/frontend_setting/show', [FrontSettingController::class, 'frontendSettings'])->name('showfrontendSettings');
        Route::any('/setting/frontend_setting/update', [FrontSettingController::class, 'updatefrontendSettings'])->name('updatefrontendSettings');
       //assignment
        Route::any('/assignment/index', [AssignmentsController::class, 'showlAssignment'])->name('showAssignment');
        Route::any('/assignment/add', [AssignmentsController::class, 'addAssignment'])->name('addAssignment');
        Route::any('/assignment/save', [AssignmentsController::class, 'saveAssignment'])->name('saveAssignment');
        Route::any('/assignment/edit/{categoryId}', [AssignmentsController::class, 'editAssignment'])->name('editAssignment');
        Route::get('/assignment/delete', [AssignmentsController::class, 'deleteAssignment'])->name('deleteAssignment');
        //exam
        Route::any('/exam/index', [ExamController::class, 'showExam'])->name('showExam');
        Route::any('/exam/add', [ExamController::class, 'addExam'])->name('addExam');
        Route::any('/exam/save', [ExamController::class, 'saveExam'])->name('saveExam');
        Route::any('/exam/edit/{categoryId}', [ExamController::class, 'editExam'])->name('editExam');
        Route::get('/exam/delete', [ExamController::class, 'deleteExam'])->name('deleteExam');
        //exam schedule
        Route::any('/examschedule', [ExamScheduleController::class, 'examSchedule'])->name('examSchedule');
        Route::any('/examschedule/add', [ExamScheduleController::class, 'addexamSchedule'])->name('addexamSchedule');
        Route::any('/examschedule/save', [ExamScheduleController::class, 'saveexamSchedule'])->name('saveexamSchedule');
        Route::any('/examschedule/edit/{categoryId}', [ExamScheduleController::class, 'editexamSchedule'])->name('editexamSchedule');
        Route::any('/examschedule/delete', [ExamScheduleController::class, 'deleteexamSchedule'])->name('deleteexamSchedule');
        Route::any('/examschedule/class/filter', [ExamScheduleController::class, 'examSchedulefilter'])->name('examSchedulefilter');
        //exam grade
        Route::any('/grade', [GradeController::class, 'Grade'])->name('Grade');
        Route::any('/grade/add', [GradeController::class, 'addGrade'])->name('addGrade');
        Route::any('/grade/save', [GradeController::class, 'savegrade'])->name('savegrade');
        Route::any('/grade/edit/{categoryId}', [GradeController::class, 'editGrade'])->name('editGrade');
        Route::any('/grade/delete', [GradeController::class, 'deletegrade'])->name('deletegrade');
        //instruction
        Route::any('/instruction', [InstructionController::class, 'Instruction'])->name('showInstruction');
        Route::any('/instruction/add', [InstructionController::class, 'addInstruction'])->name('addInstruction');
        Route::any('/instruction/save', [InstructionController::class, 'saveInstruction'])->name('saveInstruction');
        Route::any('/instruction/edit/{categoryId}', [InstructionController::class, 'editInstruction'])->name('editInstruction');
        Route::any('/instruction/delete', [InstructionController::class, 'deleteInstruction'])->name('deleteInstruction');
        //question bank
        Route::any('/question_bank', [QuestionBankController::class, 'QuestionBank'])->name('showQuestionBank');
        Route::any('/question_bank/add', [QuestionBankController::class, 'addQuestionBank'])->name('addQuestionBank');
        Route::any('/question_bank/save', [QuestionBankController::class, 'saveQuestionBank'])->name('saveQuestionBank');
        Route::any('/question_bank/edit/{categoryId}', [QuestionBankController::class, 'editQuestionBank'])->name('editQuestionBank');
        Route::any('/question_bank/delete', [QuestionBankController::class, 'deleteQuestionBank'])->name('deleteQuestionBank');
        //exam question Add
         Route::any('/exam_question', [ExamQuestionController::class, 'ExamQuestion'])->name('showExamQuestion');
         Route::any('/exam_question/exam/{categoryId}', [ExamQuestionController::class, 'listExamQuestion'])->name('listExamQuestion');
         Route::post('/exam_question/question/list', [ExamQuestionController::class, 'Questionlist'])->name('Questionlist');
         Route::post('/exam_question/question/add', [ExamQuestionController::class, 'ExamQuestionadd'])->name('ExamQuestionadd');
         Route::post('/exam_question/question/remove', [ExamQuestionController::class, 'ExamQuestionRemove'])->name('ExamQuestionRemove');
        //Religions
        Route::any('/setting/content_setting/religion/index', [ReligionController::class, 'showReligion'])->name('showReligion');
        Route::any('/setting/content_setting/religion/add', [ReligionController::class, 'addReligion'])->name('addReligion');
        Route::any('/setting/content_setting/religion/save', [ReligionController::class, 'saveReligion'])->name('saveReligion');
        Route::any('/setting/content_setting/religion/edit/{categoryId}', [ReligionController::class, 'editReligion'])->name('editReligion');
        Route::get('/setting/content_setting/religion/delete', [ReligionController::class, 'deleteReligion'])->name('deleteReligion');
        //Castes
        Route::any('/setting/content_setting/castes/index', [CasteController::class, 'showCaste'])->name('showCaste');
        Route::any('/setting/content_setting/castes/add', [CasteController::class, 'addCaste'])->name('addCaste');
        Route::any('/setting/content_setting/castes/save', [CasteController::class, 'saveCaste'])->name('saveCaste');
        Route::any('/setting/content_setting/castes/edit/{categoryId}', [CasteController::class, 'editCaste'])->name('editCaste');
        Route::get('/setting/content_setting/castes/delete', [CasteController::class, 'deleteCaste'])->name('deleteCaste');
        //Extracurriculars
        Route::any('/setting/content_setting/extracurricular/index', [ExtracurricularController::class, 'showExtracurricular'])->name('showExtracurricular');
        Route::any('/setting/content_setting/extracurricular/add', [ExtracurricularController::class, 'addExtracurricular'])->name('addExtracurricular');
        Route::any('/setting/content_setting/extracurricular/save', [ExtracurricularController::class, 'saveExtracurricular'])->name('saveExtracurricular');
        Route::any('/setting/content_setting/extracurricular/edit/{categoryId}', [ExtracurricularController::class, 'editExtracurricular'])->name('editExtracurricular');
        Route::get('/setting/content_setting/extracurricular/delete', [ExtracurricularController::class, 'deleteExtracurricular'])->name('deleteExtracurricular');
        //Sports
        Route::any('/setting/content_setting/sports/index', [SportController::class, 'showSport'])->name('showSport');
        Route::any('/setting/content_setting/sports/add', [SportController::class, 'addSport'])->name('addSport');
        Route::any('/setting/content_setting/sports/save', [SportController::class, 'saveSport'])->name('saveSport');
        Route::any('/setting/content_setting/sports/edit/{categoryId}', [SportController::class, 'editSport'])->name('editSport');
        Route::get('/setting/content_setting/sports/delete', [SportController::class, 'deleteSport'])->name('deleteSport');
        //Arts
        Route::any('/setting/content_setting/art/index', [ArtController::class, 'showArt'])->name('showArt');
        Route::any('/setting/content_setting/art/add', [ArtController::class, 'addArt'])->name('addArt');
        Route::any('/setting/content_setting/art/save', [ArtController::class, 'saveArt'])->name('saveArt');
        Route::any('/setting/content_setting/art/edit/{categoryId}', [ArtController::class, 'editArt'])->name('editArt');
        Route::get('/setting/content_setting/art/delete', [ArtController::class, 'deleteArt'])->name('deleteArt');
        //Musics
        Route::any('/setting/content_setting/music/index', [MusicController::class, 'showMusic'])->name('showMusic');
        Route::any('/setting/content_setting/music/add', [MusicController::class, 'addMusic'])->name('addMusic');
        Route::any('/setting/content_setting/music/save', [MusicController::class, 'saveMusic'])->name('saveMusic');
        Route::any('/setting/content_setting/music/edit/{categoryId}', [MusicController::class, 'editMusic'])->name('editMusic');
        Route::get('/setting/content_setting/music/delete', [MusicController::class, 'deleteMusic'])->name('deleteMusic');
        //Rooms
        Route::any('/setting/content_setting/rooms/index', [RoomController::class, 'showRoom'])->name('showRoom');
        Route::any('/setting/content_setting/rooms/add', [RoomController::class, 'addRoom'])->name('addRoom');
        Route::any('/setting/content_setting/rooms/save', [RoomController::class, 'saveRoom'])->name('saveRoom');
        Route::any('/setting/content_setting/rooms/edit/{categoryId}', [RoomController::class, 'editRoom'])->name('editRoom');
        Route::get('/setting/content_setting/rooms/delete', [RoomController::class, 'deleteRoom'])->name('deleteRoom');
        //Timetable
        Route::any('/timetable/index', [TimeTableController::class, 'showTimeTable'])->name('showTimeTable');
        Route::any('/timetable/add', [TimeTableController::class, 'addTimeTable'])->name('addTimeTable');
        Route::get('/timetable/division/list', [TimeTableController::class, 'listDivision'])->name('listDivision');
        Route::get('/timetable/subject/list', [TimeTableController::class, 'listSubject'])->name('listSubject');
        Route::get('/timetable/view', [TimeTableController::class, 'viewTimeTable'])->name('viewTimeTable');
        Route::any('/timetable/save', [TimeTableController::class, 'saveTimeTable'])->name('saveTimeTable');
        Route::any('/timetable/edit/{categoryId}', [TimeTableController::class, 'editTimeTable'])->name('editTimeTable');
        Route::get('/timetable/delete', [TimeTableController::class, 'deleteTimeTable'])->name('deleteTimeTable');
        //user

        //sattendance
        Route::any('/sattendance/index', [StudentAttendanceController::class, 'showStudentAttendance'])->name('showstudentAttendance');
        Route::any('/sattendance/add', [StudentAttendanceController::class, 'addStudentAttendance'])->name('addstudentAttendance');
        Route::any('/sattendance/save', [StudentAttendanceController::class, 'saveStudentAttendance'])->name('saveStudentAttendance');
        Route::any('/sattendance', [StudentAttendanceController::class, 'studentAttendance'])->name('studentAttendance');
        Route::any('/sattendance/class/filter', [StudentAttendanceController::class, 'sAttendanceclassFliter'])->name('sAttendanceclassFliter');

        Route::any('/sattendance/view/{categoryId}', [StudentAttendanceController::class, 'viewStudentAttendance'])->name('viewStudentAttendance');
        //tattendance
        Route::any('/tattendance/index', [TeacherAttendanceController::class, 'showteacherAttendance'])->name('showteacherAttendance');
        Route::any('/tattendance/add', [TeacherAttendanceController::class, 'addteacherAttendance'])->name('addteacherAttendance');
        Route::any('/tattendance', [TeacherAttendanceController::class, 'teacherAttendance'])->name('tattendance');
        Route::any('/savetattendance', [TeacherAttendanceController::class, 'savetattendance'])->name('savetattendance');
        //uattendance
        Route::any('/uattendance/index', [UserAttendanceController::class, 'showuserAttendance'])->name('showuserAttendance');
        Route::any('/uattendance/add', [UserAttendanceController::class, 'adduserAttendance'])->name('adduserAttendance');
        Route::any('/uattendance', [UserAttendanceController::class, 'userAttendance'])->name('userAttendance');
        Route::any('/saveuattendance', [UserAttendanceController::class, 'saveuserAttendance'])->name('saveuserAttendance');
        //posting
        Route::any('/posting/index', [PostingController::class, 'Posting'])->name('Posting');
        Route::any('/posting/add', [PostingController::class, 'addPosting'])->name('addPosting');
        Route::any('/posting/save', [PostingController::class, 'savePosting'])->name('savePosting');
        Route::any('/posting/addBatch', [PostingController::class, 'addBatchPosting'])->name('addBatchPosting');
        //billing
        Route::any('/billing', [BillingController::class, 'showBilling'])->name('showBilling');
        Route::any('/billing/payment/{studentId}', [BillingController::class, 'showPayment'])->name('showPayment');
        Route::any('/billing/payment/add/advance', [BillingController::class, 'addAdvance'])->name('addAdvance');
        Route::any('/billing/payment/add/deposit', [BillingController::class, 'addDeposit'])->name('addDeposit');
        //payemnt
        Route::any('/billing/payment/add/payment', [PaymentController::class, 'addPayment'])->name('addPayment');
        //expense
        Route::any('/expense', [ExpenseController::class, 'showExpense'])->name('showExpense');
        Route::any('/expense/add', [ExpenseController::class, 'addExpense'])->name('addExpense');
        Route::any('/expense/save', [ExpenseController::class, 'saveExpense'])->name('saveExpense');
        Route::any('/expense/edit/{expense_code}', [ExpenseController::class, 'editExpense'])->name('editExpense');
        //salary
        Route::any('/salary/template', [SalaryTemplateController::class, 'showTemplate'])->name('showTemplate');
        Route::any('/salary/template/add', [SalaryTemplateController::class, 'addTemplate'])->name('addTemplate');
        Route::any('/salary/template/save', [SalaryTemplateController::class, 'saveTemplate'])->name('saveTemplate');
        Route::any('/salary/template/edit', [SalaryTemplateController::class, 'ediTemplate'])->name('editTemplate');
        //salary
        Route::any('/salary/template/hourly', [HourlyTemplateController::class, 'showHourlyTemplate'])->name('showHourlyTemplate');
        Route::any('/salary/template/hourly/add', [HourlyTemplateController::class, 'addHourlyTemplate'])->name('addHourlyTemplate');
        Route::any('/salary/template/hourly/save', [HourlyTemplateController::class, 'saveHourlyTemplate'])->name('saveHourlyTemplate');
        Route::any('/salary/template/hourly/edit', [HourlyTemplateController::class, 'editHourlyTemplate'])->name('editHourlyTemplate');
        //process salary
        Route::any('/salary', [SalaryController::class, 'showSalary'])->name('showSalary');
        Route::any('/salary/process', [SalaryController::class, 'processSalary'])->name('processSalary');
        //report class
        Route::any('/report/class/ClassReport', [ClassReportController::class, 'classReport'])->name('classReport');
        Route::post('/report/class/ClassReportView', [ClassReportController::class, 'classReportView'])->name('classReportView');
        //report student
        Route::any('/report/student/StudentReport', [StudentReportController::class, 'studentReport'])->name('studentReport');
        Route::any('/report/student/StudentReportView', [StudentReportController::class, 'studentReportView'])->name('studentReportView');
        //timetable Report
        Route::any('/report/routine/RoutineReport', [HomeController::class, 'timetableReport'])->name('timetableReport');
        Route::any('/report/routine/RoutineReportView', [HomeController::class, 'timetableReportView'])->name('timetableReportView');
        //attendance report
        Route::any('/report/attendance/AttendanceReportView', [HomeController::class, 'attendanceReportView'])->name('attendanceReportView');
        //Premotion
        Route::any('/premotion/index', [PremotionController::class, 'showPremotion'])->name('showPremotion');
        Route::any('/premotion/student_list', [PremotionController::class, 'studentPremotion'])->name('studentPremotion');
        Route::any('/premotion/save', [PremotionController::class, 'savestudentPremotion'])->name('savestudentPremotion');
    

    });

    //pending

    // Route::any('/s-dashboard', [HomeController::class, 'showStudentDashboard'])->name('showStudentDashboard');
    // Route::any('/p-dashboard', [HomeController::class, 'showParentDashboard'])->name('showParentDashboard');
    // Route::any('/t-dashboard', [HomeController::class, 'showTeacherDashboard'])->name('showTeacherDashboard');





    // Route::any('/uattendance', [HomeController::class, 'userAttendance'])->name('userAttendance');
    // Route::any('/uattendance/add', [HomeController::class, 'adduserAttendance'])->name('adduserAttendance');
    // Route::any('/uattendance/view', [HomeController::class, 'viewuserAttendance'])->name('viewuserAttendance');





    Route::any('/eattendance', [HomeController::class, 'examAttendance'])->name('examAttendance');
    Route::any('/eattendance/add', [HomeController::class, 'addexamAttendance'])->name('addexamAttendance');


    Route::any('/invoice', [HomeController::class, 'Invoice'])->name('Invoice');
    Route::any('/invoice/add', [HomeController::class, 'addInvoice'])->name('addInvoice');
    Route::any('/invoice/edit', [HomeController::class, 'editInvoice'])->name('editInvoice');
    Route::any('/invoice/view', [HomeController::class, 'invoiceView'])->name('invoiceView');





    Route::any('/paymenthistory/index', [HomeController::class, 'paymentHistory'])->name('paymentHistory');
    Route::any('/paymenthistory/edit', [HomeController::class, 'editpaymentHistory'])->name('editpaymentHistory');
    // Route::any('/expense/index', [HomeController::class, 'Expense'])->name('Expense');
    // Route::any('/expense/add', [HomeController::class, 'addExpense'])->name('addExpense');
    // Route::any('/income/index', [HomeController::class, 'Income'])->name('Income');
    // Route::any('/income/add', [HomeController::class, 'addIncome'])->name('addIncome');
    Route::any('/global_payment/index', [HomeController::class, 'globalPayment'])->name('globalPayment');





    Route::any('/whiteboard/index', [HomeController::class, 'Whiteboard'])->name('Whiteboard');


    Route::any('/manage_salary/index', [HomeController::class, 'manageSalary'])->name('manageSalary');
    Route::any('/manage_salary/add', [HomeController::class, 'addmanageSalary'])->name('addmanageSalary');
    Route::any('/manage_salary/edit', [HomeController::class, 'editmanageSalary'])->name('editmanageSalary');

    Route::any('/make_payment/index', [HomeController::class, 'makePayment'])->name('makePayment');
    Route::any('/make_payment/add', [HomeController::class, 'addmakePayment'])->name('addmakePayment');
    Route::any('/make_payment/view', [HomeController::class, 'viewmakePayment'])->name('viewmakePayment');










    // Route::any('/setting/administrator/academic-year', [HomeController::class, 'academicYear'])->name('academicYear');
    // Route::any('/setting/administrator/academic-year/add', [HomeController::class, 'addAcademicYear'])->name('addAcademicYear');

    Route::any('/report/emailsetting/index', [HomeController::class, 'emailSettings'])->name('emailSettings');
    Route::any('/report/paymentsettings/index', [HomeController::class, 'paymentSettings'])->name('paymentSettings');
    Route::any('/report/frontend_setting/index', [HomeController::class, 'frontendSettings'])->name('frontendSettings');

    Route::any('/report/revenue/RevenueReport', [HomeController::class, 'RevenueReport'])->name('RevenueReport');
    Route::any('/report/cash_recieved/CashRecieved', [HomeController::class, 'CashRecieved'])->name('CashRecieved');
    Route::any('/report/cash_paid/CashPaid', [HomeController::class, 'CashPaid'])->name('CashPaid');
    Route::any('/report/outstanding/Outstanding', [HomeController::class, 'Outstanding'])->name('Outstanding');
    Route::any('/report/journal/Journal', [HomeController::class, 'Journal'])->name('Journal');
    Route::any('/report/trial_balance/TrialBalance', [HomeController::class, 'TrialBalance'])->name('TrialBalance');
    Route::any('/report/manager/Manager', [HomeController::class, 'Manager'])->name('Manager');

    // Route::any('/report/student/StudentReport', [HomeController::class, 'studentReport'])->name('studentReport');
    // Route::any('/report/student/StudentReportView', [HomeController::class, 'studentReportView'])->name('studentReportView');

    Route::any('/report/routine/RoutineReport', [HomeController::class, 'timetableReport'])->name('timetableReport');
    Route::any('/report/routine/RoutineReportView', [HomeController::class, 'timetableReportView'])->name('timetableReportView');

    Route::any('/report/attendance/AttendanceReport', [HomeController::class, 'attendanceReport'])->name('attendanceReport');
    Route::any('/report/attendance/AttendanceReportView', [HomeController::class, 'attendanceReportView'])->name('attendanceReportView');

    Route::any('/report/setting/index', [HomeController::class, 'generalSettings'])->name('generalSettings');
    Route::any('/report/emailsetting/index', [HomeController::class, 'emailSettings'])->name('emailSettings');
    Route::any('/report/paymentsettings/index', [HomeController::class, 'paymentSettings'])->name('paymentSettings');


    Route::any('/issue/index', [HomeController::class, 'Issue'])->name('Issue');
    Route::any('/issue/index_parent', [HomeController::class, 'IssueParent'])->name('IssueParent');
    Route::any('/issue/add', [HomeController::class, 'IssueAdd'])->name('IssueAdd');
    Route::any('/issue/edit', [HomeController::class, 'IssueEdit'])->name('IssueEdit');
    Route::any('/issue/view', [HomeController::class, 'IssueView'])->name('IssueView');
});
