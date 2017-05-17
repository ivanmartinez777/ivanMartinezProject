<?php

namespace AppBundle\Form;

use AppBundle\Entity\Texto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;




class TextoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', TextType::class)
            ->add('cuerpo', TextType::class)
            ->add('tags', CollectionType::class, array(
                'entry_type' => TagType::class
            ));
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=> Texto::class

        ]);
    }

    public function getName()
    {
        return 'app_bundle_text_type';
    }
}
