<?php

namespace App\Form;

use App\Entity\Tag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('color', ChoiceType::class, [
                'choices'  => [
                    'Синий' => 'badge-primary',
                    'Серый' => 'badge-secondary',
                    'Зеленій' => 'badge-success',
                    'Красный' => 'badge-danger',
                    'Желтый' => 'badge-warning',
                    'Голубой' => 'badge-info',
                    'Белый' => 'badge-light',
                    'Черный' => 'badge-dark',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tag::class,
        ]);
    }
}
