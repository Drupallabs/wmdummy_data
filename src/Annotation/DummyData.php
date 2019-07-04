<?php
namespace Drupal\wmdummy_data\Annotation;

use Drupal\Component\Annotation\Plugin;
use Drupal\wmdummy_data\DummyDataInterface;

/**
 * @Annotation
 */
class DummyData extends Plugin
{
    /** @var string */
    public $entity_type;
    /** @var string */
    public $bundle;
    /** @var string */
    public $preset = DummyDataInterface::PRESET_DEFAULT;
    /** @var string */
    public $langcode;

    public function getId()
    {
        if (isset($this->definition['entity_type'], $this->definition['bundle'])) {
            return implode('.', [
                $this->definition['entity_type'],
                $this->definition['bundle'],
                $this->definition['preset'],
            ]);
        }

        return parent::getId();
    }
}
