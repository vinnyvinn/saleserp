<?php

namespace Dsc\Http\Controllers\Web;

use Dsc\Http\Controllers\Controller;
use Dsc\Repositories\Activity\ActivityRepository;
use Dsc\Repositories\User\UserRepository;
use Dsc\Support\Enum\UserStatus;
use Auth;
use Dsc\Lead;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var ActivityRepository
     */
    private $activities;

    /**
     * DashboardController constructor.
     * @param UserRepository $users
     * @param ActivityRepository $activities
     */
    public function __construct(UserRepository $users, ActivityRepository $activities)
    {
        $this->middleware('auth');
        $this->users = $users;
        $this->activities = $activities;
    }

    /**
     * Displays dashboard based on user's role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
     //   if (Auth::user()->hasRole('Admin')) {
            return $this->adminDashboard();
       // }

        //return $this->defaultDashboard();
    }

    /**
     * Displays dashboard for admin users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminDashboard()
    {
        $leads_new = Lead::where('status_id', 1)->count();
        $leads_Contacted = Lead::where('status_id', 2)->count();
        $leads_Qualified = Lead::where('status_id', 3)->count();
        $leads_working = Lead::where('status_id', 4)->count();
        $leads_customer = Lead::where('status_id', 5)->count();
        $leads_proposalsent = Lead::where('status_id', 6)->count();

        return view('dashboard.admin', compact('leads_new','leads_working', 'leads_Contacted', 'leads_Qualified', 'leads_customer', 'leads_proposalsent'));
    }

    /**
     * Displays default dashboard for non-admin users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function defaultDashboard()
    {
        $activities = $this->activities->userActivityForPeriod(
            Auth::user()->id,
            Carbon::now()->subWeeks(2),
            Carbon::now()
        )->toArray();

        return view('dashboard.default', compact('activities'));
    }
}
