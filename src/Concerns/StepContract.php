<?php

namespace Pacificsw\WebInstaller\Concerns;

use Filament\Forms\Components\Wizard\Step;

interface StepContract
{
    public static function make(): Step;
}