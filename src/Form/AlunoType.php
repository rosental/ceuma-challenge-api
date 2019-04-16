<?php

namespace App\Form;

use App\Entity\Aluno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlunoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('cpf')
            ->add('address')
            ->add('cep')
            ->add('email')
            ->add('phone_number')
            // ->add('created_at') // Adicionando automaticamente na entidade pelas confguracoes do Doctrine;
            // ->add('updated_at')
            ->add('courseCollection')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aluno::class,
        ]);
    }
}
