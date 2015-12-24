<?php

namespace MCQ\BackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class McqType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mcq_name', null, array('label' => 'Nom de qcm :'))
            ->add('level', 'choice', array('label' => 'Niveau :',
                'choices' => array(
                    'facile' => 'facile',
                    'moyen' => 'moyen',
                    'difficile' => 'difficile'

                )))
            ->add('save','submit', array('label' => 'Enregistrer') )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCQ\BackBundle\Entity\Mcq'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mcq_back_mcq_type';
    }
}
