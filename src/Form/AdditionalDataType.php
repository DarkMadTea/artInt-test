<?php

namespace App\Form;

use App\Entity\AdditionalData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdditionalDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', TextType::class, array(
                'label' => 'Координаты метки',
                'attr' => [
                    'placeholder' => 'Координаты метки',
                    'readonly' => true
                ]
            ))
            ->add('fio', TextType::class, array(
                'label' => 'ФИО',
                'attr' => [
                    'placeholder' => 'Введите фио',
                ]
            ))
            ->add('review', TextareaType::class, array(
                'label' => 'Отзыв (в задании было написано не более 200 символов)',
                'attr' => [
                    'placeholder' => 'Введите отзыв',
                    'rows' => '5',
                    'maxlength' => '200'
                ]
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Сохранить',
                'attr' => [
                    'class' => 'btn btn-success',
                    'style' => 'min-width: 120px'
                ]
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AdditionalData::class,
        ]);
    }
}
