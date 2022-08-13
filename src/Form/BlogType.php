<?php namespace App\Form;

use App\Entity\Blog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titel', TextType::class, [
                'attr' => [
                    'class' => 'form-horizontal'
                ],
                'label' => 'Titel',
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 60
                    ])
                ]
            ])
            ->add('subtitel', TextType::class, [
                'label' => 'Subtitel',
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'max' => 100
                    ])
                ]
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Text',
            'attr' => [
                'rows' => 10,
            ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 500
                    ])
                ]
            ])
            ->add('submit', SubmitType::class);

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'sanitize_html' => true,
            'data_class' => Blog::class,
        ]);
    }

}