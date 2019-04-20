<?php

namespace App\Form;

use App\Entity\Delivery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use App\Entity\Item;
use App\Repository\ItemRepository;

class DeliveryFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('item', EntityType::class, [
                'class'         => Item::class,
                'mapped'        => false,
                'query_builder' => function (ItemRepository $ir) {
                    return $ir->createQueryBuilder('u')
                        ->andWhere('u.category=:deli')
                        ->setParameter('deli', 'DELIVERY');
                },
                'choice_label' => function($delivery) {
                    return $delivery->getTitle() . ' ' . $delivery->getPrice() . 'zł';
                },
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('adressLine')
            ->add('postalCode')
            ->add('city')
            ->add('country')
            ->add('phoneNumber', TelType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Delivery::class,
        ]);
    }
}
