<?php namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Username'],
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 3, 'max' => 15])
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Password'],
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 3, 'max' => 20])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'E-mail',
//                    'novalidate' => true,
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 3, 'max' => 40]),
//                    new Email(['message' => '{{ value }} is not valid. Enter an e-mail'])
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Register',
                'validate' => false
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'sanitize_html' => true,
            'data_class' => User::class,
        ]);
    }

}