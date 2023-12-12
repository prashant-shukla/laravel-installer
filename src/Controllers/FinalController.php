<?php

namespace PacificSw\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use PacificSw\LaravelInstaller\Events\LaravelInstallerFinished;
use PacificSw\LaravelInstaller\Helpers\EnvironmentManager;
use PacificSw\LaravelInstaller\Helpers\FinalInstallManager;
use PacificSw\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param  \PacificSw\LaravelInstaller\Helpers\InstalledFileManager  $fileManager
     * @param  \PacificSw\LaravelInstaller\Helpers\FinalInstallManager  $finalInstall
     * @param  \PacificSw\LaravelInstaller\Helpers\EnvironmentManager  $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished);

        return view('vendor.installer.finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
