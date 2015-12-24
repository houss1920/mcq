<?php

namespace MCQ\BackBundle\Form\Type;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserAddType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cin', 'text', array('label' => 'C.I.N :', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('enabled', 'choice', array('label' => 'Statut :',
                'choices' => array(
                    '1' => 'Activé',
                    '0' => 'Désactivé')))
            ->add('roles', 'choice', array(
                'choices' => array('ROLE_USER' => 'User', 'ROLE_ADMIN' => 'Administrator'),
                'multiple' => true,
                'expanded'=>true
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
            'data_class' => 'MCQ\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mcq_back_user_add_type';
    }
}