<?php

declare(strict_types=1);

namespace GoetasWebservices\SoapServices\SoapClient\Tests\DependencyInjection;

use GoetasWebservices\SoapServices\SoapClient\Builder\SoapContainerBuilder;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function testDI(): void
    {
        $builder = new SoapContainerBuilder(__DIR__ . '/../Fixtures/config.yml');
        $debugContainer = $builder->getDebugContainer();

        $tempDir = sys_get_temp_dir();

        $builder->dumpContainerForProd($tempDir, $debugContainer);
        $this->assertFileExists($tempDir . '/SoapContainer.php');
    }
}
