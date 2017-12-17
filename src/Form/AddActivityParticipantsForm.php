<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 17/12/2017
 * Time: 03:01
 */

namespace Form;

use Model\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AddActivityParticipantsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if ($options['standalone']) {
            $builder->add('submit', SubmitType::class, [
                'label' => 'Finaliser activité',

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