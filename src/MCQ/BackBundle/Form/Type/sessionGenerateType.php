<?php

namespace MCQ\BackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SessionGenerateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('Mcq', 'entity',
                array('class' => 'MCQ\BackBundle\Entity\Mcq',
                    'property' => 'id','read_only' => true,
                    'property' => 'mcq_name','read_only' => true,
                    'label' => 'QCM'
                ))



            ->add('save','submit', array('label' => 'Enregistrer') )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCQ\BackBundle\Entity\Session'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mcq_back_session_generate_type';
    }
}
