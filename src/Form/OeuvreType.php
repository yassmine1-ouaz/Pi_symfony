<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\CategorieOeuvre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /* ->add('image', FileType::class, [
                'label' => 'image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2Mi',
                        'mimeTypesMessage' => 'Please upload a valid image file',
                    ])
                ],
            ])*/

            ->add('image', FileType::class, [
                'label' => 'Image (JPG, PNG or GIF file)',
                'mapped' => false,
                'required' => false,
            ])

            ->add(
                'titreOeuvre'

                // 'constraints' => [
                //   new NotBlank([
                //      'message' => 'Veillez saisir un titre'
                //  ])
                //]
            )
            ->add('artiste')
            ->add('famille',  ChoiceType::class, [
                'choices' => [
                    'Aucune sélection' => '',
                    'Art_Moderne' => 'Art_Moderne',
                    'Art_contemporain' => 'Art_contemporain',
                ]
            ])
            ->add('categorieOeuvre')
            ->add('prixOeuvre')

            ->add('etat', ChoiceType::class, [
                'choices' => [
                    'Aucune sélection' => '',
                    'Pret' => 'Pret',
                    'Non_dispo' => 'Non_dispo',
                ]
            ])


            //->add('Ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
