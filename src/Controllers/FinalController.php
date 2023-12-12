<?php


namespace PrashantShukla\LaravelInstaller\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use PrashantShukla\LaravelInstaller\Events\LaravelInstallerFinished;
use PrashantShukla\LaravelInstaller\Helpers\EnvironmentManager;
use PrashantShukla\LaravelInstaller\Helpers\FinalInstallManager;
use PrashantShukla\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \PrashantShukla\LaravelInstaller\Helpers\InstalledFileManager $fileManager
     * @param \PrashantShukla\LaravelInstaller\Helpers\FinalInstallManager $finalInstall
     * @param \PrashantShukla\LaravelInstaller\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent('final');

        event(new LaravelInstallerFinished);
        Session::forget(['currentProgress','installerSession']);
        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage','finalEnvFile'));
    }
}
