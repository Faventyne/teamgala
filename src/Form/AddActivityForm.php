<?php
/**
 * Created by IntelliJ IDEA.
 * User: Etudiant
 * Date: 13/12/2017
 * Time: 17:31
 */

namespace Form;
use Model\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints as Assert;

class AddActivityForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('name', TextType::class,
            [
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('deadline', DateType::class, [
                'format' => 'dd/mm/yyyy',
                'placeholder' => 'dd/mm/yyyy',
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('dateType', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/"
                    ])
                ]
            ]);

        if ($options['standalone']){
            $builder->add('submit', SubmitType::class,[
                'label' => 'Soumettre'
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class',User::class);
        $resolver->setDefault('standalone', false);
        $resolver->addAllowedTypes('standalone', 'bool');
    }
}