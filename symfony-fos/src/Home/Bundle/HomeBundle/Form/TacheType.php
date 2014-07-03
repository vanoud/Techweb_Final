<?php

namespace Home\Bundle\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TacheType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('dateDebut', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'MM/dd/yyyy',
                                                'attr' => array('class' => 'date'),
                                                ))
            ->add('dateFin', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'MM/dd/yyyy',
                                                'attr' => array('class' => 'date'),
                                                ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\Bundle\HomeBundle\Entity\Tache'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'home_bundle_homebundle_tachetype';
    }
}
