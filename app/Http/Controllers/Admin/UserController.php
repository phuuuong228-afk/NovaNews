<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Danh sách người dùng và tìm kiếm
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('keyword')) {
            $keyword = trim($request->input('keyword'));

            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        $users = $query
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();

        return view('admin.users.index', compact(
            'users',
            'totalUsers',
            'totalAdmins'
        ));
    }

    // Thay đổi quyền người dùng
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        // Không cho người dùng tự thay đổi quyền của chính mình
        if ($user->id === Auth::id()) {
            return back()->with('error',
                'Bạn không thể tự thay đổi quyền của tài khoản đang đăng nhập.');
        }

        // Không để hệ thống mất tài khoản admin cuối cùng
        if (
            $user->role === 'admin'
            && $request->role !== 'admin'
            && User::where('role', 'admin')->count() <= 1
        ) {
            return back()->with('error',
                'Không thể hạ quyền admin cuối cùng của hệ thống.');
        }

        $user->role = $request->role;
        $user->save();

        return back()->with('success',
            'Đã cập nhật quyền người dùng thành công.');
    }

    // Xóa người dùng
    public function destroy(User $user)
    {
        // Không cho admin tự xóa tài khoản đang đăng nhập
        if ($user->id === Auth::id()) {
            return back()->with('error',
                'Bạn không thể xóa tài khoản đang đăng nhập.');
        }

        // Không cho xóa admin cuối cùng
        if (
            $user->role === 'admin'
            && User::where('role', 'admin')->count() <= 1
        ) {
            return back()->with('error',
                'Không thể xóa admin cuối cùng của hệ thống.');
        }

        $user->delete();

        return back()->with('success',
            'Đã xóa người dùng thành công.');
    }
}
