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
    $this->assertEquals('sf_', $container->getParameter('doctrine.db.table_prefix'));
    $this->assertTrue($container->hasDefinition('doctrine.table_prefix_subscriber'));
    $this->assertTrue($container->getDefinition('doctrine.table_prefix_subscriber')->hasTag('doctrine.event_subscriber'));
  }

}
