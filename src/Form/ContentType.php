<?php

namespace App\Form;

use App\Entity\Content;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use FOS\CKEditorBundle\FOSCKEditorBundle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description', TextareaType::class, [
                'required' => true,
            ])
            ->add('file', FileType::class, [
                'mapped' => false,
                'required' => false,
            ])
            ->add('typeFile', ChoiceType::class, [
                'multiple' => false,
                'choices'  => [
                    'text' => 'text',
                    'photo' => 'photo',
                    'video' => 'video',
                    'link' => 'link',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Content::class,
        ]);
    }
}
