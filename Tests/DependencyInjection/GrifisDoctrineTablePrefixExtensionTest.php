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
    $this->assertEquals('sf_', $container->getParameter('grifis_doctrine_table_prefix.prefix'));
    $this->assertTrue($container->hasDefinition('grifis_doctrine_table_prefix.subscriber'));
    $this->assertTrue($container->getDefinition('grifis_doctrine_table_prefix.subscriber')->hasTag('doctrine.event_subscriber'));
  }

}
