<?php

namespace MCQ\BackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question_name', null, array('label' => 'text de question :'))
            ->add('type','choice',array('label'=>'Type :',
                'choices' => array(
                    'Un seul choix' => 'Un seul choix',
                    'Choix multiple' => 'Choix multiple'
                )))
            ->add('Topic', 'entity',
                array('class' => 'MCQ\BackBundle\Entity\Topic',
                    'property' => 'id','read_only' => true,
                    'property' => 'topic_name','read_only' => true))



            ->add('save','submit', array('label' => 'Enregistrer') )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCQ\BackBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mcq_back_question_type';
    }
}
