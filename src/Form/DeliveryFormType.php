<?php

namespace App\Form;

use App\Entity\Delivery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class DeliveryFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeOfDelivery', ChoiceType::class, [
                'placeholder' => 'Choose type of delivery',
                'choices'     => [
                    'Courier DPD 17.99zł'   => 'dpd',
                    'Courier DHL 19.99zł'   => 'dhl',
                    'Poczta Polska 14.99zł' => 'pp'
                ],
                'required'    => true,
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
