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
                    'Blue' => "badge badge-primary",
                    'Gray' => "badge badge-secondary",
                    'Green' => "badge badge-success",
                    'Red' => "badge badge-danger",
                    'Yellow' => "badge badge-warning",
                    'Info' => "badge badge-info",
                    'Light' => "badge badge-light",
                    'Dark' => "badge badge-dark",
                ],
            ]);
//            ->add('articles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tag::class,
        ]);
    }
}
