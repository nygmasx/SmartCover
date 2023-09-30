<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poste', TextType::class, [
                'label' => 'Votre Poste',
                'attr' =>[
                    'placeholder' => 'Votre Poste',
                    ]])
            ->add('nom', TextType::class, [
                'label' => 'Votre Nom',
                'attr' =>[
                    'placeholder' => 'Votre Nom',
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Votre Prénom',
                'attr' =>[
                    'placeholder' => 'Votre Prénom',
                ]
            ])
            ->add('diplome', TextareaType::class, [
                'label' => 'Votre Diplôme',
                'attr' =>[
                    'placeholder' => 'Votre Diplôme',
                ]
            ])
            ->add('entreprise', TextType::class, [
                'label' => 'Entreprise',
                'attr' =>[
                    'placeholder' => 'Entreprise pour laquelle vous postulez',
                ]
            ])
            ->add('annonce', TextareaType::class, [
                'label' => 'Annonce',
                'attr' =>[
                    'placeholder' => 'Annonce de poste',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
