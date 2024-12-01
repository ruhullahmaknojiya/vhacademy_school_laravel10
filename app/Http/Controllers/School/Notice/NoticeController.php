<?php
namespace App\Http\Controllers\School\Notice;
use App\Http\Controllers\Controller;

use App\Models\Notice;
use App\Models\NotificationView;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    public function index()
    {
        $notices = Notice::with(['views'])->get();
    
        foreach ($notices as $notice) {
            $viewCounts = $this->countViewsForNotice($notice->id);
            $notice->teacher_views = $viewCounts['teacher_views'];
            $notice->parent_views = $viewCounts['parent_views'];
            $notice->total_views = $viewCounts['total_views'];
        }

        return view('schooladmin.notices.index', compact('notices'));
    }

    public function create()
    {
        $roles = Role::whereIn('name', ['Parent', 'Teacher'])->get();
        return view('schooladmin.notices.create_notice', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'roles' => 'required|array',
        ]);

        $notice = Notice::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'roles' => $request->roles, // Assuming $request->roles is an array of role names or IDs

        ]);

        // foreach ($request->roles as $role_name) {
        //     $role = Role::where('name', $role_name)->first();
        //     foreach ($role->users as $user) {
        //         if (!empty($user->fcm_token)) {
        //             // Send the push notification
        //             $this->sendPushNotification($user->fcm_token, $notice->title, $notice->content);
        //         }
        //     }
        // }

        return redirect()->route('schooladmin.notices.index')->with('success', 'Notice sent successfully.');
    }
    
   public function countViewsForNotice($noticeId)
    {
        // Fetch the role IDs for Teacher and Parent
        $teacherRoleId = Role::where('name', 'Teacher')->value('id');
        $parentRoleId = Role::where('name', 'Parent')->value('id');

        // Get all views for the specific notice
        $views = NotificationView::where('notice_id', $noticeId)->get();

        // Count how many teachers viewed the notice
        $teacherViewsCount = $views->filter(function ($view) use ($teacherRoleId) {
            $user = User::find($view->user_id);
            return $user && $user->role_id == $teacherRoleId;
        })->count();

        // Count how many parents viewed the notice
        $parentViewsCount = $views->filter(function ($view) use ($parentRoleId) {
            $user = User::find($view->user_id);
            return $user && $user->role_id == $parentRoleId;
        })->count();

        return [
            'total_views' => $views->count(),
            'teacher_views' => $teacherViewsCount,
            'parent_views' => $parentViewsCount,
        ];
    }

   public function report($id)
    {
     // Fetch the role IDs for Teacher and Parent
        $teacherRoleId = Role::where('name', 'Teacher')->value('id');
        $parentRoleId = Role::where('name', 'Parent')->value('id');

        $notice = Notice::findOrFail($id);
        $views = NotificationView::where('notice_id', $id)->with('user.roles')->get();

        // Filter views by role
        $teacherViews = $views->filter(fn($view) => User::find($view->user_id)->role_id == $teacherRoleId);
        $parentViews = $views->filter(fn($view) => User::find($view->user_id)->role_id == $parentRoleId);

        // Check if only one role's data is available
        $onlyTeacherData = $teacherViews->isNotEmpty() && $parentViews->isEmpty();
        $onlyParentData = $parentViews->isNotEmpty() && $teacherViews->isEmpty();

        return view('schooladmin.notices.report', compact('notice', 'teacherViews', 'parentViews', 'onlyTeacherData', 'onlyParentData'));
    }

    public function destroy($id)
{
    $notice = Notice::findOrFail($id);
    $notice->delete();

    return redirect()->route('schooladmin.notices.index')->with('success', 'Notice deleted successfully.');
}
}
