<?php

namespace Admin\Form;

use Shop\Domain\Command\NewProductCommand;
use App\Form\PriceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Product add form
 *
 * @package Admin\Form
 */
class ProductType extends AbstractType
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
                'name',
                TextType::class,
                array(
                    'required' => true,
                    'label' => 'Nazwa',
                    'constraints' => [new NotBlank(), new Length(['max' => 255])],
                )
            )
            ->add(
                'description',
                TextareaType::class,
                array(
                    'required' => true,
                    'label' => 'Opis',
                    'attr' => [
                        'rows' => 10
                    ],
                    'constraints' => [new Length(['min' => 100, 'max' => 65000])],
                )
            )
            ->add(
                'price',
                PriceType::class,
                array(
                    'required' => true,
                    'label' => 'Cena'
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
                'data_class' => NewProductCommand::class
            )
        );
    }

    /**
     * Return form name
     *
     * @return string
     */
    public function getName()
    {
        return 'product';
    }
}
