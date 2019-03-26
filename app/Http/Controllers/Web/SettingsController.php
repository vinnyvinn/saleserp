<?php

namespace Dsc\Http\Controllers\Web;

use Dsc\Events\Settings\Updated as SettingsUpdated;
use Illuminate\Http\Request;
use Settings;
use Dsc\Lead_Status;
use Dsc\Http\Controllers\Controller;

/**
 * Class SettingsController
 * @package Dsc\Http\Controllers
 */
class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display general settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function general()
    {
        $leads = Lead_Status::all();
        return view('settings.general', compact('leads'));
    }

    public function addleadstatus(Request $request)
    {
        $status = new Lead_Status();
        $status->status = $request->get('status');
        $status->save();
        return back()->withSuccess(trans('app.settings_updated'));
    }

    /**
     * Display Authentication & Registration settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function auth()
    {
        return view('settings.auth');
    }

    /**
     * Handle application settings update.
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $this->updateSettings($request->except("_token"));

        return back()->withSuccess(trans('app.settings_updated'));
    }

    /**
     * Update settings and fire appropriate event.
     *
     * @param $input
     */
    private function updateSettings($input)
    {
        foreach ($input as $key => $value) {
            Settings::set($key, $value);
        }

        Settings::save();

        event(new SettingsUpdated);
    }

    /**
     * Enable system 2FA.
     *
     * @return mixed
     */
    public function enableTwoFactor()
    {
        $this->updateSettings(['2fa.enabled' => true]);

        return back()->withSuccess(trans('app.2fa_enabled'));
    }

    /**
     * Disable system 2FA.
     *
     * @return mixed
     */
    public function disableTwoFactor()
    {
        $this->updateSettings(['2fa.enabled' => false]);

        return back()->withSuccess(trans('app.2fa_disabled'));
    }

    /**
     * Enable registration captcha.
     *
     * @return mixed
     */
    public function enableCaptcha()
    {
        $this->updateSettings(['registration.captcha.enabled' => true]);

        return back()->withSuccess(trans('app.recaptcha_enabled'));
    }

    /**
     * Disable registration captcha.
     *
     * @return mixed
     */
    public function disableCaptcha()
    {
        $this->updateSettings(['registration.captcha.enabled' => false]);

        return back()->withSuccess(trans('app.recaptcha_disabled'));
    }

    /**
     * Display notification settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notifications()
    {
        return view('settings.notifications');
    }
}
