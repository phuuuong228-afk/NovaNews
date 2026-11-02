<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Hiển thị trang quản lý tài khoản cá nhân.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());

        return view('account.index', compact('user'));
    }

    /**
     * Cập nhật họ tên và email.
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email này đã được tài khoản khác sử dụng.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return back()->with(
            'success',
            'Cập nhật thông tin cá nhân thành công!'
        );
    }

    /**
     * Đổi mật khẩu.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'different:current_password',
            ],
        ], [
            'current_password.required' =>
                'Vui lòng nhập mật khẩu hiện tại.',
            'current_password.current_password' =>
                'Mật khẩu hiện tại không chính xác.',
            'password.required' =>
                'Vui lòng nhập mật khẩu mới.',
            'password.min' =>
                'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'password.confirmed' =>
                'Mật khẩu xác nhận không khớp.',
            'password.different' =>
                'Mật khẩu mới phải khác mật khẩu hiện tại.',
        ]);

        $user = User::findOrFail(Auth::id());

        // Model User hiện tại tự mã hóa mật khẩu bằng cast "hashed".
        $user->password = $validated['password'];
        $user->save();

        return back()->with(
            'success',
            'Đổi mật khẩu thành công!'
        );
    }

    /**
     * Xóa tài khoản cá nhân sau khi xác nhận mật khẩu.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'current_password',
            ],
        ], [
            'password.required' =>
                'Vui lòng nhập mật khẩu để xác nhận xóa tài khoản.',
            'password.current_password' =>
                'Mật khẩu không chính xác.',
        ]);

        $user = User::findOrFail(Auth::id());

        // Đăng xuất trước khi xóa tài khoản.
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect()->route('home')->with(
            'success',
            'Tài khoản của bạn đã được xóa.'
        );
    }
}
