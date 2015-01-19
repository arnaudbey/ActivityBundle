<?php

namespace Innova\ActivityBundle\DataFixtures\Required;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Innova\ActivityBundle\Entity\ActivityAvailable\CategoryAvailable;
use Innova\ActivityBundle\Entity\ActivityAvailable\TypeAvailable;

class LoadRequiredFixturesData extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $availableCategories = array (
            // Choice Type category
            array (
                'name' => 'ChoiceType',
                'icon' => 'fa fa-fw fa-check-square-o',
                'types' => array (
                    array (
                        'name' => 'BooleanChoiceType', 'class' => 'BooleanChoiceType',
                    ),
                    array (
                        'name' => 'UniqueChoiceType', 'class' => 'UniqueChoiceType',
                    ),
                    array (
                        'name' => 'MultipleChoiceType', 'class' => 'MultipleChoiceType'
                    ),
                ),
            )
        );

        foreach ($availableCategories as $category) {
            $entityCategory = new CategoryAvailable();

            $entityCategory->setName($category['name']);

            if (!empty($category['icon'])) {
                $entityCategory->setIcon($category['icon']);
            }

            if (!empty($category['types'])) {
                foreach ($category['types'] as $type) {
                    $entityType = new TypeAvailable();

                    $entityType->setName($type['name']);
                    $entityType->setClass($type['class']);

                    $entityCategory->addType($entityType);
                }
            }

            $manager->persist($entityCategory);
        }

        $manager->flush();
    }
}