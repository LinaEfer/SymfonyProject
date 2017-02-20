<?php

namespace AppBundle\Form;

use AppBundle\Entity\TvSeries;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TvSeriesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('author', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Series'))
            ->getForm();
    }
}
