<?php

namespace MCQ\BackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChoiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', null, array('label' => 'Text de réponse :'))
            ->add('score', 'integer', array('label' => 'Note de réponse :'))

            ->add('Question', 'entity',
                array('class' => 'MCQ\BackBundle\Entity\Question',
                    'property' => 'id','read_only' => true,
                    'property' => 'question_name','read_only' => true))

            ->add('save','submit', array('label' => 'Enregistrer') )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCQ\BackBundle\Entity\Choice'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mcq_back_choice_type';
    }
}
