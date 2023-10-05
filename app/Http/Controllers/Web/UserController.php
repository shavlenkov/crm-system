<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Web\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * UserController constructor
     */
    public function __construct(private UserService $userService) {}

    /**
     * We return the page with all users
     *
     * @return View
     */
    public function index(): View
    {
        return view('users.index')->with(['users' => $this->userService->getAll()]);
    }

    /**
     * Make admin
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function makeAdmin(User $user): RedirectResponse {
        $user->status = 1;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Make user
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function makeUser(User $user): RedirectResponse {
        $user->status = 0;
        $user->save();

        if(Auth::user()->email === $user->email) {
            Auth::logout();
        }

        return redirect()->route('users.index');
    }

}
