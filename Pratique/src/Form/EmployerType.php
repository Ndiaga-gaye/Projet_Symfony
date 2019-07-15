<?php

namespace App\Form;
use App\Entity\Service;
use App\Entity\Employer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EmployerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('MATRICULE')
            ->add('NOMCOMPLET')
            ->add('DATENAISSANCE',DateType::class,['widget'=>'single_text'])
            ->add('SALAIRE')
            ->add('IDSERVICE', EntityType::class,['class'=> Service::class,'choice_label'=>'libeller'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employer::class,
        ]);
    }
}
