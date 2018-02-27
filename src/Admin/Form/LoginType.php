<?php

namespace Admin\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Login form
 *
 * @package Admin\Form
 */
class LoginType extends AbstractType
{
    /**
     * Building form
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                EmailType::class,
                array(
                    'label' => 'E-mail użytkownika',
                    'constraints' => [new Email()],
                )
            )
            ->add(
                'password',
                PasswordType::class,
                array(
                    'label' => 'Hasło',
                    'constraints' => [new Length(['min' => 4])],
                )
            );
    }

    /**
     * Options configuration
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'intention' => 'authentication'
            )
        );
    }
}
