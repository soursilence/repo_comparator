<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\{TextType, SubmitType};
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Comparison;

class ComparisonType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('url1', TextType::class,array('label' => false,'attr' => array('placeholder' => 'First Repository link')))
                ->add('url2', TextType::class,array('label' => false,'attr' => array('placeholder' => 'Second Repository link')))
                ->add('save', SubmitType::class, array('label' => 'Compare Repos'));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Comparison::class,
        ));
    }

}
