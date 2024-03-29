<?php
namespace Grifis\DoctrineTablePrefixBundle\Subscriber;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;

class TablePrefixSubscriber implements \Doctrine\Common\EventSubscriber
{
  protected $prefix = '';

  public function __construct($prefix)
  {
    $this->prefix = (string) $prefix;
  }

  public function getSubscribedEvents()
  {
    return array('loadClassMetadata');
  }

  public function loadClassMetadata(LoadClassMetadataEventArgs $args)
  {
    $classMetadata = $args->getClassMetadata();
    $classMetadata->setPrimaryTable(array('name' => $this->prefix . $classMetadata->getTableName()));

    foreach ($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
      if ($mapping['type'] == \Doctrine\ORM\Mapping\ClassMetadataInfo::MANY_TO_MANY) {
        $mappedTableName = $classMetadata->associationMappings[$fieldName]['joinTable']['name'];
        $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $this->prefix . $mappedTableName;
      }
    }
  }

}