<?php

namespace Grifis\DoctrineTablePrefixBundle\Test\DependencyInjection;

use Grifis\DoctrineTablePrefixBundle\DependencyInjection\GrifisDoctrineTablePrefixExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

class GrifisDoctrineTablePrefixExtensionTest extends \PHPUnit_Framework_TestCase
{

  public function testDefault()
  {
    $container = new ContainerBuilder();
    $loader = new GrifisDoctrineTablePrefixExtension();
    $loader->load(array(array()), $container);
    $this->assertTrue($container->hasDefinition('knp_menu.renderer.list'), 'The list renderer is loaded');
  }

}
