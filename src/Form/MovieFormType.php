<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Movie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Enter movie title here',
                    'class' => 'bg-transparent border-b py-2 rounded-md text-6xl focus:outline-none font-medium w-full'
                ),
                'label' => false
            ])
            ->add('releaseYear', IntegerType::class, [
                'attr' => array(
                    'placeholder' => 'Enter release year here',
                    'class' => 'bg-transparent border-b mt-10 py-2 rounded-md focus:outline-none font-medium w-full'
                ),
                'label' => false
            ])
            ->add('description', TextareaType::class, [
                'attr' => array(
                    'placeholder' => 'Enter description',
                    'class' => 'bg-transparent border-b py-2 h-60 rounded-md focus:outline-none font-medium w-full'
                ),
                'label' => false
            ])
            ->add('imagePath', FileType::class, [
                'attr' => array(
                    'class' => 'py-10 cursor-pointer'
                ),

                'label' => false,
            ])

            ->add('actors', EntityType::class, [
                'class' => Actor::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
