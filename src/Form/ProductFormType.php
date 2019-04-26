<?php

namespace App\Form;

use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProductFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['attr' => ['rows' => 1]])
            ->add('description', null, ['attr' => ['rows' => 5]])
            ->add('price', MoneyType::class, [
                'currency' => 'PLN'
            ])
            ->add('image_url')
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'SHOES'    => 'SHOES',
                    'JACKET'   => 'JACKET',
                    'TROUSERS' => 'TROUSERS',
                    'TSHIRT'   => 'TSHIRT',
                    'SHIRTS'   => 'SHIRTS',
                    'DELIVERY' => 'DELIVERY'
                ]
            ])
            ->add('isVisible')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
