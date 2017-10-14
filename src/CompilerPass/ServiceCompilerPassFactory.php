<?php

namespace KejawenLab\Application\SemartHris\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@kejawenlab.com>
 */
final class ServiceCompilerPassFactory
{
    const SERVICE_COMPILER_PASS_TAG = 'semarthris.service_compiler';

    /**
     * @var CompilerPassInterface[]
     */
    private $compilers;

    /**
     * @param array $compilers
     */
    public function __construct(array $compilers = [])
    {
        foreach ($compilers as $compiler) {
            $this->addCompiler($compiler);
        }
    }

    /**
     * @param ContainerBuilder $container
     */
    public function compile(ContainerBuilder $container)
    {
        foreach ($this->compilers as $compiler) {
            $compiler->process($container);
        }
    }

    /**
     * @param CompilerPassInterface $compilerPass
     */
    private function addCompiler(CompilerPassInterface $compilerPass)
    {
        $this->compilers[] = $compilerPass;
    }
}
