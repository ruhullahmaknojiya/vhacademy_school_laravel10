<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\NotificationView;
use Illuminate\Support\Facades\Auth;

class TeacherNotification extends Controller
{
    
    public function getUnreadNoticeCount()
    {
        $user = Auth::user();

        // Get all notices that the user hasn't viewed
        $unreadNoticesCount = Notice::whereDoesntHave('views', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();

        return response()->json([
            'status' => 'success',
            'unread_notices_count' => $unreadNoticesCount,
        ]);
    }
    
    
    
    
    // Method to list all notices
    public function listNotices()
{
    $teacherRoleId = "4"; // Assuming "4" is the ID for Teacher role
    $notices = Notice::whereJsonContains('roles', $teacherRoleId) // Filter notices for teachers
                     ->orderBy('date', 'desc')
                     ->get();

    return response()->json([
        'status' => 'success',
        'data' => $notices,
    ]);
}

    // Method to get the details of a specific notice
    public function noticeDetail($id)
    {
        $notice = Notice::findOrFail($id);

        // Log the view in the notification_views table
        $this->logNotificationView($id, Auth::id());

        return response()->json([
            'status' => 'success',
            'data' => $notice,
        ]);
    }

    // Method to log the view of a notice
    private function logNotificationView($noticeId, $teacherId)
    {
        // Check if the record already exists
        $exists = NotificationView::where('notice_id', $noticeId)
                ->where('user_id', $teacherId)
                ->exists();

        // If the record does not exist, create a new one
        if (!$exists) {
            NotificationView::create([
            'notice_id' => $noticeId,
            'user_id' => $teacherId,
            'viewed_at' => now(),
            ]);
        }
    }
}
