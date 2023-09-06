<?php

declare(strict_types=1);

namespace App\Core\Product\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isOnSale', CheckboxType::class, [
                    'required' => false,
                    'label' => 'sylius.form.product.is_on_sale',
                ]
            );
    }

    public static function getExtendedTypes(): iterable
    {
        return [
            ProductType::class
        ];
    }
}
