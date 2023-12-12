<?php


namespace PrashantShukla\LaravelInstaller\Controllers;


use Illuminate\Routing\Controller;
use PrashantShukla\LaravelInstaller\Helpers\PermissionsChecker;
use PrashantShukla\LaravelInstaller\Helpers\ProgressHelper;

class PermissionsController extends Controller
{
    /**
     * @var PermissionsChecker
     */
    protected $permissions;
    protected $ProgressBar;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker,ProgressHelper $ProgressBar)
    {
        $this->permissions = $checker;
        $this->ProgressBar = $ProgressBar;
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function permissions()
    {
        $permissions = $this->permissions->check(
            config('installer.permissions')
        );
        $this->ProgressBar->update_session_data(2);
        return view('vendor.installer.permissions', compact('permissions'));
    }
}
